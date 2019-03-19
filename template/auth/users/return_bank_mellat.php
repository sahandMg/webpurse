<?php $this->load->view('header'); ?>

<div id="infoMessage"><?php echo $message;?></div>
<br>

<?php if(isset($batch)){?><p>شماره تراکنش:
	<?php echo $batch;?>
</p><?php }?>

<?php $this->load->view('footer'); ?>