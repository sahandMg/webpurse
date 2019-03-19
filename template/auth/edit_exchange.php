<?php $this->load->view('admin_header'); ?>

<h1>مدیریت دستی</h1>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(current_url());?>
<p>
	<span>توضیحات شما (مثلا مشخصات واریز یا هرچیز دیگر)</span>
	<br>
	<?php echo form_textarea($admin_note);?>
</p>

<p style="color:red">با کلیک بر روی لینک زیر این تراکنش انجام شده در نظر گرفته می شود</p>

<p><?php echo form_submit('submit', 'انجام شد');?></p>
<?php echo form_close();?>


<?php if($transactions[0]['buy_or_sell'] == 'sell'){?>
<h2>مبلغ ریالی</h2>
<div style="padding:5px;background:#FFF;border-radius:5px;display:inline-block;min-width:200px;"><?php echo $transactions[0]['rials'];?></div>
<?}?>


<br><br>
<h2>سایر مشخصات</h2>
	<table>
		<tr>
			<th>شماره</th>
			<th>نام کاربر</th>
			<th>خرید یا فروش</th>
			<th>تاریخ</th>
			<th>مبلغ</th>
			<th>نام پول</th>
			<th>حساب/کارت</th>
			<th>آی پی</th>
			<th>توضیحات کاربر</th>
		</tr>
		<?php foreach ($transactions as $trans):?>
		<tr>
			<td><?php echo $trans['id'];?></td>
			<td><?php echo html_escape($trans['user_name']);?></td>
			<td><?php if($trans['buy_or_sell'] == 'sell'){echo 'فروش';}else{echo 'خرید';}?></td>
			<td style="direction: ltr;text-align: center;"><?php echo $trans['date'];?></td>
			<td><?php echo $trans['amount'];?> <?php echo $trans['unit'];?></td>
			<td><?php echo ucfirst($trans['ecurrency']);?></td>
			<td><?php echo html_escape($trans['user_bank_info']);?></td>
			<td><?php echo html_escape($trans['ip_address']);?></td>
			<td><?php echo html_escape($trans['extra_info']);?></td>
		</tr>
		<?php endforeach;?>
	</table>
	
<h2>حساب های کاربر</h2>
<style>
.banks tr td {text-align:left;direction:ltr;}
</style>
	<table class="banks">
	<?php foreach ($transactions as $trans):?>
		<tr>
			<th style="width:50%">ملت</th>
			<td><?php echo html_escape($trans['mellat']);?></td>
		</tr>
		<tr>
			<th>سامان</th>
			<td><?php echo html_escape($trans['saman']);?></td>
		</tr>
		<tr>
			<th>شماره کارت</th>
			<td><?php echo html_escape($trans['card']);?></td>
		</tr>
		<tr>
			<th>شبا</th>
			<td><?php echo html_escape($trans['sheba']);?></td>
		</tr>
	<?php endforeach;?>
	</table>


<?php $this->load->view('admin_footer'); ?>