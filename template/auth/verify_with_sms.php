<?php $this->load->view('header'); ?>

<h1>کدی به موبایل شما ارسال شد، جهت تایید خرید کد را وارد نمایید</h1>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(current_url());?>
<input type="password" value="" name="auto_complete_off" value="" style="display:none;">
      <p>
            <label for="verify_code">رمز دوم</label> <br />
            <input type="password" autocomplete="off" name="verify_code" value="">
      </p>
      
      <p><?php echo form_submit('submit', 'کد وارد شد');?></p>

<?php echo form_close();?>

<?php $this->load->view('footer'); ?>