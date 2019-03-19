<?php $this->load->view('admin_header'); ?>

<?php if($is_archive !== TRUE){?>
<h1><span>خرید و فروش در حال انتظار</span> <?php if ($count > $per_page && $start < ($count - $per_page)){echo "(<small>".anchor("auth/pending_exchanges/".($start+$per_page), $per_page.' تای بعدی')."</small>)";}?></h1>
<?php }else{?>
<h1 style='color:red'><?php echo "آرشیو اکسچنج های در حال انتظار - {$archive_per_page} مورد آخر";?></h1>
<h2>دقت کنید موارد زیر آرشیو شده هستند</h2>
<?php }?>
<div id="infoMessage"><?php echo $message;?></div>

	<table>
		<tr>
			<th>شماره</th>
			<th>شماره پیگیری</th>
			<th>نام کاربر</th>
			<th>نوع</th>
			<th>تاریخ</th>
			<th>مبلغ</th>
			<th>نام پول</th>
			<th>ریالی</th>
			<th>حساب/کارت</th>
			<th>حساب دلاری</th>
			<th>کد وب مانی</th>
			<?php if($is_archive === TRUE){?><th>آی پی</th><?php }?>
			<?php if($is_archive !== TRUE){?><th>مدیریت</th><?php }?>
		</tr>
		<?php if($count == 0){echo '<tr><td colspan=10>موردی یافت نشد</td></tr>';}?>
		<?php foreach ($transactions as $trans):?>
		<tr>
			<td style='font-size:10px;'><?php echo $trans['id'];?></td>
			<td style='font-size:9px;'><?php echo $trans['transaction_id'];?></td>
			<td><?php echo html_escape($trans['user_name']);?></td>
			<td style='font-size:10px;'><?php if($trans['buy_or_sell'] == 'sell'){echo 'فروش به سایت';}else{echo 'خرید از سایت';}?></td>
			<td style="direction: ltr;text-align: center;font-size:10px;"><?php echo date("d M H:i",strtotime("{$trans['date']}"));?></td>
			<td><?php echo $trans['amount'];?> <?php echo $trans['unit'];?></td>
			<td style='font-size:10px;'><?php echo ucfirst($trans['ecurrency']);?></td>
			<td><?php echo $trans['rials'];?></td>
			<td><?php echo html_escape($trans['user_bank_info']);?></td>
			<td style='font-size:10px;'><?php echo $trans['currency'];?></td>
			<td style='color:red;'><?php if(intval($trans['wm_protect'])===1){echo $trans['wm_code'];}?></td>
			<?php if($is_archive === TRUE){?><td><?php echo html_escape($trans['ip_address']);?></td><?php }?>
			<?php if($is_archive !== TRUE){?><td><?php echo anchor("auth/edit_exchange/{$trans['id']}", 'مدیریت');?></td><?php }?>
		</tr>
		<?php endforeach;?>
	</table>
<br>
<?php if($is_archive !== TRUE){?>
<?php echo form_open(uri_string());?>
	  <h2>آرشیو کردن تمامی اکسچنج های در حال انتظار</h2>
	  <h3><?php echo anchor("auth/pending_exchanges/archive/{$default_archive_per_page}", "مشاهده {$default_archive_per_page} مورد آرشیوی آخر");?></h3>
      <p>
            جهت تایید کلمه YES را با حروف بزرگ تایپ کنید
            <br />
            <?php echo form_input($delete_yes);?>
      </p>
      
      <?php echo form_hidden($csrf); ?>
      <p><?php echo form_submit('submit', 'آرشیو کن');?></p>

<?php echo form_close();?>
<?php }?>
<?php $this->load->view('admin_footer'); ?>