<?php $this->load->view('admin_header'); ?>

<h1>لیست انجام شده ها 
<?php if ($count > $per_page && $start < ($count - $per_page)){echo "(<small>".anchor("auth/exchanges/".($start+$per_page), $per_page.' تای بعدی')."</small>)";}?>
<?php if ($count > $per_page && $start < ($count - $per_page)){echo "(<small>".anchor("auth/exchanges/all", 'نمایش همه')."</small>)";}?>
<?php echo "(<small>".anchor("auth/search_exchanges", 'جستجو')."</small>)";?>
</h1>

<h4 style='direction:ltr;text-align:left;display:inline-block;'><?php echo "زمان فعلی: ".date("Y-m-d H:i:s");?></h4>

<div id="infoMessage"><?php echo $message;?></div>

	<table>
		<tr>
			<th>شماره</th>
			<th>شماره پیگیری WebPurse</th>
			<th>نام کاربر</th>
			<th>خرید یا فروش</th>
			<th>تاریخ</th>
			<th>مبلغ</th>
			<th>نام پول</th>
			<th>ریالی</th>
			<th>حساب/کارت</th>
			<th>آی پی</th>
			<th>توضیحات مدیر</th>
			<th>تراکنش بانک</th>
			<th>Batch</th>
			<th>توضیحات کاربر</th>
			<th>رمز وب مانی</th>
		</tr>
		<?php foreach ($transactions as $trans):?>
		<tr>
			<td><?php echo $trans['id'];?></td>
			<td><?php echo $trans['transaction_id'];?></td>
			<td><?php echo html_escape($trans['user_name']);?></td>
			<td><?php if($trans['buy_or_sell'] == 'sell'){echo 'فروش به سایت';}else{echo 'خرید از سایت';}?></td>
			<td style="direction: ltr;text-align: center;"><?php echo $trans['date'];?></td>
			<td><?php echo $trans['amount'];?> <?php echo $trans['unit'];?></td>
			<td><?php echo ucfirst($trans['ecurrency']);?></td>
			<td><?php echo $trans['rials'];?></td>
			<td><?php echo html_escape($trans['user_bank_info']);?></td>
			<td><?php echo html_escape($trans['ip_address']);?></td>
			<td><?php echo html_escape($trans['admin_note']);?></td>
			<td><?php echo $trans['bank_transaction_reference_id'];?></td>
			<td><?php echo html_escape($trans['batch']);?></td>
			<td><?php echo html_escape($trans['extra_info']);?></td>
			<td><?php if(intval($trans['wm_protect']) === 1){echo html_escape($trans['wm_code']);}?></td>
		</tr>
		<?php endforeach;?>
	</table>

<?php $this->load->view('admin_footer'); ?>