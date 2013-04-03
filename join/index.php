<?php
require('../include/preproc.php');

//-------------------------------------------------------
//	sessionにuser_idがあればアプリページに飛ばす
//-------------------------------------------------------
if($_SESSION['user_id'])	header('Location: ../');



?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>会員登録</title>
<link href='//fonts.googleapis.com/css?family=Josefin+Sans:100,400' rel='stylesheet' type='text/css'>
<link href="../css/reset.v1.0.css" rel="stylesheet" type="text/css">
<link href="../css/login.css" rel="stylesheet" type="text/css">
<style>
input:nth-child(1),
input:nth-child(2),
input:nth-child(3){
	background: white;
	padding-left: 15px;
}
input:nth-child(1){
	border-bottom-left-radius: 0;
	border-bottom-right-radius: 0;
}
input:nth-child(2){
	margin-top: 0;
	border-radius: 0;
	border-top: 0;
}
input:nth-child(3){
	margin-top: 0;
	border-top-left-radius: 0;
	border-top-right-radius: 0;
	border-top: 0;
}
input:nth-child(4){
	margin-top: 15px;
}

a.moveLogin{
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

</head>
<body class="app">
<img id="appBg" src="../img/app_bg.jpg">

<h1 class="f-Josefin color-white"><a href="../">BOOKMARK TURBO</a></h1>
<div id="container">
	<form>
		<div class="login">
		  <input type="text" placeholder="Eメール" id="email" autofocus>  
		  <input type="password" placeholder="パスワード" id="password">  
		  <input type="password" placeholder="パスワード（確認）" id="confirm"> 
		  <input type="submit" value="始める"> 
		  <a href="../login.php" class="moveLogin">→アカウントをもっています</a>
		</div>
		<div class="shadow"></div>
	</form>
</div>

<a class="moveTwiter" href="https://twitter.com/rivalknockout2">なにか問題がおきましたか？（この人に相談してください！すぐに返事がきます）</a>




<script>
$('input[type="submit"]').click(function(){
	
	var email = $('input#email')[0].value;
	var password = $('input#password')[0].value;
	var confirm = $('input#confirm')[0].value;
	
	//	Empty check...
	var empty = [];
	if( !email.length )		empty['email'] = true;
	if( !password.length )	empty['password'] = true;
	if( !confirm.length )	empty['confirm'] = true;
	
	//	Password check...
	var nosame = false;
	if( confirm != password )
		nosame = true;
	
	
	//	Alert...
	var str = '';
	if(empty['email'])
		str+='Eメールが入力されていません。';
	if(empty['password'])
		str+='パスワードが入力されていません。';
	if(empty['confirm'])
		str+='確認のためもう一度同じパスワードをご入力ください。';
	else if(nosame)
		str+='パスワードが一致しません同じパスワードをご入力ください。';
	
	if(str)
		alert(str);
	else
	{
		//	No problem....
		send(email, password);
	}
	
	
	return false;//disabled submit on Form.
});



function send(email, password)
{
	var name = email.split('@')[0];
	
	$.ajax({
		url:'../join/make_account.php',
		type:'POST',
		data:
		{
			name:name,
			email:email,
			password:password
		},
		success:function(data)
		{
			if(data!='no error')
				alert(data);
			else
			{
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