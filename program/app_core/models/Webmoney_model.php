<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'third_party/webmoney/vendor/autoload.php';
use baibaratsky\WebMoney\WebMoney;
use baibaratsky\WebMoney\Signer;
use baibaratsky\WebMoney\Request\Requester\CurlRequester;
use baibaratsky\WebMoney\Api\X\X2;
use baibaratsky\WebMoney\Api\X\X9;

class Webmoney_model extends CI_Model
{

    public function __construct()
    {
		$this->load->database();
		$this->load->library(array('email','encrypt'));
		$this->load->model('our_model');
		$this->load->helper(array('url'));
    }
    
    // Pay
    
    public function pay_webmoney($user_id, $transaction_id)
    {
    	$currency = 'Webmoney';
    	
    	$webMoney = new WebMoney(new CurlRequester);

		// Load Encryption
		$this->load->library('encrypt');

		// Get User Bitcoin Address
		$this->db->select('*');
		$this->db->where('id', $user_id);
		$ecc = $this->db->get('app_users')->row();
		$webmoney_account = $ecc->webmoney_acc;
		
		// Get Transaction Info
		$this->db->select('*');
		$this->db->where('transaction_id', $transaction_id);
		$trans_info  = $this->db->get('app_exchanges')->row();
		$send_amount = $trans_info->amount;
		$id          = $trans_info->id;

		$wm_protect  = intval($trans_info->wm_protect);
		$wm_code     = $trans_info->wm_code;

		
		// Get Webmoney Info
		$this->db->select('*');
		$this->db->where('id', 1);
		$wm_info = $this->db->get('app_secret')->row();
		
		$webmoney_wmid          = $wm_info->webmoney_wmid;
		$webmoney_sender_purse  = $wm_info->webmoney_sender_purse;
		$webmoney_key_file_name = $wm_info->webmoney_key_file_name;
		$webmoney_password      = $this->encrypt->decode(base64_decode($wm_info->webmoney_password), $this->config->item('en_usd'));
		
		$webmoney_key_url       = APPPATH."/../files/{$webmoney_key_file_name}";
		
		// Pay
		
		$request = new X2\Request;
		$request->setSignerWmid("$webmoney_wmid");
		$request->setTransactionExternalId("$id");
		$request->setPayerPurse("$webmoney_sender_purse");
		$request->setPayeePurse("$webmoney_account");
		$request->setAmount("$send_amount");

		if ($wm_protect === 1)
		{
			$protection_days = intval($this->config->item('webmoney_protection_days'));

			if ($protection_days <= 0 OR $protection_days >= 100)
			{
				$protection_days = 5;
			}

			$request->setProtectionPeriod($protection_days);
			$request->setProtectionCode("$wm_code");
		}

		$request->setDescription("WebPurse Reference: {$transaction_id}");
		
		$request->sign(new Signer("$webmoney_wmid", "$webmoney_key_url", "$webmoney_password"));
		
		if ($request->validate())
		{
			$response = $webMoney->request($request);

			if ($response->getReturnCode() === 0)
			{
				// Success, Update database
				$batch = $response->getTransactionId();
				
				$data = array(
					"batch"       => $batch,
					"completed"   => 1
				);
				
				$this->db->where('transaction_id', $transaction_id);
				$this->db->update('app_exchanges', $data);
			
				$this->session->set_flashdata('message', "پرداخت انجام شد<br>{$batch}");
				$this->data['batch'] = $batch;
				
				// Email
				// Get Email
				$user_email = $ecc->email;
				// Send Email
				$this->load->helper('email');
				$message = 'خرید با موفقیت انجام شد، مبلغ به حساب شما واریز شد، شماره پیگیری در سایت: ';
				$message .= $transaction_id;
				$webpurse_email = $this->config->item('webpurse_email');
				mail("{$user_email},{$webpurse_email}", 'WebPurse - Exchange Completed', $message, 'From: info@webpurse.org');
			
				// Send Message
				$mobile = $ecc->mobile;
				$this->our_model->send_sms_money_sent($mobile);
			
				// Update balance of Webmoney
				$reduce_fee    = bcdiv("{$send_amount}",'125',2);
				$reduce_amount = bcadd("{$send_amount}","{$reduce_fee}",2);
				$this->db->set('available', 'available-'.$reduce_amount, FALSE);
				$this->db->where('english_name', 'webmoney');
				$this->db->update('app_prices');
				
				return TRUE;
			}
			else
			{
				$wm_error = $response->getReturnDescription();
				mail("$webpurse_email", "New Pending Exchange (Buy {$currency})", "{$transaction_id} Error: {$wm_error}", 'From: info@webpurse.org');
				$this->session->set_flashdata('message', 'خطایی در هنگام پرداخت پرفکت مانی رخ داد لطفا بررسی کنید حساب دلاری پرفکت مانی شما درست باشد یا با مدیریت تماس بگیرید');
				
				return FALSE;
			}
		}
		else
		{
			$wm_error = "Error: ";
			foreach ($request->getErrors() as $error)
			{
				$wm_error .= ' - ' . $error;
			}
			mail("$webpurse_email", "New Pending Exchange (Buy {$currency})", "{$transaction_id} Error: {$wm_error}", 'From: info@webpurse.org');
			$this->session->set_flashdata('message', 'خطایی در هنگام پرداخت پرفکت مانی رخ داد لطفا بررسی کنید حساب دلاری پرفکت مانی شما درست باشد یا با مدیریت تماس بگیرید');
			
			return FALSE;
		}
    }
    
    // Balance
    
    public function update_balance_webmoney()
    {
    	$webMoney = new WebMoney(new CurlRequester);
    	$request = new X9\Request;
    	
    	// Get Webmoney Info
		$this->db->select('*');
		$this->db->where('id', 1);
		$wm_info = $this->db->get('app_secret')->row();
		
		$webmoney_wmid          = $wm_info->webmoney_wmid;
		$webmoney_sender_purse  = $wm_info->webmoney_sender_purse;
		$webmoney_key_file_name = $wm_info->webmoney_key_file_name;
		$webmoney_password      = $this->encrypt->decode(base64_decode($wm_info->webmoney_password), $this->config->item('en_usd'));
		
		$webmoney_key_url       = APPPATH."/../files/{$webmoney_key_file_name}";
    	
    		$request->setSignerWmid("$webmoney_wmid");
		$request->setRequestedWmid("$webmoney_wmid");
		
		$request->sign(new Signer("$webmoney_wmid", "$webmoney_key_url", "$webmoney_password"));
				
		if ($request->validate())
		{
			$response = $webMoney->request($request);
			
			if ($response->getReturnCode() === 0)
			{
				$wm_balance = $response->getPurseByName("$webmoney_sender_purse")->getAmount();
			
				if (is_numeric($wm_balance) && $wm_balance >= 0.01)
				{
					$wm_fee = bcdiv("$wm_balance", '125', 2);
				
					// Reduce Fee
					$wm_balance = bcsub("$wm_balance", "$wm_fee", 2);
					$wm_balance = bcsub("$wm_balance", '0.01', 2);
				
					if ($wm_balance < 0)
					{
						$wm_balance = 0;
					}
				}
				else
				{
					$wm_balance = 0;
				}
				
				$data = array(
					"available" => $wm_balance
				);
				$this->db->where('english_name', 'webmoney');
				$balance_update = $this->db->update('app_prices', $data);

				return $wm_balance;
			}
			else
			{
				$wm_error = $response->getReturnDescription();
				mail("$webpurse_email", "Error getting webmoney balance", "Error: {$wm_error}", 'From: info@webpurse.org');
				
				return FALSE;
			}
		}
    }
    
    
}


/***** End of Webmoney.php ***********/
