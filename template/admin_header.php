<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
	<meta charset="utf-8">
	<title>Web Purse</title>
	<link href="/assets/css/admin.css" rel="stylesheet" type="text/css" />
</head>
<body>
<ul id="header" class="admin_header">
	<li><?php echo anchor('/auth/manager/', 'کاربران');?></li>
	<li><?php echo anchor('auth/pending_exchanges/', 'اکسچنج های در حال انتظار');?></li>
	<li><?php echo anchor('auth/exchanges/', 'اکسچنج ها');?></li>
	<li><?php echo anchor('auth/prices/', 'قیمت و موجودی');?></li>
	<li><?php echo anchor('auth/post_news/', 'اخبار');?></li>
	<li><?php echo anchor('auth/admin_security/', 'امنیت');?></li>
	<li><?php echo anchor('auth/admin_settings/', 'تنظیمات');?></li>
	<li><?php echo anchor('auth/admin_accounts/', 'حساب ها');?></li>
	<li><?php echo anchor('auth/change_password/', 'تغییر کلمه عبور');?></li>
	<li><?php echo anchor('auth/change_second_password/', 'تغییر رمز دوم');?></li>
	<li><?php echo anchor('auth/logout/', 'خروج');?></li>
</ul>

<div id="main">