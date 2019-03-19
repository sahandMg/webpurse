<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation','email'));
		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
		
		$this->data['is_admin']  = $this->ion_auth->is_admin();
		$this->data['logged_in'] = $this->ion_auth->logged_in();

		// Important News
		$this->data['important_news'] = $this->db->query("SELECT important_news FROM `app_settings` WHERE id = 1")->row()->important_news;
	}

	public function index()
	{
		$this->data['is_home'] = TRUE;
		
		$ecurrencies = $this->db->get('app_prices')->result_array();
		
		foreach($ecurrencies as $key => $value)
		{
			$name = $value['english_name'];
			$this->data['active'][$name] = intval($value['active']);
			$this->data['sell_price'][$name] = intval($value['sell_price']);
			$this->data['buy_price'][$name] = intval($value['buy_price']);
			$this->data['available'][$name] = $value['available'];
			if($value['english_name']!='bitcoin'){$this->data['available'][$name] = $this->truncate_number($value['available']);}
		}
		
		$this->db->select('*');
		$this->db->where('allow', 1);
		$this->db->order_by('id', 'DESC');
		$this->db->limit(50);
		$this->data['comments'] = $this->db->get('app_comments')->result();
		
		$this->load->view('welcome', $this->data);
	}
	
	public function news()
	{
		$this->data['news_array'] = $this->db->query("SELECT * FROM app_news ORDER BY id DESC LIMIT 10")->result_array();
		$this->load->view('news', $this->data);
	}
	
	public function terms()
	{
		$this->load->view('terms', $this->data);
	}
	
	public function about()
	{
		$this->load->view('about', $this->data);
	}
	
	public function contact()
	{
		$this->load->helper('captcha');
		$vals = array(
				'word'          => '',
				'img_path'      => './assets/captcha/',
				'img_url'       => '/assets/captcha/',
				'font_path'     => './assets/fonts/captcha.ttf',
				'img_width'     => '150',
				'img_height'    => 35,
				'expiration'    => 900,
				'word_length'   => 5,
				'font_size'     => 22,
				'img_id'        => 'captcha',
				'pool'          => '2346789ABCDEFGHJKLMNPQRSTUVWXYZ2346789ABCDEFGHJKLMNPQRSTUVWXYZ',

				// White background and border, black text and red grid
				'colors'        => array(
						'background' => array(255, 255, 255),
						'border' => array(255, 255, 255),
						'text' => array(25, 25, 25),
						'grid' => array(80, 80, 80)
				)
		);
		
		$this->form_validation->set_rules('name', 'نام شما', 'trim|required|min_length[3]|max_length[100]');
		$this->form_validation->set_rules('email', 'آدرس ایمیل', 'trim|required|valid_email');
		$this->form_validation->set_rules('message', 'پیغام', 'trim|required|min_length[10]|max_length[1000]');
		$this->form_validation->set_rules('spam_protection', 'Spam Protection', 'callback__spam_protection|required|trim|alpha_dash|min_length[2]|max_length[10]');
		
		if($this->form_validation->run() == FALSE)
		{
			// Set Captcha
			$cap = create_captcha($vals);
			$this->data['captcha'] = $cap['image'];
			$this->session->set_userdata('captchaWord',$cap['word']);
			// show the form
			$this->load->view('contact', $this->data);
		}
		else
		{
			// Sleep slows down brutes in case they break captcha
			sleep(1);
			
			// success! email it, assume it sent, then show contact success view.
			if ($this->send_mail())
			{
				$this->load->view('contact_success', $this->data);
			}
			else
			{
				log_message("error","Contact form - Error sending email. Debug message: " . $this->email->print_debugger() . " from: {$this->input->post('email')}. Message: {$this->input->post('message')}");
				$this->load->view('contact_error', $this->data);
			}
		}
		
		
	}
	
	
	
	/**/
	/* HELPER FUNCTIONS */
	/**/
	protected function send_mail()
	{
		$this->email->reply_to($this->input->post('email'));
		$this->email->from('info@webpurse.org');
		$this->email->to($this->config->item('webpurse_email'));
		$this->email->subject('WebPurse - Support');
		$message =  $this->input->post('message') . "\r\n --------- \r\n" .
					"Email: " . $this->input->post('email') . "\r\n" .
					"Name: " . $this->input->post('name') . "\r\n" .
					"IP: " . $this->input->ip_address();
		$this->email->message($message);
		return $this->email->send();
	}
	
	
	// the callback for checking the spam protection
	public function _spam_protection($str)
	{
		// we will assume the user is lazy with their caps lock
		$word = $this->session->userdata('captchaWord');
		if(strcmp(strtoupper($str),strtoupper($word)) == 0)
		{
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('_spam_protection', 'کد امنیتی صحیح نیست');
			return FALSE;
		}
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

}