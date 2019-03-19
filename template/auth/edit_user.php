<?php $this->load->view('admin_header'); ?>

<h1><?php echo lang('edit_user_heading');?></h1>
<p><?php echo lang('edit_user_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(uri_string());?>

	  <div style="float:left;"><?php if(isset($checked_img) && $checked_img !== FALSE){echo 'Checked<br>';}?><?php if($img_safe !== TRUE){echo '<h1 style="color:red">POSSIBLY DANGEROUS IMAGE</h1>';}?><img src="<?php echo $document_image;?>" title="Verify Document" style="max-width:500px;"><br><br><?php echo anchor("auth/delete_img/{$user->id}/{$file_ext}", 'حذف این تصویر از هاست', "onclick=\"return confirm('مطمئن به حذف تصویر هستید؟')\"");?></div>
		
      <h3><?php echo lang('edit_user_allow_exchange_heading');?></h3>

      <?php
      	$verify_options = array(
        	'1' => 'بله',
        	'0' => 'خیر'
		);
	  ?>
	  
	  <p>
            <?php echo lang('edit_user_allow_exchange_label', 'allow_exchange');?> <br />
            <?php echo form_dropdown('allow_exchange', $verify_options, $allow_exchange['value']);?>
      </p>


      <h3><?php echo lang('edit_user_verifies_heading');?></h3>
      
      <p>
            <?php echo lang('edit_user_verify_name_label', 'verify_name');?> <br />
            <?php echo form_dropdown('verify_name', $verify_options, $verify_name['value']);?>
      </p>
      
      <p>
            <?php echo lang('edit_user_verify_address_label', 'verify_address');?> <br />
            <?php echo form_dropdown('verify_address', $verify_options, $verify_address['value']);?>
      </p>
      
      <p>
            <?php echo lang('edit_user_verify_melli_label', 'verify_melli');?> <br />
            <?php echo form_dropdown('verify_melli', $verify_options, $verify_melli['value']);?>
      </p>
      
      <p>
            <?php echo lang('edit_user_verify_mobile_label', 'verify_mobile');?> <br />
            <?php echo form_dropdown('verify_mobile', $verify_options, $verify_mobile['value']);?>
      </p>
      
      <p>
            <?php echo lang('edit_user_verify_phone_label', 'verify_phone');?> <br />
            <?php echo form_dropdown('verify_phone', $verify_options, $verify_phone['value']);?>
      </p>
      
      
      
      <h3><?php echo lang('edit_user_heading');?></h3>


      <p>
            <?php echo lang('edit_user_fname_label', 'first_name');?> <br />
            <?php echo form_input($first_name);?>
      </p>

      <p>
            <?php echo lang('edit_user_lname_label', 'last_name');?> <br />
            <?php echo form_input($last_name);?>
      </p>
      
      <p>
            <?php echo lang('edit_user_melli_label', 'melli');?> <br />
            <?php echo form_input($melli);?>
      </p>
      
      <p>
            <?php echo lang('edit_user_address_label', 'address');?> <br />
            <?php echo form_input($address);?>
      </p>

      <p>
            <?php echo lang('edit_user_mobile_label', 'mobile');?> <br />
            <?php echo form_input($mobile);?>
      </p>

      <p>
            <?php echo lang('edit_user_phone_label', 'phone');?> <br />
            <?php echo form_input($phone);?>
      </p>

      <p>
            <?php echo lang('edit_user_email_label', 'email');?> <br />
            <?php echo form_input($email);?>
      </p>

      <p>
            <?php echo lang('edit_user_password_label', 'password');?> <br />
            <?php echo form_input($password);?>
      </p>

      <p>
            <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
            <?php echo form_input($password_confirm);?>
      </p>

      <?php if ($this->ion_auth->is_admin()): ?>

          <h3><?php echo lang('edit_user_groups_heading');?></h3>
          <?php foreach ($groups as $group):?>
          <?php if($group['name']=='admin'){CONTINUE;}?>
              <label class="checkbox">
              <?php
                  $gID=$group['id'];
                  $checked = null;
                  $item = null;
                  foreach($currentGroups as $grp) {
                      if ($gID == $grp->id) {
                          $checked= ' checked="checked"';
                      break;
                      }
                  }
              ?>
              <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
              <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
              <br>
              </label>
          <?php endforeach?>

      <?php endif ?>

      <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>

      <p><?php echo form_submit('submit', lang('edit_user_submit_btn'));?></p>

<?php echo form_close();?>

<p>
    آی پی آدرس<br />
    <?php echo html_escape($user->ip_address);?>
</p>


<p>
    زمان ثبت نام
    <br>
    <span style='display:inline-block;direction:ltr;text-align:left'><?php echo date('Y/M/d  H:i:s',$user->created_on);?></span>
</p>


<p>
    آخرین ورود
    <br>
    <span style='display:inline-block;direction:ltr;text-align:left'><?php echo date('Y/M/d  H:i:s',$user->last_login);?></span>
</p>


<h2>حساب های ارزی</h2>

<table>
	<tr>
		<td>PerfectMoney</td>
		<td><?php echo html_escape($user->perfectmoney_acc);?></td>
	</tr>
	<tr>
		<td>Bitcoin</td>
		<td><?php echo html_escape($user->bitcoin_acc);?></td>
	</tr>
	<tr>
		<td>OKPay</td>
		<td><?php echo html_escape($user->okpay_acc);?></td>
	</tr>
	<tr>
		<td>Paypal</td>
		<td><?php echo html_escape($user->paypal_acc);?></td>
	</tr>
	<tr>
		<td>Webmoney</td>
		<td><?php echo html_escape($user->webmoney_acc);?></td>
	</tr>
	<tr>
		<td>Skrill</td>
		<td><?php echo html_escape($user->skrill_acc);?></td>
	</tr>
	<tr>
		<td>BTC-E</td>
		<td><?php echo html_escape($user->btce_acc);?></td>
	</tr>
</table>


<h2>حساب های ریالی</h2>

<table>
	<tr>
		<td>حساب ملت</td>
		<td><?php echo html_escape($user->mellat_acc);?></td>
	</tr>
	<tr>
		<td>حساب سامان</td>
		<td><?php echo html_escape($user->saman_acc);?></td>
	</tr>
	<tr>
		<td>کارت بانکی</td>
		<td><?php echo html_escape($user->card_acc);?></td>
	</tr>
	<tr>
		<td>شبا</td>
		<td><?php echo html_escape($user->sheba_acc);?></td>
	</tr>
</table>

<br><br>
<h1>حذف کاربر</h1>
<?php echo form_open(uri_string());?>

      <p>
            جهت تایید کلمه YES را با حروف بزرگ تایپ کنید
            <br />
            <?php echo form_input($delete_yes);?>
      </p>

	  <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>
      <p><?php echo form_submit('submit', 'کاربر حذف شود');?></p>

<?php echo form_close();?>

<?php $this->load->view('admin_footer'); ?>