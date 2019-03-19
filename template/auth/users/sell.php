<?php $this->load->view('header'); ?>

<h1>فروش
	<?php echo $persian_name;?>
	به ما
</h1>

<div id="infoMessage"><?php echo $message;?></div>

<pre><?php echo $description;?></pre>

<?php if($has_another_exchange !== FALSE){?>
<h2 style="color:#0B79A9;">
امروز فروش های دیگری نیز داشته اید
باقیمانده مجاز فروش امروز:
<?php echo $max_amount;?>
</h2>
<?php }?>

<?php echo form_open(current_url());?>

	<p>
		<span>مقدار جهت فروش</span> <span>(حداکثر <?php echo $max_amount . ' ' . $unit;?>)</span>
		<br>
		<input name="amount" style="font-family:Tahoma;font-size:13px;text-align:center;direction:ltr;" id="amount" autocomplete="off" value="" onchange="calculate()" onkeyup="calculate()" onfocusout="calculate()" onactivate="calculate()" ondeactivate="calculate()">
	</p>
	
	<p>
		<span>مبلغ ریالی که دریافت می کنید</span>
		<br>
		<strong style="padding:10px;background:#CCC;display:inline-block;margin:5px 0;"><span id="calculate">0</span> <span>تومان</span></strong>
	</p>
	
	<p>
		<?php if($no_card === TRUE){echo '<h3 style="color:red;font-size:18px;">خطا: لطفا ابتدا از لینک زیر کارت بانکی عضو شبکه شتاب خود را وارد نمایید</h3>';}else{?>
		<span>انتخاب کنید مبلغ به کدام حساب شما واریز شود</span>
		<div style="height:5px;"></div>
		<?php echo form_dropdown($user_bank_info);?>
		&nbsp;
		<?php }?>
		<?php echo anchor('auth/your_accounts/#riali', 'ویرایش حسابها', 'style="color:#F17607;border:1px solid #FFA09D;padding:5px;margin-top:10px;border-radius:4px;"');?>
		<br><br>
	</p>
	
	<p>
		<span>مشخصات واریز <?php echo $persian_name;?></span>
		<br>
		<?php echo form_textarea($extra_info);?>
	</p>
	
	<p><?php echo form_submit('submit', 'ارسال');?></p>

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