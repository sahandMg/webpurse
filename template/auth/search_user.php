<?php $this->load->view('admin_header'); ?>

<div id="infoMessage"><?php echo $message;?></div>


<h1>جستجوی کاربر</h1>
<h2 style="color:green"><?php echo $search_display;?></h2>
<?php if($found_search > 0){echo $found_search . ' ' . "مورد یافت شد";}?>

<table cellpadding=0 cellspacing=1>
	<tr>
		<th>ID</th>
		<th><?php echo lang('index_fname_th');?></th>
		<th><?php echo lang('index_lname_th');?></th>
		<th><?php echo lang('index_email_th');?></th>
		<th><?php echo lang('index_status_th');?></th>
		<th><?php echo lang('index_verifies_th');?></th>
		<th><?php echo lang('index_allow_exchange_th');?></th>
		<th><?php echo lang('index_action_th');?></th>
		<th>مشاهده</th>
	</tr>
	<?php if ($found_search < 1)
	{
		echo '<tr><td colspan="8">موردی یافت نشد</td></tr>';
	}
	?>
	<?php foreach ($users as $user):?>
		<tr>
            <td><?php echo $user->id;?></td>
            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
			<td class="<?php if ($user->active){echo 'user_active';}else{echo 'user_inactive';}?>"><?php if ($user->id > 1){echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));}else{echo '-';}?></td>
			<td style="padding:3px;">
				<table id="verify_status">
					<tr>
						<th>نام</th>
						<th>آدرس</th>
						<th>کد ملی</th>
						<th>موبایل</th>
						<th>تلفن</th>
					</tr>
					<tr>
						<td class="v<?php echo $user->verify_name;?>"><?php if(intval($user->verify_name)===0){echo 'خیر';}else{echo 'بله';}?></td>
						<td class="v<?php echo $user->verify_address;?>"><?php if(intval($user->verify_address)===0){echo 'خیر';}else{echo 'بله';}?></td>
						<td class="v<?php echo $user->verify_melli;?>"><?php if(intval($user->verify_melli)===0){echo 'خیر';}else{echo 'بله';}?></td>
						<td class="v<?php echo $user->verify_mobile;?>"><?php if(intval($user->verify_mobile)===0){echo 'خیر';}else{echo 'بله';}?></td>
						<td class="v<?php echo $user->verify_phone;?>"><?php if(intval($user->verify_phone)===0){echo 'خیر';}else{echo 'بله';}?></td>
					</tr>
				</table>
			</td>
			<td class="<?php if(intval($user->allow_exchange)===1){echo 'user_active';}else{echo 'user_inactive';}?>"><?php if(intval($user->allow_exchange)===0){echo 'ندارد';}else{echo 'بله';}?></td>
			<td><?php echo anchor("auth/edit_user/".$user->id, 'ویرایش') ;?></td>
			<td><?php echo anchor("auth/user_exchanges/".$user->id, 'معاملات') ;?></td>
		</tr>
	<?php endforeach;?>
</table>

<br>
<h1>جستجوی کاربر</h1>
<?php echo form_open(current_url());?>

<select name="search_user_method">
	<option value="first_name">نام</option>
	<option value="last_name">نام خانوادگی</option>
	<option value="email" selected="selected">ایمیل</option>
	<option value="mobile">تلفن همراه</option>
	<option value="phone">تلفن ثابت</option>
	<option value="melli">شماره ملی</option>
	<option value="ip_address">آی پی آدرس ثبت نام</option>
</select>
<input type="text" value="" autocomplete="off" placeholder="نیازی نیست کامل وارد کنید" name="search_user_value"><br>

<p><?php echo form_submit('submit', 'بگرد');?></p>
<?php echo form_close();?>

<br><br><br>
<?php $this->load->view('admin_footer'); ?>