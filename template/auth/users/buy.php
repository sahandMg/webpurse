<?php $this->load->view('header'); ?>
<?php if(isset($java)) echo $java; ?>
<h1>خرید
	<?php echo $persian_name;?>
	از ما
</h1>

<div id="infoMessage"><?php echo $message;?></div>

<h3><pre><?php echo $description;?></pre></h3>

<?php if($has_another_exchange !== FALSE){?>
<h2 style="color:#0B79A9;">
امروز خرید های دیگری نیز داشته اید
باقیمانده مجاز خرید امروز:
<?php echo $max_amount;?>
</h2>
<?php }?>

<?php echo form_open(current_url());?>

	<p>
		<span>مقدار جهت خرید</span> <span>(حداکثر <?php echo $max_amount . ' ' . $unit;?>)</span>
		<br>
		<input type="text" style="font-family:Tahoma;font-size:13px;text-align:center;direction:ltr;" name="amount" id="amount" autocomplete="off" value="" onchange="calculate()" onkeyup="calculate()" onfocusout="calculate()" onactivate="calculate()" ondeactivate="calculate()">
	</p>
	
	<p>
		<span>مبلغ ریالی که باید بپردازید</span>
		<br>
		<strong style="padding:10px;background:#CCC;display:inline-block;margin:5px 0;"><span id="calculate">0</span> <span>تومان</span></strong>
	</p>
	
	<p>
		<span>حساب شما (مبلغ به این حساب واریز می شود):</span>
		<br>
		<strong id="acc_to_pay" style="background:#CFE6E5;padding:5px 10px;display: inline-block;margin: 5px;margin-right: 0;"><?php echo $pay_to_account;?> <?php echo anchor("auth/edit_your_accounts/{$english_name}", '(ویرایش)', 'style="color:#F13F00;font-weight:bold;"');?></strong>
	</p>

<?php if (strtolower($english_name) == 'webmoney'){?>

<input type="checkbox" name="wm_protect" value="1">
مبلغ ارسالی با کد محافظت شود؟

در صورت تیک زدن کد را ذخیره کنید:
<span style="padding:8px;border:1px dotted #FF0F00;font-family:Arial;font-size:13px;font-weight:bold;"><?php echo $wm_code;?></span>

<br><br>

<?php }?>

	<p>
		<span>توضیحات</span>
		<br>
		<?php echo form_textarea($extra_info);?>
	</p>
	
	<p><?php if($havent_set_account != TRUE){echo form_submit('submit', 'ارسال');}else{echo '<span style="color:red;">'.'خطا: قبل از خرید باید حتما حساب خود را وارد کرده باشید، روی لینک ویرایش در کادر بالا کلیک کنید!'.'</span>';}?></p>

<?php echo form_close();?>

<script>
function calculate()
{
	var amount     = new Number(document.getElementById("amount").value);
	var max_amount = new Number('<?php echo $max_amount;?>');
	var value      = new Number('<?php echo $price;?>');
	
	if(isNaN(amount)){amount = 0;}
	
	if (amount > max_amount)
	{
		document.getElementById("calculate").innerHTML = Math.floor(max_amount * value);
		document.getElementById("amount").value = max_amount;
	}
	else
	{
		if (amount < 0)
		{
			document.getElementById("amount").value        = 0;
			document.getElementById("calculate").innerHTML = 0;
		}
		else
		{
			document.getElementById("calculate").innerHTML = Math.floor(amount * value);
		}
	}
}
</script>


<?php $this->load->view('footer'); ?>