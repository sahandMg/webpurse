<?php $this->load->view('admin_header'); ?>

<div id="infoMessage"><?php echo $message;?></div>

<?php if($show_comments===TRUE){?>
<h1>تایید نظرات</h1>
<table cellpadding=0 cellspacing=1>
	<tr>
		<th>نام</th>
		<th>آی پی</th>
		<th>پیغام</th>
		<th>تایید</th>
		<th>حذف</th>
	</tr>
	<?php foreach ($comments as $comment):?>
		<tr>
            <td><?php echo htmlspecialchars($comment->name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($comment->ip,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($comment->comment,ENT_QUOTES,'UTF-8');?></td>
			<td><?php echo anchor("auth/comment_allow/".$comment->id, 'تایید') ;?></td>
			<td><?php echo anchor("auth/comment_delete/".$comment->id, 'حذف') ;?></td>
		</tr>
	<?php endforeach;?>
</table>
<br><br>
<?}?>


<h1><?php echo lang('index_heading') . " ({$count_users})";?></h1>

<p>
<?php if ($show_all === TRUE){?>
	لیست تمامی کاربران سایت از ابتدا (<?php echo anchor("auth/manager/", 'محدود به ۵۰') ;?>)
<?php }else{ ?>
	لیست ۵۰ کاربر اخیر (<?php echo anchor("auth/manager/show_all", 'نمایش همه') ;?>)
<?php } ?>

(<?php echo anchor("auth/search_user/", 'جستجو') ;?>)
</p>

<table cellpadding=0 cellspacing=1>
	<tr>
		<th>ID</th>
		<th><?php echo lang('index_fname_th');?></th>
		<th><?php echo lang('index_lname_th');?></th>
		<th><?php echo lang('index_email_th');?></th>
		<th><?php echo lang('index_groups_th');?></th>
		<th><?php echo lang('index_status_th');?></th>
		<th><?php echo lang('index_verifies_th');?></th>
		<th><?php echo lang('index_allow_exchange_th');?></th>
		<th><?php echo lang('index_action_th');?></th>
		<th>مشاهده</th>
	</tr>
	<?php foreach ($users as $user):?>
	<?php if (intval($user->id)===1){CONTINUE;}?>
		<tr>
            <td><?php echo $user->id;?></td>
            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
			<td>
				<?php foreach ($user->groups as $group):?>
					<?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
                <?php endforeach?>
			</td>
			<td class="<?php if ($user->active){echo 'user_active';}else{echo 'user_inactive';}?>"><?php if ($user->id > 1){echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));}else{echo '-';}?></td>
			<td style="padding:3px;">
				<table id="verify_status">
					<tr>
						<th>نام</th>
						<th>آدرس</th>
						<th>کدملی</th>
						<th>موبایل</th>
						<th>تلفن</th>
					</tr>
					<tr>
						<td class="v<?php echo $user->verify_name;?>"><?php if(intval($user->verify_name)===0){echo '&cross;';}else{echo '&check;';}?></td>
						<td class="v<?php echo $user->verify_address;?>"><?php if(intval($user->verify_address)===0){echo '&cross;';}else{echo '&check;';}?></td>
						<td class="v<?php echo $user->verify_melli;?>"><?php if(intval($user->verify_melli)===0){echo '&cross;';}else{echo '&check;';}?></td>
						<td class="v<?php echo $user->verify_mobile;?>"><?php if(intval($user->verify_mobile)===0){echo '&cross;';}else{echo '&check;';}?></td>
						<td class="v<?php echo $user->verify_phone;?>"><?php if(intval($user->verify_phone)===0){echo '&cross;';}else{echo '&check;';}?></td>
					</tr>
				</table>
			</td>
			<td class="<?php if(intval($user->allow_exchange)===1){echo 'user_active';}else{echo 'user_inactive';}?>"><?php if(intval($user->allow_exchange)===0){echo 'ندارد';}else{echo 'بله';}?></td>
			<td><?php echo anchor("auth/edit_user/".$user->id, 'ویرایش') ;?></td>
			<td><?php echo anchor("auth/user_exchanges/".$user->id, 'معاملات') ;?></td>
		</tr>
	<?php endforeach;?>
</table>

<p><?php echo anchor('auth/create_user', lang('index_create_user_link'))?> | <?php echo anchor('auth/create_group', lang('index_create_group_link'))?></p>
<br>
<?php $this->load->view('admin_footer'); ?>