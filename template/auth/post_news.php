<?php $this->load->view('admin_header'); ?>

<h1>ارسال خبر</h1>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/post_news/");?>

  عنوان
  <br>
  <input type="text" style="width:200px;" name="title" value="" autocomplete="off">
  
  <br>
  
  خبر
  <br>
  <textarea name="news" style="width:400px;height:200px;"></textarea>

  <?php echo form_hidden($csrf); ?>

  <p><?php echo form_submit('submit', 'ارسال');?></p>

<?php echo form_close();?>

<table>
	<tr>
		<th>#</th>
		<th>عنوان</th>
		<th>خبر</th>
		<th>تاریخ</th>
		<th>پاک کردن</th>
	</tr>
	
<?php foreach($news_array as $news)
{

	echo '<tr>';
		echo "<td>{$news['id']}</td>";
		echo "<td>{$news['title']}</td>";
		echo "<td>{$news['news']}</td>";
		echo "<td>{$news['date']}</td>";
		echo "<td>".anchor("auth/news_delete/{$news['id']}", 'پاک کن')."</td>";
	echo '</tr>';

}?>

</table>

<?php $this->load->view('admin_footer'); ?>