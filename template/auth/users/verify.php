<?php $this->load->view('header'); ?>

<style>
.features-table td:nth-child(2), .features-table td:nth-child(3), .features-table td:nth-child(4){background: none;}
.features-table thead td:first-child {border-top: 1px solid #eaeaea !important;}
.is_verified{background: #e7f3d4 !important;background: rgba(184,243,85,0.25) !important;}
#verify_status tr td{border-right:1px solid #FFFFFF;}
#verify_status tr td:first-child {border-right:1px solid #EAEAEA;}
#verify_status tr td:last-child {border-left:1px solid #EAEAEA;}
.verifytr {color:#FF614A;}
.verifytr .is_verified{color:#2DAD4B !important;}
#verify_status thead tr td{font-size:20px !important;color:#333;}
.verifytr td{font-weight:bold !important;text-align:center !important;font-family: Yekan, BMitra, Tahoma !important;font-size: 22px !important;padding-top:7px;}
</style>

<h1>وضعیت وریفای اکانت</h1>

تایید نام و کد ملی و شماره موبایل ضروری و وریفای باقی مشخصات اختیاری و یا بر اساس نظر مدیر لازم خواهد بود

<br><br>
<table id="verify_status" class="features-table">
	<thead>
	<tr>
		<td <?php if(intval($user->verify_name)===1){echo 'class="is_verified"';}?>>نام</td>
		<td <?php if(intval($user->verify_melli)===1){echo 'class="is_verified"';}?>>کد ملی</td>
		<td <?php if(intval($user->verify_mobile)===1){echo 'class="is_verified"';}?>>موبایل</td>
		<td <?php if(intval($user->verify_phone)===1){echo 'class="is_verified"';}?>>تلفن</td>
		<td <?php if(intval($user->verify_address)===1){echo 'class="is_verified"';}?>>آدرس</td>
	</tr>
	</thead>
	<tbody>
	<tr class="verifytr">
		<td class="v<?php echo $user->verify_name;?> <?php if(intval($user->verify_name)===1){echo 'is_verified';}?>"><?php if(intval($user->verify_name)===0){echo '&cross;';}else{echo '&check;';}?></td>
		<td class="v<?php echo $user->verify_melli;?> <?php if(intval($user->verify_melli)===1){echo 'is_verified';}?>"><?php if(intval($user->verify_melli)===0){echo '&cross;';}else{echo '&check;';}?></td>
		<td class="v<?php echo $user->verify_mobile;?> <?php if(intval($user->verify_mobile)===1){echo 'is_verified';}?>"><?php if(intval($user->verify_mobile)===0){echo '&cross;';}else{echo '&check;';}?></td>
		<td class="v8 <?php if(intval($user->verify_phone)===1){echo 'is_verified';}?>"><?php if(intval($user->verify_phone)===0){echo '&cross;';}else{echo '&check;';}?></td>
		<td class="v8 <?php if(intval($user->verify_address)===1){echo 'is_verified';}?>"><?php if(intval($user->verify_address)===0){echo '&cross;';}else{echo '&check;';}?></td>
	</tr>
	</tbody>
</table>
<br>

<div id="infoMessage" style="color:red"><?php echo $message;?></div>


<h3>1. وریفای شماره موبایل (اتوماتیک)</h3>
<?php if(intval($user->verify_mobile)===0){?>
<?php echo form_open("auth/verify");?>
<input type="hidden" name="step" value="mobile">
      <p>
      	از درستی شماره موبایل خود مطمئن شوید سپس بر روی کلید ارسال کد کلیک کنید
      	<br>
      	<?php echo form_input('mobile',$user->mobile);?>
      </p>

      <p><?php echo form_submit('submit', 'ارسال کد وریفای');?></p>

<?php echo form_close();?>
<?}else{?>
وریفای شده
<?php echo $user->mobile;?>
<?}?>

<br>

<h3>2. وریفای نام و کد ملی</h3>
<?php if(intval($user->verify_mobile)===0){?>
ابتدا شماره موبایل خود را وریفای کنید سپس میتوانید مدارک وریفای هویت را آپلود نمایید
<?php }elseif($did_upload === TRUE){?>
فایل با موفقیت آپلود شد، مدیریت ظرف روز کاری آینده آنرا تایید یا رد خواهد کرد
<?php }else{?>
<?php if(intval($user->verify_melli)===0){?>
<?php echo form_open_multipart("auth/verify");?>
<input type="hidden" name="step" value="melli">
      <p>
      	
      	<br>
      	<input type="file" name="scan" size="20" />
      </p>

      <p><?php echo form_submit('submit', 'آپلود فایل');?></p>

<?php echo form_close();?>
<?}else{?>
وریفای شده
<?}?>
<?}?>

<?php $this->load->view('footer'); ?>