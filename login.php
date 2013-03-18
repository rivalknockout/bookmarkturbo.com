<?php
require('include/preproc.php');

//-------------------------------------------------------
//	sessionにuser_idがあればアプリページに飛ばす
//-------------------------------------------------------
if($_SESSION['user_id'])
	header('Location: ./');


?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>ログイン</title>
<link href='//fonts.googleapis.com/css?family=Josefin+Sans:100,400' rel='stylesheet' type='text/css'>
<link href="css/reset.v1.0.css" rel="stylesheet" type="text/css">
<link href="css/login.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<style>
a.moveJoin{
	display: block;
	font-size: 10px;
	text-align: center;
	top: 20px;
}
a.moveTwiter{
	display: block;
	position: fixed; left: 0; right: 0; bottom: 1em;
	text-align: center;
	font-size: 12px;
}
</style>
</head>
<body class="app">
<img id="appBg" src="img/app_bg.jpg">

<h1 class="f-Josefin color-white">BOOKMARK TURBO</h1>
<div id="container">
	<div class="login">
	  <input type="text" placeholder="ユーザ名（またはEメール）" id="username" autofocus>  
	  <input type="password" placeholder="パスワード" id="password">  
	  <!--<a href="#" class="forgot">パスワードをお忘れですか?</a>-->
	  <input type="submit" value="Log in">
	  <a href="join" class="moveJoin">→アカウントをもっていません</a>
	</div>
	<div class="shadow"></div>
</div>

<a class="moveTwiter" href="https://twitter.com/rivalknockout2">なにか問題がおきましたか？（この人に相談してください！すぐに返事がきます）</a>





<script>

$('input[type="submit"]').click(function(){
	
	var username = $('input#username')[0].value;
	var password = $('input#password')[0].value;
	
	//	Empty check...
	var empty = [];
	if( !username.length )	empty['username'] = true;
	if( !password.length )	empty['password'] = true;
	
	
	//	Alert...
	var str = '';
	if(empty['username'])
		str+='ユーザ名（Eメール）が入力されていません。';
	if(empty['password'])
		str+='パスワードが入力されていません。';
	
	if(str)
	{
		alert(str);
		return;
	}
	
	
	//	No problem...
	var username_or_email = username;
	send(username_or_email, password);
	
	
});



function send(username_or_email, password)
{
	$.ajax({
		url:'sql/check_login.php',
		type:'POST',
		data:
		{
			username_or_email:username_or_email,
			password:password
		},
		success:function(data)
		{
			if(data!='no error')
				alert(data);
			else
			{
				window.close();
				history.back();
			}
		},
		error:function(jqXHR, textStatus, errorThrown){
			
			alert(jqXHR);
			alert(textStatus);
			alert(errorThrown);
		}
		
	});
}








</script>
</body>
</html>