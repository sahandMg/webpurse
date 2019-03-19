<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>WebPurse</title>
<link rel="icon" type="image/png" href="/assets/images/ico/favicon.png" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/images/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/images/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/images/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="/assets/images/ico/apple-touch-icon-57-precomposed.png">
<style>
body {
    background:#3b3a5d;
    background-size: cover;
    font-family: Yekan, BMitra, Tahoma;
}

.logo {
    width: 213px;
    height: 36px;
    background: url('/assets/images/action_logo.png') no-repeat;
    margin: 30px auto;
}

.login-block {
    width: 320px;
    padding: 20px;
    background: #fff;
    border-radius: 5px;
    border-top: 5px solid #ff656c;
    margin: 0 auto;
}

.login-block h1 {
    text-align: center;
    color: #000;
    font-size: 18px;
    text-transform: uppercase;
    margin-top: 0;
    margin-bottom: 20px;
}

.login-block input {
    width: 100%;
    height: 42px;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-bottom: 20px;
    font-size: 14px;
    font-family: Yekan, BMitra, Tahoma;
    padding: 0 50px 0 20px;
    outline: none;
     direction: rtl;
}

.login-block input[type="text"] {
    background: #fff url('/assets/images/u0XmBmv.png') 285px top no-repeat;
    background-size: 16px 80px;
}

.login-block input[type="text"]:focus {
    background: #fff url('/assets/images/u0XmBmv.png') 285px bottom no-repeat;
    background-size: 16px 80px;
}

.login-block input[type="password"] {
    background: #fff url('/assets/images/Qf83FTt.png') 285px top no-repeat;
    background-size: 16px 80px;
}

.login-block input[type="password"]:focus {
    background: #fff url('/assets/images/Qf83FTt.png') 285px bottom no-repeat;
    background-size: 16px 80px;
}

.login-block input:active, .login-block input:focus {
    border: 1px solid #ff656c;
}

.login-block input[type="submit"] {
    width: 100%;
    height: 40px;
    background: #ff656c;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #e15960;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 14px;
    font-family: Yekan, BMitra, Tahoma;
    outline: none;
    cursor: pointer;
    font-size: 17px;
    padding-right:15px;
}

.login-block input[type="submit"]:hover {
    background: #ff7b81;
}

p {
	direction:rtl;
}
p a {
	color:#598C36;
	text-decoration:none;
}
#infoMessage{color: red;}
</style>
<link rel="stylesheet" href="/assets/fonts/font.css" type="text/css" charset="utf-8">
</head>
<body>
<div class="logo"></div>
<div class="login-block">