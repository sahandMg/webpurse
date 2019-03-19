<?php $this->load->view('header'); ?>

<h1>پرداخت از طریق درگاه pay.ir</h1>

<?php if( ! isset($has_error)){?>
	<h3>لطفا چند ثانیه تا انتقال به بانک صبر نمایید</h3>
	<?php echo $java;?>
<?php }else{?>
	<div id="infoMessage"><?php echo $message;?></div>
<?php }?>

<?php $this->load->view('footer'); ?>