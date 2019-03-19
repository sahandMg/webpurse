<?php $this->load->view('header'); ?>

<h1><?php echo $user->first_name . ' ' . $user->last_name;?></h1>
<br>

<h2>وضعیت: 
<?php if(intval($user->allow_exchange)===0){echo 'وریفای نشده';}else{echo 'فعال';}?>
</h2>




<?php if(intval($user->allow_exchange)===0){?>
<br>
مشخصات شما وریفای نشده است و مجاز به انجام مبادله نیستید، لطفا جهت وریفای

&nbsp;
<?php echo anchor('/auth/verify/', 'اینجا');?>
&nbsp;

کلیک کنید
<?php }else{?>

در صورت تمایل به تغییر رمز عبور خود 
<?php echo anchor('/auth/change_password/', 'اینجا کلیک کنید');?>


<?php }?>






<?php $this->load->view('footer'); ?>