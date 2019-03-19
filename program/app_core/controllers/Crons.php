<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crons extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('email'));
		$this->load->helper(array('url'));
	}

	public function webmoney_balance_update()
	{
		// Load Webmoney Model
		$this->load->model('webmoney_model');
		$wm_balance = $this->webmoney_model->update_balance_webmoney();

		if($wm_balance === FALSE)
		{
			echo "Error updating webmoney balance.";
		}
		else
		{
			echo "Updated Webmoney balance: {$wm_balance}";
		}
	}

	public function available_balances()
	{
		// Get Ecurrency Info
		$info = $this->db->where('id', '1')->get('app_secret')->row();
		$this->load->library('encrypt');
		////////////////// BLOCKIO /////////////////
		// Check Block.io
		$blockio_api_key    = $info->bitcoin_blockio_api_key;

		$json_url = "https://block.io/api/v2/get_balance/?api_key={$blockio_api_key}";
		$json_data = $this->get_content($json_url);
		$json_feed = json_decode($json_data, true);
		
		// Update Bitcoin Balance if success
		if (isset($json_feed['status']) && $json_feed['status'] === 'success' && isset($json_feed['data']['available_balance']) && $json_feed['data']['available_balance'] >= 0)
		{
			$blockio_balance = $json_feed['data']['available_balance'];
			if ($blockio_balance >= 0.0002)
			{
				$blockio_balance = bcsub("$blockio_balance",'0.0002', 8);
			}
			else
			{
				$blockio_balance = '0.00000000';
			}
			$data = array(
					"available" => $blockio_balance
			);
			$this->db->where('english_name', 'bitcoin');
			$balance_update = $this->db->update('app_prices', $data);
			echo "<br>Block.io Balance Updated<br>";
		}
		else
		{
			echo "Block.io Balance Error:<br>";
			var_dump($json_data);
			echo "<br><br>";
		}
		unset($json_url, $json_data, $json_feed);
		////////////////// BLOCKIO /////////////////
		
		
		/////////////// PERFECTMONEY ///////////////
		// Check PerfectMoney
		$perfectmoney_account_id    = $info->perfectmoney_account_id;
		$perfectmoney_passphrase    = $this->encrypt->decode(base64_decode($info->perfectmoney_passphrase), $this->config->item('en_usd'));
		$perfectmoney_payer_account = $info->perfectmoney_payer_account;
		
		$url = "https://perfectmoney.is/acct/balance.asp?AccountID={$perfectmoney_account_id}&PassPhrase={$perfectmoney_passphrase}";
		$fetch_data = $this->get_content($url);echo $fetch_data;
		
		// Update Bitcoin Balance if success
		if (preg_match_all("/<input name='(.*)' type='hidden' value='(.*)'>/", $fetch_data, $perfectmoney_result, PREG_SET_ORDER) && isset($perfectmoney_result[0][1]) && $perfectmoney_result[0][1] != 'ERROR')
		{
			foreach($perfectmoney_result as $pm_account)
			{
				if ($pm_account[1] === $perfectmoney_payer_account)
				{
					$perfectmoney_balance = $pm_account[2];
				}
			}
			if (is_numeric($perfectmoney_balance) && $perfectmoney_balance >= 0.03)
			{
				$pm_fee = bcdiv("$perfectmoney_balance", '200', 2);
				
				// Reduce Fee
				$perfectmoney_balance = bcsub("$perfectmoney_balance", "$pm_fee", 2);
				$perfectmoney_balance = bcsub("$perfectmoney_balance", '0.01', 2);
				
				if ($perfectmoney_balance < 0)
				{
					$perfectmoney_balance = 0;
				}
			}
			else
			{
				$perfectmoney_balance = 0;
			}
			$data = array(
					"available" => $perfectmoney_balance,
					'temp_disable' => 0
			);
			$this->db->where('english_name', 'perfectmoney');
			$balance_update = $this->db->update('app_prices', $data);
			echo "<br>PerfectMoney Balance Updated<br>";
		}
		else
		{
			echo "PerfectMoney Error:<br>";
			var_dump($fetch_data);
			echo "<br><br>";
			$data = array(
					'temp_disable' => 1
			);
			$this->db->where('english_name', 'perfectmoney');
			$this->db->update('app_prices', $data);
		}
		unset($url, $fetch_data, $data);
		/////////////// PERFECTMONEY ///////////////
		
		
		/////////////////// OKPAY //////////////////
		
		/////////////////// OKPAY //////////////////
		
		
		
		/////////////////// BITCOIN USD PROCE //////////////////
		$fetch_price  = $this->get_content('https://btc-e.com/api/3/ticker/btc_usd');
		$decode_price = json_decode($fetch_price, TRUE);
		// Update Price
		if (isset($decode_price['btc_usd']['last']) && is_numeric($decode_price['btc_usd']['last']) && $decode_price['btc_usd']['last'] > 150)
		{
			// 1 BTC = ? USD
			$bitcoin_usd  = $decode_price['btc_usd']['last'];
			
			// Get Price per USD
			$this->db->where('english_name', 'bitcoin');
			$per_usd = $this->db->get('app_prices')->row();
			
			$per_usd_buy  = $per_usd->bitcoin_buy_each_usd;
			$per_usd_sell = $per_usd->bitcoin_sell_each_usd;
			
			$bitcoin_buy_price_per_btc = bcmul("$per_usd_buy", "$bitcoin_usd", 0);
			$bitcoin_sell_price_per_btc = bcmul("$per_usd_sell", "$bitcoin_usd", 0);
			
			$data = array(
					'buy_price'    => $bitcoin_buy_price_per_btc,
					'sell_price'   => $bitcoin_sell_price_per_btc,
					'temp_disable' => 0
			);
			$this->db->where('english_name', 'bitcoin');
			$this->db->update('app_prices', $data);
			echo "<br>Bitcoin Price Updated<br>";
		}
		else
		{
			echo "Error when getting price from BTC-e, Now trying Block.io Prices<br>";
			// Failed
			// Try with Block.io
			sleep(1);
			$json_url = "https://block.io/api/v2/get_current_price/?api_key={$blockio_api_key}&price_base=USD";
			$json_data = $this->get_content($json_url);
			$json_feed = json_decode($json_data, true);
			
			// If Block.io Successful
			if (isset($json_feed['status']) && $json_feed['status'] === 'success' && isset($json_feed['data']['prices'][0]['price']) && $json_feed['data']['prices'][0]['price'] > 150)
			{
				// 1 BTC = ? USD
				$bitcoin_usd = $json_feed['data']['prices'][0]['price'];
			
				// Get Price per USD
				$this->db->where('english_name', 'bitcoin');
				$per_usd = $this->db->get('app_prices')->row();
			
				$per_usd_buy  = $per_usd->bitcoin_buy_each_usd;
				$per_usd_sell = $per_usd->bitcoin_sell_each_usd;
			
				$bitcoin_buy_price_per_btc = bcmul("$per_usd_buy", "$bitcoin_usd", 0);
				$bitcoin_sell_price_per_btc = bcmul("$per_usd_sell", "$bitcoin_usd", 0);
			
				$data = array(
						'buy_price'    => $bitcoin_buy_price_per_btc,
						'sell_price'   => $bitcoin_sell_price_per_btc,
						'temp_disable' => 0
				);
				$this->db->where('english_name', 'bitcoin');
				$this->db->update('app_prices', $data);
				
				echo "<br>Block.io Price was okay, Bitcoin Price Updated<br>";
				
			}
			// If Failed disable bitcoin
			else
			{
				echo "<br>We couldn't update Bitcoin Price! Block.io Error:<br>";
				var_dump($json_data);
				$data = array(
						'temp_disable' => 1
				);
				$this->db->where('english_name', 'bitcoin');
				$this->db->update('app_prices', $data);
			}
			
		}
		/////////////////// BITCOIN USD PROCE //////////////////
	}
	
	protected function get_content($url)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		$data = curl_exec($ch);
	
		if (curl_errno($ch))
		{
			$err = curl_error($ch);
		}
		else
		{
			// check the HTTP status code of the request
			$result_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			if ($result_status != 200)
			{
				
			}
		}
	
		curl_close($ch);
	
		return $data;
	}
}
