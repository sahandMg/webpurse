<?php $this->load->view('header'); ?>

<h1>اخبار</h1>

<?php foreach($news_array as $news)
{

	echo "<h3>{$news['title']} (<span style='direction:rtl;text-align:left;display:inline-block;'>".date('Y/m/d',strtotime("{$news['date']}"))."</span>)</h3>";
	echo "<pre>".$news['news']."</pre>";
	echo "<hr>";

}?>


<?php $this->load->view('footer'); ?>