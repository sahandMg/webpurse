<?php $this->load->view('admin_header'); ?>

<div id="infoMessage"><?php echo $message;?></div>

<h1>آی پی های تحت نظر یا بلاک شده</h1>
<h4 style='direction:ltr;text-align:left;display:inline-block;'>Now: <?php echo date("Y-m-d H:i:s");?></h4>



<table>
	<tr>
		<th>IP</th>
		<th>نوع</th>
		<th>اولین تلاش</th>
		<th>آخرین تلاش</th>
		<th>تلاشها</th>
		<th>مسدود شده</th>
	</tr>
	<?php foreach ($ip_ban as $record):?>
	<tr>
		<td><?php echo $record['ip_address'];?></td>
		<td><?php echo $record['page'];?></td>
		<td><?php echo $record['first_date'];?></td>
		<td><?php if($record['last_date'] != '0000-00-00 00:00:00'){echo $record['last_date'];}else{echo '-';}?></td>
		<td><?php echo $record['count'];?> بار</td>
		<td><?php if(intval($record['ban'])===1){echo 'بله شده';}else{echo '-';}?></td>
	</tr>
	<?php endforeach;?>
</table>


<br><br>
<h1>اضافه کردن آی پی به لیست بلاک</h1>

<?php echo form_open(current_url());?>
	<input type="hidden" autocomplete="off" name="action" value="add_ip">
	<input type="text" autocomplete="off" name="ip_address" value="">
	<?php echo form_hidden($csrf); ?>
	<?php echo form_submit('submit', 'بلاک کن');?>
<?php echo form_close();?>


<br><br>
<h1>حذف آی پی از لیست بلاک</h1>

<?php echo form_open(current_url());?>
	<input type="hidden" autocomplete="off" name="action" value="delete_ip">
	<input type="text" autocomplete="off" name="ip_address" value="">
	<?php echo form_hidden($csrf); ?>
	<?php echo form_submit('submit', 'حذف از بلاک');?>
<?php echo form_close();?>




<?php $this->load->view('admin_footer'); ?>