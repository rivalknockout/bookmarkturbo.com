<?php
session_start();

require('../include/preproc.php');



//----------------------------------------------------------------------------------
// index.phpを「表示」と「チェック」で兼用で使っていく場合。
// それらを切り分けなければいけません。これは「$_POST」が空でないかを確認することで
//「フォームが送信された」ことを確認することができます。
//----------------------------------------------------------------------------------
 
//$_POSTに値が入っていれば(=このページのsubmitボタンを押されたら)...
if(!empty($_POST)){
	
	//未入力、エラーチェック
	if($_POST['name']=='')
		$error['name']='blank';
	if($_POST['email']=='')
		$error['email']='blank';
	if(strlen($_POST['password'])<4)	//文字数の確認：strlen($_POST['password'])<4
		$error['password']='length';
	if($_POST['password']=='')
		$error['password']='blank';
	
	//var_dump($_FILES['image']);	
	//array(5) { ["name"]=> string(50) "スクリーンショット 2013-01-08 9.30.15.png" ["type"]=> string(9) "image/png" ["tmp_name"]=> string(18) "/var/tmp/php0pdohq" ["error"]=> int(0) ["size"]=> int(39884) }
	$fileName = $_FILES['image']['name'];	//$_FILES[name属性の値]['name'];
	//ファイルがセットされていれば...
	if($fileName){
		
		$ext = substr($fileName, -3);	//substr(str, -3)：後ろから3文字分を返す
		//拡張子チェック
		if($ext!='jpg'&&$ext!='peg'&&$ext!='gif'&&$ext!='png')
			$error['image']='type';
	}
	
	
	//入力項目に問題なければ...(メールアドレスの重複チェック)
	if(empty($error)){
		
		$email = m_res($_POST['email']);
		$sql = 
		sprintf('SELECT COUNT(*) AS cnt FROM members WHERE email="%s"', $email);
		
		$recordSet = $mysqli->query($sql) or die($mysqli->error());
		$table = $recordSet->fetch_assoc();
		
		if($table['cnt']>0)
			$error['email']='duplicate';
	}
	
	
	//入力項目に問題なければ...
	if(empty($error)){
		
		//セッション変数に代入
		$_SESSION['join']=$_POST;
		
		//ファイルがセットされていれば...
		if($fileName){
			//画像をアップロードする
			$boundFileName			= date('YmdHis').$fileName;
			$tmpFileName			= $_FILES['image']['tmp_name'];
			move_uploaded_file($tmpFileName, '../member_picture/'.$boundFileName);
			
			//セッション変数に代入
			$_SESSION['join']['image']	=$boundFileName;
		}
		
		header('Location: confirm.php');
	}
}




//confirm.phpから(書き直しの為に)もどった場合
if($_REQUEST['action']=='rewrite'){
	
	$_POST = $_SESSION['join'];
	$error['rewrite'] = true;
}

?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>会員登録</title>
<link href="http://ganportal.jp/SUPER_RESET.css" rel="stylesheet" />
<link href="../css/common.css" rel="stylesheet" />

</head>
<body class="reset">
<div class="top_bar">
	<h1>会員登録</h1>
</div>
<p align="right" style="font-size:11px;color:#999;margin:0 20px -20px;">MADE IN <a href="http://twitter.com/rivalknockout3">@RivalKnockout3</a></p>
<div class="wrapper">
	<p>次のフォームに必要事項をご記入するんだ！(੭ु˙꒳​˙)੭ु⁾⁾ ｷｬｯｷｬｯ</p>
	<form action="" method="post" enctype="multipart/form-data">
		<dl>
			<dt>ニックネーム<span class="required">必須</span></dt>
			<dd>
				<input type="text" name="name" size="35" maxlength="255" value="<?php echo h($_POST['name']) ?>" />
				<?php if($error['name']=='blank'): ?>
				<span class="error">*ニックネームを入力してください</span>
				<?php endif; ?>
			</dd>
			
			<dt>メールアドレス<span class="required">必須</span></dt>
			<dd>
				<input type="text" name="email" size="35" maxlength="255" value="<?php echo h($_POST['email']) ?>" />
				<?php if($error['email']=='blank'): ?>
				<span class="error">*メールアドレスを入力してください</span>
				<?php endif; ?>
				<?php if($error['email']=='duplicate'): ?>
				<span class="error">*指定されたメールアドレスは既に登録されています</span>
				<?php endif; ?>
			</dd>
			
			<dt>パスワード<span class="required">必須</span></dt>
			<dd>
				<input type="password" name="password" size="10" maxlength="20" value="<?php echo h($_POST['password']) ?>" />
				<?php if($error['password']=='blank'): ?>
				<span class="error">*パスワードを入力してください</span>
				<?php endif; ?>
				<?php if($error['password']=='length'): ?>
				<span class="error">*パスワードは4文字以上で入力してください</span>
				<?php endif; ?>
			</dd>
			
			<dt style="margin-top:20px;">サムネイル (任意)　jpg/jpeg/png/gif</dt>
			<dd>
				<input type="file" name="image" size="35" />
				<?php if($error['image']=='type'): ?>
				<span class="error">*ファイル形式が違います</span>
				<?php endif; ?>
				<?php if($error): ?>
				<span class="error">*恐れ入りますが、画像を改めて指定してください</span>
				<?php endif; ?>
			</dd>
		</dl>
		<div style="margin-top:40px;"><input type="submit" value="　　　　確 認　　　　" /></div>
	</form>
</div>






















</body>
</html>