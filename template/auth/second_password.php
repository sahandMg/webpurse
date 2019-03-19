<!DOCTYPE html>
<html>
<head>
	<title>Second Password</title>
	<style>body{padding:3px;background:#ECECEC;}*{text-align:center;font-size:12px;font-family:Tahoma;}div.sec{border-radius:4px;padding:9px;background:rgba(255,255,255,0.35);border:1px solid #DDD;padding-bottom:15px;}p{background:rgba(255,255,255,0.2);padding:11px 5px;border:1px solid #DDD;margin-bottom:2px;border-radius:4px;}strong{color:#45AC53;background:#FFF;padding:4px 7px;border-radius:4px;}input{background:#FFF;border:1px solid #47AC43;padding:5px;border-radius:4px;}</style>
</head>
<body style="direction:rtl">

<div class="sec">
	<h1 style="font-family:Tahoma;font-size:14px;color:#003D8A;">رمز دوم را وارد کنید</h1>

	<?php if($message != '<p>ورود موفقیت آميز</p>'){?><div id="infoMessage" style="color:red;margin-bottom:6px;"><?php echo $message;?></div><?php }?>

	<?php echo form_open(current_url());?>
	<input type="password" value="" name="auto_complete_off" value="" style="display:none;">
		  <input type="password" autocomplete="off" name="second_pass" value="">
		  <?php echo form_hidden($csrf); ?>
		  <?php echo form_submit('submit', 'ورود');?>
	<?php echo form_close();?>
</div>

<br>

<?php if($bruters > 0){;?>
<p style="background:#FCF3E7;border:1px solid red;">
هشدار!
<strong style="color:red;"><?php echo $bruters;?></strong>
آی پی آدرس
جمعا
به تعداد
<strong style="color:red;"><?php echo $bruts;?></strong>
بار
سعی در ورود به ادمین داشته اند اطلاعات بیشتر در صفحه امنیت
</p>
<br>
<?php }?>


<p>
<strong><?php echo $pendings;?></strong>
اکسچنج در حال انتظار
</p>

<p>
<strong><?php echo $new_pending_members;?></strong>
کاربر جدید امروز در انتظار وریفای
</p>


<?php echo anchor('/auth/logout/', 'خروج', 'style="margin-top:20px;display:inline-block;text-decoration:none;padding:8px 20px;padding-bottom:9px;border:1px solid #CCC;background:rgba(255,255,255,0.4);color:#E07F00;border-radius:4px;"');?>

</body>
</html>