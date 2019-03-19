<?php $this->load->view('admin_header'); ?>

<h1>جستجوی اکسچنج</h1>
<h2 style="color:green"><?php echo $search_display;?></h2>
<?php if($found_search > 0){echo $found_search . ' ' . "مورد یافت شد";}?>

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
			<th>ایمیل</th>
		</tr>
		<?php if($found_search == 0){echo '<tr><td colspan="13">موردی یافت نشد</td></tr>';}?>
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
			<td><?php echo $trans['admin_note'];?></td>
			<td><?php echo $trans['bank_transaction_reference_id'];?></td>
			<td><?php echo $trans['batch'];?></td>
			<td><?php echo html_escape($trans['extra_info']);?></td>
			<td><?php echo $trans['email'];?></td>
		</tr>
		<?php endforeach;?>
	</table>

<br>
<h1>جستجوی مقدار ثابت</h1>
<?php echo form_open(current_url());?>
<select name="search_exchange_method">
	<option value="amount">مبلغ ارزی</option>
	<option value="rials">مبلغ به تومان</option>
	<option value="ip_address">آی پی آدرس</option>
	<option value="transaction_id" selected="selected">شماره پیگیری WebPurse</option>
	<option value="user_bank_info">حساب / کارت بانکی</option>
	<option value="bank_transaction_reference_id">شماره تراکنش بانکی</option>
	<option value="batch">Batch</option>
</select>
<select name="search_like_or_exact">
	<option value="exactly">دقیقا این مورد:</option>
	<option value="like" selected="selected">مقادیر مشابه (کامل وارد نمیکنید):</option>
</select>
<input type="text" value="" autocomplete="off" placeholder="نیازی نیست کامل وارد کنید" name="search_exchange_value" style="direction:ltr;text-align:left;"><br>

<p><?php echo form_submit('submit', 'بگرد');?></p>
<?php echo form_close();?>

<br>
<h1>جستجو در محدوده زمانی</h1>
<?php echo form_open(current_url());?>
YYYY-MM-DD<br>
<input type='hidden' name='search_exchange_method' value='time_range'>
<input type='hidden' name='search_exchange_value' value='range'>
<input type="text" value="" autocomplete="off" placeholder="2016-05-20" name="search_exchange_from"><br>
<input type="text" value="" autocomplete="off" placeholder="2016-07-31" name="search_exchange_to"><br>
<p><?php echo form_submit('submit', 'بگرد');?></p>
<?php echo form_close();?>

<br>
<h1>جستجو در محدوده مبلغ ارزی</h1>
<?php echo form_open(current_url());?>
<input type='hidden' name='search_exchange_method' value='amount_range'>
<input type='hidden' name='search_exchange_value' value='range'>
<input type="text" value="" autocomplete="off" placeholder="100" name="search_exchange_from"><br>
<input type="text" value="" autocomplete="off" placeholder="200" name="search_exchange_to"><br>
<p><?php echo form_submit('submit', 'بگرد');?></p>
<?php echo form_close();?>


<br><br><br>

<?php $this->load->view('admin_footer'); ?>