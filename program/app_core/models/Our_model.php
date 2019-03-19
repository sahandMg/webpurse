<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Our_model extends CI_Model {

	public function &__get($key)
	{
		$CI =& get_instance();
		return $CI->$key;
	}

	public function curl_get_content($URL)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $URL);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}
	
	
	public function is_system_allowed_to_send_money($transaction_id, $user_id)
	{
		$this->db->set('transaction_id', $transaction_id);
		$this->db->set('user_id', $user_id);
		$this->db->insert('app_instapay');
		
		if ($this->db->affected_rows() < 1 OR ! is_numeric($user_id) OR intval($user_id) < 2 OR strlen($transaction_id) < 4)
		{
			$this->session->set_flashdata('message', 'به نظر قبلا پرداخت شده است، لطفا بررسی کرده در صورت وجود مشکل با مدیریت تماس بگیرید');
			return show_error('به نظر قبلا پرداخت شده است، لطفا بررسی کرده در صورت وجود مشکل با مدیریت تماس بگیرید');
			die();
		}
		else
		{
			return $this->db->affected_rows();
		}
	}
	
	
	public function pay_bitcoin($user_id, $transaction_id)
	{
		$currency = 'Bitcoin';

		// Load Encryption
		$this->load->library('encrypt');

		// Get User Bitcoin Address
		$this->db->select('*');
		$this->db->where('id', $user_id);
		$ecc = $this->db->get('app_users')->row();
		$bitcoin_address = $ecc->bitcoin_acc;
		
		// Get Ecurrency Info
		$this->db->select('*');
		$this->db->where('id', 1);
		$bank_info = $this->db->get('app_secret')->row();

		// Get Transaction Info
		$this->db->select('*');
		$this->db->where('transaction_id', $transaction_id);
		$trans_info  = $this->db->get('app_exchanges')->row();
		$send_amount = $trans_info->amount;
		
		// Pay Bitcoin
		$bitcoin_blockio_api_key = $bank_info->bitcoin_blockio_api_key;
		$bitcoin_blockio_secret_pin = $this->encrypt->decode(base64_decode($bank_info->bitcoin_blockio_secret_pin), $this->config->item('en_usd'));
		$bitcoin_blockio_fee = $bank_info->bitcoin_blockio_fee;
		
		$json_url = "https://block.io/api/v2/withdraw/?api_key={$bitcoin_blockio_api_key}&amounts={$send_amount}&to_addresses={$bitcoin_address}&pin={$bitcoin_blockio_secret_pin}&priority={$bitcoin_blockio_fee}&nonce=t{$transaction_id}";
		$json_data = $this->curl_get_content($json_url);
		$json_feed = json_decode($json_data, true);
		
		$webpurse_email = $this->config->item('webpurse_email');

		if (isset($json_feed['status']) && $json_feed['status'] === 'success')
		{
			$batch = $json_feed['data']['txid'];
			
			$data = array(
				"batch"       => $batch,
				"completed"   => 1
			);
			$this->db->where('transaction_id', $transaction_id);
			$this->db->update('app_exchanges', $data);
			
			$this->session->set_flashdata('message', 'پرداخت انجام شد');
			$this->data['batch'] = $batch;
			
			// Email
			// Get Email
			$user_email = $ecc->email;
			// Send Email
			$this->load->helper('email');
			$message = 'خرید با موفقیت انجام شد، مبلغ به حساب شما واریز شد، شماره پیگیری در سایت: ';
			$message .= $transaction_id;
			mail("{$user_email},{$webpurse_email}", 'WebPurse - Exchange Completed', $message, 'From: info@webpurse.org');
			
			// Send Message
			$mobile = $ecc->mobile;
			$this->send_sms_money_sent($mobile);
			
			// Update balance of Bitcoin
			$reduce_amount = bcadd("{$send_amount}",'0.0005',8);
			$this->db->set('available', 'available-'.$reduce_amount, FALSE);
			$this->db->where('english_name', 'bitcoin');
			$this->db->update('app_prices');
		}
		else
		{
			mail("{$webpurse_email}", "New Pending Exchange (Buy {$currency})", $transaction_id, 'From: info@webpurse.org');
			$this->session->set_flashdata('message', 'خطایی در هنگام پرداخت بیتکوین رخ داد لطفا بررسی کنید‌ادرس بیتکوین شما درست باشد یا با مدیریت تماس بگیرید');
		}
	}
	
	
	
	public function pay_perfectmoney($user_id, $transaction_id)
	{
		$currency = 'PerfectMoney';

		// Load Encryption
		$this->load->library('encrypt');

		// Get User PM USD
		$this->db->select('*');
		$this->db->where('id', $user_id);
		$ecc = $this->db->get('app_users')->row();
		$perfectmoney_user = $ecc->perfectmoney_acc;
		
		// Get Ecurrency Info
		$this->db->select('*');
		$this->db->where('id', 1);
		$bank_info = $this->db->get('app_secret')->row();

		// Get Transaction Info
		$this->db->select('*');
		$this->db->where('transaction_id', $transaction_id);
		$trans_info  = $this->db->get('app_exchanges')->row();
		$send_amount = $trans_info->amount;
		
		// Pay PM
		$perfectmoney_account_id    = $bank_info->perfectmoney_account_id;
		$perfectmoney_passphrase    = $this->encrypt->decode(base64_decode($bank_info->perfectmoney_passphrase), $this->config->item('en_usd'));
		$perfectmoney_payer_account = $bank_info->perfectmoney_payer_account;

		$pm_amount = $this->truncate_number($send_amount, 2);

		$url = "https://perfectmoney.is/acct/confirm.asp?AccountID={$perfectmoney_account_id}&PassPhrase={$perfectmoney_passphrase}&Payer_Account={$perfectmoney_payer_account}&Payee_Account={$perfectmoney_user}&Amount={$pm_amount}&Memo=WebPurse&PAYMENT_ID={$transaction_id}";

		$fetch_data = $this->curl_get_content($url);
		
		$webpurse_email = $this->config->item('webpurse_email');
		
		if (preg_match_all("/<input name='(.*)' type='hidden' value='(.*)'>/", $fetch_data, $perfectmoney_result, PREG_SET_ORDER) && isset($perfectmoney_result[0][1]) && $perfectmoney_result[0][1] != 'ERROR')
		{
			$batch = '';
			foreach($perfectmoney_result as $pm)
			{
				if ($pm[1] === 'PAYMENT_BATCH_NUM')
				{
					$batch = $pm[2];
				}
			}

			$data = array(
				"completed" => 1,
				"batch"     => $batch
			);
			$this->db->where('transaction_id', $transaction_id);
			$this->db->update('app_exchanges', $data);
			
			$this->session->set_flashdata('message', 'پرداخت انجام شد');
			$this->data['batch'] = $batch;
			
			// Email
			// Get Email
			$user_email = $ecc->email;
			// Send Email
			$this->load->helper('email');
			$message = 'خرید با موفقیت انجام شد، مبلغ به حساب شما واریز شد، شماره پیگیری در سایت: ';
			$message .= $transaction_id;
			mail("{$user_email},{$webpurse_email}", 'WebPurse - Exchange Completed', $message, 'From: info@webpurse.org');
			
			// Send Message
			$mobile = $ecc->mobile;
			$this->send_sms_money_sent($mobile);
			
			// Update balance of PerfectMoney
			$reduce_fee    = bcdiv("{$send_amount}",'200',2);
			$reduce_amount = bcadd("{$send_amount}","{$reduce_fee}",2);
			$this->db->set('available', 'available-'.$reduce_amount, FALSE);
			$this->db->where('english_name', 'perfectmoney');
			$this->db->update('app_prices');
		}
		else
		{
			mail("$webpurse_email", "New Pending Exchange (Buy {$currency})", $transaction_id, 'From: info@webpurse.org');
			$this->session->set_flashdata('message', 'خطایی در هنگام پرداخت پرفکت مانی رخ داد لطفا بررسی کنید حساب دلاری پرفکت مانی شما درست باشد یا با مدیریت تماس بگیرید');
		}
	}
	
	
	
	public function send_verify_code($user_id=FALSE, $mobile=FALSE)
	{
		if (!$user_id OR !is_numeric($user_id) OR intval($user_id) < 1 OR ! $mobile OR strlen($mobile) != 11)
		{
			$this->session->set_flashdata('message', '115 خطایی رخ داد لطفا بعدا امتحان کنید یا با مدیریت تماس بگیرید');
			return FALSE;
		}
		
		// Check Verification Code
		$get_code = $this->db->select('sms_verify_code, sms_time, sms_count')->from('app_users')->where('id', $user_id)->get()->row();
		
		if ( ! $get_code)
		{
			$this->session->set_flashdata('message', '116 خطایی رخ داد لطفا بعدا امتحان کنید یا با مدیریت تماس بگیرید');
			return FALSE;
		}
		
		$sms_verify_code = intval($get_code->sms_verify_code);
		$sms_time        = intval($get_code->sms_time);
		$sms_count       = intval($get_code->sms_count);
		$minus1sec       = strtotime('-1 second');
		
		if ($sms_count > 3)
		{
			$this->session->set_flashdata('message', 'شما بیش از ۳ بار پیامک ارسال کرده اید ظرفیت شما پر شده با مدیریت تماس بگیرید');
			return FALSE;
		}
		
		if ($sms_verify_code != 0 && $sms_time > strtotime('-30 minutes'))
		{
			$this->session->set_flashdata('message', 'کد شما در کمتر از ۳۰ دقیقه گذشته ارسال شده لطفا کد قبلی را وارد کنید یا برای ارسال مجدد کد پس از ۳۰ دقیقه مجددا تلاش کنید');
			return TRUE;
		}
		
		$new_code      = rand(1001,9998);
		$api_key       = $this->config->item('sms_api_code');
		
		// Get SMS Sender Number
		$sender_number = $this->db->select('sms_number')->from('app_settings')->where('id', 1)->get()->row()->sms_number;
				
		$message = "{$new_code}";
		$json_url = "https://api.kavenegar.com/v1/{$api_key}/sms/send.json?receptor={$mobile}&sender={$sender_number}&message={$message}";
		
		$json_data = $this->curl_get_content($json_url);
		$data = json_decode($json_data, TRUE);
		
		if ( ! isset($data['return']['status']) OR intval($data['return']['status']) !== 200)
		{
			$this->session->set_flashdata('message', '117 خطایی رخ داد لطفا بعدا امتحان کنید یا با مدیریت تماس بگیرید');
			return FALSE;
		}
		
		$array = array(
				'sms_verify_code' => $new_code,
				'sms_time'        => $minus1sec,
				'sms_count'       => 'sms_count+1'
		);
		
		$this->db->set($array);
		$this->db->where('id', $user_id);
		$insert = $this->db->update('app_users');
		
		if ( ! $insert)
		{
			$this->session->set_flashdata('message', '119 خطایی رخ داد لطفا بعدا امتحان کنید یا با مدیریت تماس بگیرید');
			return FALSE;
		}
		
		return TRUE;
	}
	
	

	
	public function send_sms_money_sent($mobile, $batch=FALSE)
	{
		// Get Settings
		$this->db->select('*');
		$this->db->where('id', 1);
		$settings = $this->db->get('app_settings')->row();
		$sms_after_money_sent = $settings->sms_after_money_sent;
		
		if (intval($sms_after_money_sent) !== 1 OR ! is_numeric($mobile) OR strlen($mobile) < 11)
		{
			return FALSE;
		}
		
		$api_key       = $this->config->item('sms_api_code');
		
		// Get SMS Sender Number
		$sender_number = $this->db->select('sms_number')->from('app_settings')->where('id', 1)->get()->row()->sms_number;
		
		$message  = '%D8%B3%D9%81%D8%A7%D8%B1%D8%B4+%D8%B4%D9%85%D8%A7+%D8%A8%D8%A7+%D9%85%D9%88%D9%81%D9%82%DB%8C%D8%AA+%D8%A7%D9%86%D8%AC%D8%A7%D9%85+%D8%B4%D8%AF+%0Awebpurse.org';
		$json_url = "https://api.kavenegar.com/v1/{$api_key}/sms/send.json?receptor={$mobile}&sender={$sender_number}&message={$message}";
		
		$json_data = $this->curl_get_content($json_url);
		$data = json_decode($json_data, TRUE);
		
		if ( ! isset($data['return']['status']) OR intval($data['return']['status']) !== 200)
		{
			return FALSE;
		}
		
		return TRUE;
	}
	

	// Hazfe raghame ashary ezafe: 1.215000 => 1.215
	function truncate_number( $number, $precision = 2)
	{
		// Return if 0
		if ($number < 0.000001)
		{
			return 0;
		}
		// Are we negative?
		$negative = $number / abs($number);
		// Cast the number to a positive to solve rounding
		$number = abs($number);
		// Calculate precision number for dividing / multiplying
		$precision = pow(10, $precision);
		// Run the math, re-applying the negative value to ensure returns correctly negative / positive
		return floor( $number * $precision ) / $precision * $negative;
	}
	
	
	
	public function check_verify_code($user_id=FALSE, $verify_code=FALSE)
	{
		if (!$user_id OR !is_numeric($user_id) OR intval($user_id) < 1 OR ! $verify_code OR strlen($verify_code) != 4)
		{
			$this->session->set_flashdata('message', 'کد وارد شده اشتباه است');
			return FALSE;
		}
		
		// Get Verification Code
		$get_code = $this->db->select('sms_verify_code, sms_time, sms_wrong')->from('app_users')->where('id', $user_id)->get()->row();
		
		if ( ! $get_code)
		{
			$this->session->set_flashdata('message', '121 خطایی رخ داد لطفا بعدا امتحان کنید یا با مدیریت تماس بگیرید');
			return FALSE;
		}
		
		$sms_verify_code = intval($get_code->sms_verify_code);
		$sms_time        = intval($get_code->sms_time);
		$sms_wrong       = intval($get_code->sms_wrong);
		
		if ($sms_time <= strtotime('-24 hours'))
		{
			$this->session->set_flashdata('message', 'بیش از ۲۴ ساعت از ارسال کد گذشته و دیگر اعتبار ندارد');
			return FALSE;
		}
		
		if ($sms_wrong > 5)
		{
			$this->session->set_flashdata('message', 'شما بیش از ۵ بار کد اشتباه وارد کرده اید، اکنون باید جهت وریفای با مدیریت تماس بگیرید');
			return FALSE;
		}
		
		// Check if Correct
		if ($sms_verify_code === intval($verify_code) && $sms_verify_code != 0)
		{
			// Update Database
			$array = array(
					'verify_mobile' => '1'
			);
		
			$this->db->set($array);
			$this->db->where('id', $user_id);
			$update = $this->db->update('app_users');
			
			if ( ! $update)
			{
				$this->session->set_flashdata('message', 'کد شما صحیح بود ولی خطایی رخ داد لطفا با مدیریت تماس بگیرید یا مجددا امتحان کنید');
				return FALSE;
			}
			
			return TRUE;
		}
		else
		{
			// Update Wrong Count
			$this->db->set('sms_wrong', 'sms_wrong+1', FALSE);
			$this->db->where('id', $user_id);
			$this->db->update('app_users');
		}
		
		return FALSE;
	}
	
}