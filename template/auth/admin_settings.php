<?php $this->load->view('admin_header'); ?>

<h1>تنظیمات</h1>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(uri_string());?>
	
      <h3>خبر مهم بالای سایت</h3>

      <?php
      	$verify_options = array(
        	'1' => 'بله',
        	'0' => 'خیر'
		);
	  ?>
	  
	  <p>
            فعال باشد؟ <br />
            <?php echo form_dropdown('important_news', $verify_options, $important_news['value']);?>
      </p>

	
      <h3>درخواست پین برای خرید (ارسال کد به موبایل پیش از خرید)</h3>

      <?php
      	$verify_options = array(
        	'1' => 'بله',
        	'0' => 'خیر'
		);
	  ?>
	  
	  <p>
            فعال باشد؟ <br />
            <?php echo form_dropdown('require_pin_to_buy', $verify_options, $require_pin_to_buy['value']);?>
      </p>
      
      
      <h3>ارسال پیغام به شماره موبایل پس از پرداخت اتوماتیک</h3>

      <?php
      	$verify_options = array(
        	'1' => 'بله',
        	'0' => 'خیر'
		);
	  ?>
	  
	  <p>
            فعال باشد؟ <br />
            <?php echo form_dropdown('sms_after_money_sent', $verify_options, $sms_after_money_sent['value']);?>
      </p>
      
      <p>
            شماره ارسال پیامک <br />
            <?php echo form_input($sms_number);?>
      </p>
      
      <p><?php echo form_submit('submit', 'ویرایش تنظیمات');?></p>

<?php echo form_close();?>


<?php $this->load->view('admin_footer'); ?>