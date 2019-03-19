<?php $this->load->view('header'); ?>

<h1>پرداخت از طریق درگاه بانک پاسارگاد</h1>

<h3>با کلیک بر روی لینک زیر پرداخت وجه را انجام دهید</h3>

<form Id='Form2' Method='post' Action='https://pep.shaparak.ir/gateway.aspx'>
	<input type='hidden' name='invoiceNumber' value='<?= $invoiceNumber ?>' />
	<input type='hidden' name='invoiceDate' value='<?= $invoiceDate ?>' />
	<input type='hidden' name='amount' value='<?= $amount ?>' />
	<input type='hidden' name='terminalCode' value='<?= $terminalCode ?>' />
	<input type='hidden' name='merchantCode' value='<?= $merchantCode ?>' />
	<input type='hidden' name='redirectAddress' value='<?= $redirectAddress ?>' />
	<input type='hidden' name='timeStamp' value='<?= $timeStamp ?>' /><br />
	<input type='hidden' name='action' value='<?= $action ?>' /><br />
	<input type='hidden' name='sign' value='<?= $result ?>' />
	<input type='submit' name='submit' value='رفتن به بانک جهت پرداخت' />
</form>

<?php $this->load->view('footer'); ?>