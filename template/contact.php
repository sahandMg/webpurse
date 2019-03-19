<?php $this->load->view('header'); ?>

<h1>تماس با ما</h1>

<h3>فرم تماس</h3><br>

<?php echo validation_errors(); ?>
<?
	echo form_open(current_url()); 
?>

<style>
.features-table input[type="text"],.features-table textarea{width:70%;background:#FFF;}
.captcha_im img{float:right !important;}
</style>

	<table class="features-table">
	<?php
		echo "<tr>
			<td>" . form_label('نام: ', 'name') . "</td>
			<td>" . form_input('name', set_value('name'), 'required') . "</td>
			</tr>";
		echo "<tr>
			<td>" . form_label('ایمیل: ', 'email'). "</td>
			<td>" . form_input('email', set_value('email'), 'required') . "</td>
			</tr>";
		echo "<tr>
			<td>".form_label('پیغام: ', 'message'). "</td>
			<td><textarea name='message' required=''>" . set_value("message") . "</textarea></td>
			</tr>";
		echo "<tr>
			<td class='captcha_im'>" . $captcha . "</td>
			<td>" . form_input('spam_protection', set_value('spam_protection'), 'required') . "</td>
			</tr>";
	?>
	</table><br><br>
	<?php echo form_submit('submit', 'ارسال');?>
<?
	echo form_close();
?>
<br>

 <h1 class="title">پشتیبانی در دسترس</h1>
                        <p class="subtitle">با ما از طریق راههای ارتباطی زیر در تماس باشید</p>
                        <p>
	                        <a href="ymsgr:sendIM?azadi_1984"><img src="/assets/images/yahoo.png" style="margin-right: 25px;"></a>
	                        <a target="_blank" href="https://telegram.me/webpurse"><img src="/assets/images/telegram.png"></a>
                        </p>

<h3>آدرس</h3>
<p>کرمان  خیابان پروین اعتصامی  کوچه 12  پلاک 4 واحد 5</p>


<h3>تلفن ثابت</h3>
<p>0343-2122344</p>


<h3>موبایل</h3>
<p>09131977837</p>

<?php $this->load->view('footer'); ?>