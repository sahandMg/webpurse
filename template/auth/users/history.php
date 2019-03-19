<?php $this->load->view('header'); ?>

<h1>خرید و فروش های ثبت شده شما</h1>

<style>
body{min-width:800px !important;}
.features-table{overflow-y: auto; overflow-x: auto;}
.features-table td:nth-child(2), .features-table td:nth-child(3), .features-table td:nth-child(4){background: none;}
.features-table thead td:first-child {border-top: 0 !important;border-right: 0 !important;background: #FFFFFF;}
.features-table tr td{border-right:1px solid #FFFFFF;font-size:11px;}
.features-table tr td:first-child {border-right:1px solid #EAEAEA;}
.features-table tr td:last-child {border-left:1px solid #EAEAEA;}
.features-table thead tr td{font-size:20px !important;color:#333;}
.is_small {color:#666666 !important;font-size:10px;}
.historytr td em {
 font-style:normal;
 display:inline-block;
 color:#555;
 max-width:190px;
 white-space: pre-wrap;
 white-space: -moz-pre-wrap;
 white-space: -pre-wrap;
 white-space: -o-pre-wrap;
 word-wrap: break-word;}
</style>

<div id="infoMessage"><?php echo $message;?></div>

<style>
.features-table thead tr td{font-size:15px !important;}
.features-table tr td{padding:0px !important;}
</style>

	<table class="features-table">
		<thead>
		<tr>
			<td></td>
			<td>شماره پیگیری</td>
			<td>نوع</td>
			<td>تاریخ</td>
			<td>مبلغ</td>
			<td>نام پول</td>
			<td>حساب/کارت</td>
			<td>Batch</td>
			<td>وضعیت</td>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($transactions as $trans):?>
		<tr class="historytr">
			<td style="text-align:center;"><?php static $i=1;echo $i;$i++;?></td>
			<td><?php echo $trans['transaction_id'];?></td>
			<td><?php if($trans['buy_or_sell'] == 'sell'){echo 'فروش';}else{echo 'خرید';}?></td>
			<td style="direction: ltr;text-align: center;"><?php echo date("Y-m-d",strtotime("{$trans['date']}")).'<br><small class="is_small">'.date("H:i:s",strtotime("{$trans['date']}")).'</small>';?></td>
			<td><?php echo $trans['amount'];?><br><small class="is_small"><?php echo $trans['unit'];?></small></td>
			<td><?php echo ucfirst($trans['ecurrency']);?></td>
			<td><?php echo $trans['user_bank_info'];?></td>
			<td style="font-size:10px;"><em><?php if(!empty($trans['batch'])){echo $trans['batch'];}else{echo 'پرداخت دستی';}?></em></td>
			<td style="font-size:10px;background:<?php if(intval($trans['completed']) === 1){echo '#D0EBD6;"';}else{echo '#FEF5E5';}?>"><?php if(intval($trans['completed']) === 1){echo 'انجام شده';}else{echo 'بررسی';}?><?php if(intval($trans['wm_protect']) === 1){echo "<br><span style='font-family:Arial;'>کد {$trans['wm_code']}</span>";}?></td>
		</tr>
		<?php endforeach;?>
		</tbody>
	</table>

<?php $this->load->view('footer'); ?>