<?php $this->load->view('header'); ?>

<h1>کد ارسال شده به موبایل خود را وارد کنید</h1>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/verify");?>
<input type="hidden" name="step" value="verify_mobile_code">
      <p>
      	تا چند لحظه دیگر کدی به موبایل شما ارسال می شود، کد را در باکس زیر وارد نمایید
      	<br>
      	<?php echo form_input('verify_code');?>
      </p>

      <p><?php echo form_submit('submit', 'کد را وارد کردم');?></p>

<?php echo form_close();?>


<?php $this->load->view('footer'); ?>