<?php $this->load->view('header'); ?>

<h1>حساب های شما</h1>
<h3>لطفا شماره حساب های خود را با دقت وارد نمایید</h3>

<div id="infoMessage"><?php echo $message;?></div>
<br>
<div id="arzi"></div>
<h2>حساب های ارزی</h2>

  <table class="features-table">
	<thead>
	<tr>
		<td style="width:185px;">نام</td>
		<td>حساب شما</td>
		<td style="width:136px;">مدیریت</td>
	</tr>
	</thead>
	<tbody>
	<!-- PERFECTMONEY -->
	<tr>
		<td>پرفکت مانی</td>
		<td><?php echo htmlspecialchars($your_accounts->perfectmoney_acc,ENT_QUOTES,'UTF-8');?></td>
		<td><?php echo anchor('auth/edit_your_accounts/perfectmoney', 'ویرایش');?></td>
	</tr>
	<!-- BITCOIN -->
	<tr>
		<td>بیتکوین ‌آدرس</td>
		<td><?php echo htmlspecialchars($your_accounts->bitcoin_acc,ENT_QUOTES,'UTF-8');?></td>
		<td><?php echo anchor('auth/edit_your_accounts/bitcoin', 'ویرایش');?></td>
	</tr>
	<!-- OKPAY -->
	<tr>
		<td>اوکی پی</td>
		<td><?php echo htmlspecialchars($your_accounts->okpay_acc,ENT_QUOTES,'UTF-8');?></td>
		<td><?php echo anchor('auth/edit_your_accounts/okpay', 'ویرایش');?></td>
	</tr>
	<!-- PAYPAL -->
	<tr>
		<td>پی پال</td>
		<td><?php echo htmlspecialchars($your_accounts->paypal_acc,ENT_QUOTES,'UTF-8');?></td>
		<td><?php echo anchor('auth/edit_your_accounts/paypal', 'ویرایش');?></td>
	</tr>
	<!-- WEBMONEY -->
	<tr>
		<td>وب مانی</td>
		<td><?php echo htmlspecialchars($your_accounts->webmoney_acc,ENT_QUOTES,'UTF-8');?></td>
		<td><?php echo anchor('auth/edit_your_accounts/webmoney', 'ویرایش');?></td>
	</tr>
	<!-- SKRILL -->
	<tr>
		<td>اسکریل</td>
		<td><?php echo htmlspecialchars($your_accounts->skrill_acc,ENT_QUOTES,'UTF-8');?></td>
		<td><?php echo anchor('auth/edit_your_accounts/skrill', 'ویرایش');?></td>
	</tr>
	<!-- BTCE -->
	<!--<tr>
		<td>بی تی سی - ای</td>
		<td><?php echo htmlspecialchars($your_accounts->btce_acc,ENT_QUOTES,'UTF-8');?></td>
		<td><?php echo anchor('auth/edit_your_accounts/btce', 'ویرایش');?></td>
	</tr>-->
	</tbody>
  </table>

<br>


<a name="riali" id="riali"></a>
<h2>حساب های ریالی
<br><small>پر کردن  قسمت کارت بانکی شتاب اجباریست</small>
</h2>

  <table class="features-table">
	<thead>
	<tr>
		<td style="width:185px;">نام</td>
		<td>حساب شما</td>
		<td style="width:136px;">مدیریت</td>
	</tr>
	</thead>
	<tbody>
	<!-- Card (Shetab) -->
	<tr>
		<td>کارت بانکی شتاب</td>
		<td><?php echo htmlspecialchars($your_accounts->card_acc,ENT_QUOTES,'UTF-8');?></td>
		<td><?php echo anchor('auth/edit_your_accounts/card', 'ویرایش');?></td>
	</tr>
	<!-- Mellat -->
	<tr>
		<td>شماره حساب بانک ملت</td>
		<td><?php echo htmlspecialchars($your_accounts->mellat_acc,ENT_QUOTES,'UTF-8');?></td>
		<td><?php echo anchor('auth/edit_your_accounts/mellat', 'ویرایش');?></td>
	</tr>
	<!-- Saman -->
	<tr>
		<td>شماره حساب بانک سامان</td>
		<td><?php echo htmlspecialchars($your_accounts->saman_acc,ENT_QUOTES,'UTF-8');?></td>
		<td><?php echo anchor('auth/edit_your_accounts/saman', 'ویرایش');?></td>
	</tr>
	<!-- SHABA -->
	<tr>
		<td>شبا</td>
		<td><?php echo htmlspecialchars($your_accounts->sheba_acc,ENT_QUOTES,'UTF-8');?></td>
		<td><?php echo anchor('auth/edit_your_accounts/sheba', 'ویرایش');?></td>
	</tr>
	<!-- Others -->
	<!--
	<tr>
		<td>سایر بانکها</td>
		<td><?php echo htmlspecialchars($your_accounts->others_acc,ENT_QUOTES,'UTF-8');?></td>
		<td><?php echo anchor('auth/edit_your_accounts/others', 'ویرایش');?></td>
	</tr>
	-->
	</tbody>
  </table>

<?php $this->load->view('footer'); ?>