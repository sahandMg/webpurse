<?php $this->load->view('admin_header'); ?>

<h1 style="color:green"><?php echo $name;?></h1>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(current_url());?>
      
<div style="background: #FFF;margin: 10px 0;padding: 10px">
<h3>قیمت خرید و موجودی</h3>

     <table>
      	<tr>
      		<th>قیمت خرید از سایت</th>
      		<th>قیمت فروش به سایت</th>
      		<th>موجودی</th>
      	</tr>
      	<tr>
      		<td><?php echo form_input($buy_price);?></td>
      		<td><?php echo form_input($sell_price);?></td>
      		<td><?php echo form_input($available);?></td>
      	</tr>
      </table>
      <p><?php echo form_submit('submit', 'ویرایش');?></p>
</div>

<div style="background: #DEDEDE;margin: 10px 0;padding: 10px">
<h3>محدودیت خرید از سایت</h3>
      <table>
      	<tr>
      		<th>حداقل خرید از سایت</th>
      		<th>حداکثر خرید از سایت</th>
      	</tr>
      	<tr>
      		<td><?php echo form_input($buy_min_amount);?></td>
      		<td><?php echo form_input($buy_max_amount);?></td>
      	</tr>
      </table>
</div>

<div style="background: #DEDEDE;margin: 10px 0;padding: 10px">
<h3>محدودیت فروش به سایت</h3>


     <table>
      	<tr>
      		<th>حداقل فروش به سایت</th>
      		<th>حداکثر فروش به سایت</th>
      	</tr>
      	<tr>
      		<td><?php echo form_input($sell_min_amount);?></td>
      		<td><?php echo form_input($sell_max_amount);?></td>
      	</tr>
      </table>
</div>
      
<div style="background: #DEDEDE;margin: 10px 0;padding: 10px">
<h3>مدیریت ارز</h3>

      <table>
      	<tr>
	      	<th>بدون موجودی</th>
      		<th>غیر فعال به صورت موقت</th>
      		<th>فعال</th>
      	</tr>
      	<tr>
	 		<td><?php echo form_checkbox($contact);?></td>
      		<td><?php echo form_checkbox($temp_disable);?></td>
      		<td><?php echo form_checkbox($active);?></td>
      	</tr>
      </table>
</div>

      <br>
      توضیحات
      <br>
      <?php echo form_textarea($description);?>

      <p><?php echo form_submit('submit', 'ویرایش');?></p>

<?php echo form_close();?>

<?php $this->load->view('admin_footer'); ?>