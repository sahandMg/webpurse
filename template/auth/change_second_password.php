<?php $this->load->view('header'); ?>

<h1>تغییر رمز دوم</h1>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/change_second_password");?>

      <p>
            رمز دوم قبلی <br />
            <?php echo form_input($old_password);?>
      </p>

      <p>
            <label for="new_password"><?php echo sprintf('رمز دوم جدید حداقل %s حرف', $min_password_length);?></label> <br />
            <?php echo form_input($new_password);?>
      </p>

      <p>
            تکرار رمز دوم جدید <br />
            <?php echo form_input($new_password_confirm);?>
      </p>

      <p><?php echo form_submit('submit', lang('change_password_submit_btn'));?></p>

<?php echo form_close();?>

<?php $this->load->view('footer'); ?>