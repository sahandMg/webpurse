<?php $this->load->view('admin_header'); ?>

<div id="infoMessage"><?php echo $message;?></div>

<h1>حساب های پرداخت ارزی</h1>


<h3>پرفکت مانی</h3>
<?php echo form_open(uri_string());?>
	
	<input type="hidden" name="cat" value="foreign">
	<input type="hidden" name="ec" value="perfectmoney">
	
	<!-- Prevent Auto Complete -->
	<div style="display:none">
		<input type="text" name="username" style="display:none" value="">
		<input type="password" name="password" style="display:none" value="">
	</div>
	<!-- / Prevent Auto Complete -->
	
	<p>
		Account ID
		<br />
		<?php echo form_input($perfectmoney_account_id);?>
    </p>
    
    <p>
		Passphrase
		<br />
		<?php echo form_input($perfectmoney_passphrase);?>
    </p>
    
    <p>
		Payer (U...) Account
		<br />
		<?php echo form_input($perfectmoney_payer_account);?>
    </p>
	
	<p><?php echo form_submit('submit', 'ذخیره تغییرات');?></p>

<?php echo form_close();?>

<br><br>

<h3>بیتکوین بلاک.یو</h3>
<?php echo form_open(uri_string());?>
	
	<input type="hidden" name="cat" value="foreign">
	<input type="hidden" name="ec" value="bitcoin_blockio">
	
	<!-- Prevent Auto Complete -->
	<div style="display:none">
		<input type="text" name="username" style="display:none" value="">
		<input type="password" name="password" style="display:none" value="">
	</div>
	<!-- / Prevent Auto Complete -->
	
	<p>
		Bitcoin API Key
		<br />
		<?php echo form_input($bitcoin_blockio_api_key);?>
    </p>
    
    <p>
		Secret Pin
		<br />
		<?php echo form_input($bitcoin_blockio_secret_pin);?>
    </p>
    
    <p>مقدار فی
		<br />
		<?php
	     	$blockio_fee_options = array(
	     		'low'    => 'low',
	     		'medium' => 'medium',
	     		'high'   => 'high'
	     	);
		?>
		<?php echo form_dropdown('bitcoin_blockio_fee', $blockio_fee_options, $bitcoin_blockio_fee['value']);?>
    </p>
	
	<p><?php echo form_submit('submit', 'ذخیره تغییرات');?></p>

<?php echo form_close();?>


<br><br>


<h3>وب مانی</h3>
<?php echo form_open(uri_string());?>
	
	<input type="hidden" name="cat" value="foreign">
	<input type="hidden" name="ec" value="webmoney">
	
	<!-- Prevent Auto Complete -->
	<div style="display:none">
		<input type="text" name="username" style="display:none" value="">
		<input type="password" name="password" style="display:none" value="">
	</div>
	<!-- / Prevent Auto Complete -->
	
	<p>
		WMID
		<br />
		<?php echo form_input($webmoney_wmid);?>
    </p>

	<p>
		Sender's WM purse
		<br />
		<?php echo form_input($webmoney_sender_purse);?>
    </p>

	<p>
		Key File Name
		<br />
		<?php echo form_input('webmoney_key_file_name',$webmoney_key_file_name['value'],'style="text-align:left !important;direction:ltr !important;"');?>
    </p>

	<p>
		Password
		<br />
		<?php echo form_input($webmoney_password);?>
    </p>
	
	<p><?php echo form_submit('submit', 'ذخیره تغییرات');?></p>

<?php echo form_close();?>




<br><br>

<?php echo form_open(uri_string());?>

<h1>درگاه های ریالی</h1>

درگاه
<select name="bank_gateway_use">
	<option value="pasargad" <?php if($gateway == 'pasargad'){echo 'selected="selected"';}?>>پاسارگاد</option>
	<option value="mellat" <?php if($gateway == 'mellat'){echo 'selected="selected"';}?>>ملت</option>

			
	<option value="vpasargad" <?php if($gateway == 'vpasargad'){echo 'selected="selected"';}?>>درگاه واسط - پاسارگاد   </option>
	<option value="vmellat" <?php if($gateway == 'vmellat'){echo 'selected="selected"';}?>>درگاه واسط - ملت </option>
	<option value="vpayir" <?php if($gateway == 'vpayir'){echo 'selected="selected"';}?>>درگاه واسط - درگاه پی</option>
		<option value="vparsian" <?php if($gateway == 'vparsian'){echo 'selected="selected"';}?>>درگاه واسط -پارسیان</option>
			<option value="vzarinpal" <?php if($gateway == 'vzarinpal'){echo 'selected="selected"';}?>>درگاه واسط -زرین  پال</option>
			<option value="vsaman" <?php if($gateway == 'vsaman'){echo 'selected="selected"';}?>>درگاه واسط - سامان</option>
			
</select>

<h3>بانک پاسارگاد</h3>
	
	<input type="hidden" name="cat" value="iran">
		
	<!-- Prevent Auto Complete -->
	<div style="display:none">
		<input type="text" name="username" style="display:none" value="">
		<input type="password" name="password" style="display:none" value="">
	</div>
	<!-- / Prevent Auto Complete -->
	
	<p>
		Merchant Code
		<br />
		<?php echo form_input($bank_pasargad_merchant_code);?>
    </p>
    
    <p>
		Terminal Code
		<br />
		<?php echo form_input($bank_pasargad_terminal_code);?>
    </p>

<h3>بانک ملت</h3>
	
	<p>
		Terminal ID
		<br />
		<?php echo form_input($bank_mellat_terminal_id);?>
    </p>
    
    <p>
		Mellat Username
		<br />
		<?php echo form_input($bank_mellat_username);?>
    </p>
    
    <p>
		Mellat Gateway Password
		<br />
		<?php echo form_input($bank_mellat_password);?>
    </p>
    
	<p><?php echo form_submit('submit', 'ذخیره تغییرات');?></p>

<?php echo form_close();?>



<br><br>

<?php $this->load->view('admin_footer'); ?>