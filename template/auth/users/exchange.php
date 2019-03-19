<?php $this->load->view('header'); ?>

<style>
td span{font-family:Tahoma;font-size:12px;padding:0px 10px;color:#2B88CB;}
</style>

<h1>خرید و فروش</h1>

<div id="infoMessage"><?php echo $message;?></div>

<?php if(intval($user->allow_exchange)===0){?>
<br>
مشخصات شما وریفای نشده است و مجاز به انجام مبادله نیستید، لطفا جهت وریفای

&nbsp;
<?php echo anchor('/auth/verify/', 'اینجا');?>
&nbsp;

کلیک کنید
<?php }else{?>

	<table class="features-table">
		<thead>
		<tr>
			<td></td>
			<td>خرید از ما</td>
			<td>فروش به ما</td>
		</tr>
		</thead>
		<tbody>
		<!-- PERFECTMONEY -->
		<?php if($active['perfectmoney'] === 1){?>
		<tr>
			<td>پرفکت مانی<span>موجودی <?php echo $available['perfectmoney'];?> دلار</span></td>
			<td><?php echo anchor('auth/buy/perfectmoney', 'خرید'.' ('.$buy_price['perfectmoney'].')');?> <span class="automatic">(اتوماتیک)</span></td>
			<td><?php echo anchor('auth/sell/perfectmoney', 'فروش'.' ('.$sell_price['perfectmoney'].')');?></td>
		</tr>
		<?php }?>
		<!-- BITCOIN -->
		<?php if($active['bitcoin'] === 1){?>
		<tr>
			<td>بیتکوین<span>موجودی <?php echo $available['bitcoin'];?> بیتکوین</span></td>
			<td><?php echo anchor('auth/buy/bitcoin', 'خرید'.' ('.$buy_price['bitcoin'].')');?> <span class="automatic">(اتوماتیک)</span></td>
			<td><?php echo anchor('auth/sell/bitcoin', 'فروش'.' ('.$sell_price['bitcoin'].')');?></td>
		</tr>
		<?php }?>
		<!-- OKPAY -->
		<?php if($active['okpay'] === 1){?>
		<tr>
			<td>اوکی پی<span>موجودی <?php echo $available['okpay'];?> دلار</span></td>
			<td><?php echo anchor('auth/buy/okpay', 'خرید'.' ('.$buy_price['okpay'].')');?></td>
			<td><?php echo anchor('auth/sell/okpay', 'فروش'.' ('.$sell_price['okpay'].')');?></td>
		</tr>
		<?php }?>
		<!-- PAYPAL -->
		<?php if($active['paypal'] === 1){?>
		<tr>
			<td>پی پال<span>موجودی <?php echo $available['paypal'];?> دلار</span></td>
			<td><?php echo anchor('auth/buy/paypal', 'خرید'.' ('.$buy_price['paypal'].')');?></td>
			<td><?php echo anchor('auth/sell/paypal', 'فروش'.' ('.$sell_price['paypal'].')');?></td>
		</tr>
		<?php }?>
		<!-- WEBMONEY -->
		<?php if($active['webmoney'] === 1){?>
		<tr>
			<td>وب مانی<span>موجودی <?php echo $available['webmoney'];?> دلار</span></td>
			<td><?php echo anchor('auth/buy/webmoney', 'خرید'.' ('.$buy_price['webmoney'].')');?> <span class="automatic">(اتوماتیک)</span></td>
			<td><?php echo anchor('auth/sell/webmoney', 'فروش'.' ('.$sell_price['webmoney'].')');?></td>
		</tr>
		<?php }?>
		<!-- SKRILL -->
		<?php if($active['skrill'] === 1){?>
		<tr>
			<td>اسکریل<span>موجودی <?php echo $available['skrill'];?> دلار</span></td>
			<td><?php echo anchor('auth/buy/skrill', 'خرید'.' ('.$buy_price['skrill'].')');?></td>
			<td><?php echo anchor('auth/sell/skrill', 'فروش'.' ('.$sell_price['skrill'].')');?></td>
		</tr>
		<?php }?>
		<!-- BTCE -->
		<?php if($active['btce'] === 1){?>
		<tr>
			<td>بی تی سی - ای<span>موجودی <?php echo $available['btce'];?> دلار</span></td>
			<td><?php echo anchor('auth/buy/btce', 'خرید'.' ('.$buy_price['btce'].')');?></td>
			<td><?php echo anchor('auth/sell/btce', 'فروش'.' ('.$sell_price['btce'].')');?></td>
		</tr>
		<?php }?>
		</tbody>
	</table>
	
<?php }?>

<?php $this->load->view('footer'); ?>