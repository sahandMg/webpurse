<?php $this->load->view('silo_header'); ?>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/login");?>
    <h1>ورود اعضا</h1>
    <?php echo form_input($identity);?>
    <?php echo form_input($password);?>
    <?php echo form_submit('submit', lang('login_submit_btn'));?>
<?php echo form_close();?>

<p><a href="/index.php/auth/register">ثبت نام در سایت</a></p>
<p><a href="/index.php/auth/forgot_password"><?php echo lang('login_forgot_password');?></a></p>

<?php $this->load->view('silo_footer'); ?>