<?php

//cookieのemailに値が入っていれば、$_POSTに代入して入力欄の値を復元する
if($_COOKIE['email']){
	$_POST['email']		= $_COOKIE['email'];
	$_POST['password']	= $_COOKIE['password'];
	$_POST['save']		= 'on';	//cookieの期限(expire)を更新するため、"初回の保存"と同じ動作をする為にonを代入
}

//$_POSTに値が入っていれば(=このページのsubmitボタンを押されたら)...
if($_POST){
	
	//未入力、エラーチェック
	if($_POST['email'] && $_POST['password']){
		
		require('dbconnect.php');
		
		$email		= m_res($_POST['email']);
		$password	= sha1(m_res($_POST['password']));
		$sql = 
		sprintf('SELECT * FROM members WHERE email="%s" AND password="%s"',$email,$password);
		
		$recordSet = $mysqli->query($sql) or die($mysqli->error());
		$table = $recordSet->fetch_assoc();
		
		//データを取ってこれたなら(ログイン成功なら)...
		if(isset($table)){
			
			session_start();
			$_SESSION['id']		= $table['id'];
			$_SESSION['time']	= time();
			
			//ログイン情報をcookieに記録
			if($_POST['save']=='on'){
				$expire = time() + 60*60*24*14;//2weeks
				setcookie('email', $_POST['email'], $expire);
				setcookie('password', $_POST['password'], $expire);
			}
			
			header('Location: index.php');
		}else
			$error['login']='failed';	
	}else
		$error['login']='blank';
}

function h($str){
	return htmlspecialchars($str,ENT_QUOTES,'UTF-8');
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>ログイン</title>
<link href="http://ganportal.jp/SUPER_RESET.css" rel="stylesheet" />
<link href="css/common.css" rel="stylesheet" />

</head>
<body class="reset">
<div class="top_bar">
	<h1>ログイン</h1>
</div>
<div class="wrapper">
	<p>メールアドレスとパスワードを入力してログインしてください<br />登録がまだの方はこちらからどうぞ。<br />&raquo;<a href="join/">登録する</a></p>
	<?php if($error['login']=='blank'): ?>
	<p class="error">*メールアドレスとパスワードの両方を入力してください</p>
	<?php endif; ?>
	<?php if($error['login']=='failed'): ?>
	<p class="error">*ログインに失敗しました。正しく入力してください</p>
	<?php endif; ?>
	<form action="" method="post">
		<dl>
			<dt>メールアドレス</dt>
			<dd>
				<input type="text" size="35" maxlength="255" name="email" value="<?php echo h($_POST['email']) ?>" />
				
			</dd>
			
			<dt>パスワード</dt>
			<dd>
				<input type="password" size="35" maxlength="255" name="password" value="<?php echo h($_POST['password']) ?>" />
				
			</dd>
			
			<dt>ログイン情報の記録 cookieに</dt>
			<dd><input type="checkbox" id="save" name="save" /><lable for="save">　次回からは自動的にログインする</lable></dd>
		</dl>
		<div style="margin-top:20px;"><input type="submit" value="　　ログイン　　" /></div>
	</form>
</div>

</body>
</html>