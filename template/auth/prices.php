<?php $this->load->view('admin_header'); ?>

<h1>قیمت و موجودی</h1>

<div id="infoMessage"><?php echo $message;?></div>

      <table>
      	<tr>
      		<th>نام</th>
      		<th>قیمت خرید از سایت</th>
      		<th>قیمت فروش به سایت</th>
      		<th>موجودی</th>
      		<th>بدون موجودی</th>
      		<th>فعال</th>
      		<th>ویرایش</th>
      	</tr>
      	<?php foreach ($prices as $price):?>
      	<tr>
      		<td><?php echo htmlspecialchars($price->persian_name,ENT_QUOTES,'UTF-8');?></td>
      		<td><?php echo htmlspecialchars($price->buy_price,ENT_QUOTES,'UTF-8');?></td>
      		<td><?php echo htmlspecialchars($price->sell_price,ENT_QUOTES,'UTF-8');?></td>
      		<td><?php echo htmlspecialchars($price->available,ENT_QUOTES,'UTF-8');?></td>
      		<td <?php if(intval($price->contact)==1){echo "style='background:#FEF5E6'";}?>><?php if(intval($price->contact)==1){echo 'بله تماس بگیرید';}else{echo 'خیر';}?></td>
      		<td <?php if(intval($price->active)==1){echo "style='background:#E8F2E1'";}?>><?php if(intval($price->active)==1){echo 'بله';}else{echo 'خیر';}?></td>
      		<td><?php echo anchor("auth/edit_prices/".$price->id, 'ویرایش') ;?></td>
      	</tr>
      	<?php endforeach;?>
      </table>

<?php $this->load->view('admin_footer'); ?>