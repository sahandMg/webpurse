<?php $this->load->view('admin_header'); ?>

<h1>
لیست اکسچنج های کاربر
<?php echo html_escape($user->first_name); echo ' '; echo html_escape($user->last_name);?>
</h1>

<h2><?php echo $count_completed.' '."انجام شده";?></h2>
<h2><?php echo $count_pending.' '."در حال انتظار";?></h2>
<h2><?php echo $count_archive.' '."آرشیوی";?></h2>

<div id="infoMessage"><?php echo $message;?></div>

	<table>
		<tr>
			<th>شماره</th>
			<th>شماره پیگیری WebPurse</th>
			<th>خرید یا فروش</th>
			<th>تاریخ</th>
			<th>مبلغ</th>
			<th>نام پول</th>
			<th>ریالی</th>
			<th>حساب/کارت</th>
			<th>آی پی</th>
			<th>توضیحات مدیر</th>
			<th>Batch</th>
			<th>توضیحات کاربر</th>
		</tr>
		<?php foreach ($transactions as $trans):?>
		<tr>
			<td><?php echo $trans['id'];?></td>
			<td><?php echo $trans['transaction_id'];?></td>
			<td><?php if($trans['buy_or_sell'] == 'sell'){echo 'فروش به سایت';}else{echo 'خرید از سایت';}?></td>
			<td style="direction: ltr;text-align: center;"><?php echo $trans['date'];?></td>
			<td><?php echo $trans['amount'];?></td>
			<td><?php echo ucfirst($trans['ecurrency']);?></td>
			<td><?php echo $trans['rials'];?></td>
			<td><?php echo html_escape($trans['user_bank_info']);?></td>
			<td><?php echo html_escape($trans['ip_address']);?></td>
			<td><?php echo $trans['admin_note'];?></td>
			<td><?php echo $trans['batch'];?></td>
			<td><?php echo html_escape($trans['extra_info']);?></td>
		</tr>
		<?php endforeach;?>
	</table>

<?php $this->load->view('admin_footer'); ?>