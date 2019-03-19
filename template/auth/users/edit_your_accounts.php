<?php $this->load->view('header'); ?>

<h1>تغییر حساب
<small><?php if($acc_name !== 'card'){echo ucfirst($acc_name);}else{echo 'کارت شتاب';}?></small>
</h1>
<h3>لطفا شماره حساب خود را با نهایت دقت وارد نمایید</h3>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(current_url());?>

      <p>
            حساب خود را به دقت وارد کنید <br />
            <?php echo form_input($new_account, "style='width:300px;'");?>
      </p>

      <p><?php echo form_submit('submit', 'ذخیره حساب');?></p>

<?php echo form_close();?>

<?php $this->load->view('footer'); ?>