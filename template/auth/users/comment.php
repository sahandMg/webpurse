<?php $this->load->view('header'); ?>

<h1>نظر خود را درباره ما بنویسید
</h1>

<h3>در صورت تایید مدیریت نظرات به زودی در صفحه اصلی قرار داده خواهند شد</h3>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(current_url());?>
<p>
	<span>نظر شما</span>
	<br>
	<?php echo form_textarea($comment);?>
</p>

<p><?php echo form_submit('submit', 'انجام شد');?></p>
<?php echo form_close();?>


<?php $this->load->view('footer'); ?>