<?php
session_start();



//$_POSTに値が入っていれば(=このページのsubmitボタンを押されたら)...
if(!empty($_POST)){
	
	require('../dbconnect.php');
	
	$name		= m_res($_SESSION['join']['name']);
	$email		= m_res($_SESSION['join']['email']);
	$password	= sha1(m_res($_SESSION['join']['password']));
	$picture	= m_res($_SESSION['join']['image']);
	$created	= date('Y-m-d H:i:s');
	$sql = 
	sprintf('INSERT INTO members SET name="%s",email="%s",password="%s",picture="%s",created="%s"',
		$name,
		$email,
		$password,
		$picture,
		$created
	);
	
	$mysqli->query($sql) or die(mysqli_error());
	unset($_SESSION['join']);
	
	header('Location: thanks.php');
}

/*
if(!isset($_SESSION['join']))
	header('Location: index.php');
*/

$name		= h($_SESSION['join']['name']);
$email		= h($_SESSION['join']['email']);
$fileName	= $_SESSION['join']['image'];

?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>確認画面</title>
<link href="http://ganportal.jp/SUPER_RESET.css" rel="stylesheet" />
<link href="../css/common.css" rel="stylesheet" />

</head>
<body class="reset">
<div class="top_bar">
	<h1>会員登録</h1>
</div>
<div class="wrapper">
	<p>ご確認後、登録ボタンをプッシュプッシュ(੭ु˙꒳​˙)੭ु⁾⁾ ｷｬｯｷｬｯ</p>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="submitted" />
		<dl>
			<dt>ニックネーム<span class="required">必須</span></dt>
			<dd><strong><?php echo $name ?></strong></dd>
			
			<dt>メールアドレス<span class="required">必須</span></dt>
			<dd><strong><?php echo $email ?></strong></dd>
			
			<dt>パスワード<span class="required">必須</span></dt>
			<dd>※表示されまてん。</dd>
			
			<dt style="margin-top:20px;">サムネイル (任意)</dt>
			<dd>
				<img src="../member_picture/<?php echo $fileName ?>" width="100" height="100" alt="" />
			</dd>
		</dl>
		<div style="margin-top:20px;"><input type="submit" value="　　登録する　　" /><br /><a href="index.php?action=rewrite">&laquo; 書き直す</a></div>
	</form>
</div>

</body>
</html>