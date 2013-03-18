<?php
//------------------------------------------------------------
//	postで送られているか
//------------------------------------------------------------
if( 
	is_null($_POST['username_or_email']) || 
	is_null($_POST['password'])
)
	exit('無効な値');


require_once('../include/preproc.php');


//------------------------------------------------------------
//	該当パスワードを取得する
//------------------------------------------------------------
//	usernameなのかemailなのかを判別してquery処理をわける
if (strpos($_POST['username_or_email'], '@') !== false)
{
	//email
	$sql = sprintf('
		SELECT 
			id, name, email, password 
		FROM 
			users
		WHERE
			email="%s"
		', 
		m_res($_POST['username_or_email'])
	);
}
else
{
	//username
	$sql = sprintf('
		SELECT 
			id, name, email, password 
		FROM 
			users
		WHERE
			name="%s"
		', 
		m_res($_POST['username_or_email'])
	);
}

$rs		= query($sql);
if($rs->num_rows==0)
	exit('パスワードが間違っているか ユーザ名（Eメール）が存在しません');
$table	= $rs->fetch_assoc();


//------------------------------------------------------------
//	パスワードを比較して
//------------------------------------------------------------
if( $table['password']!=$_POST['password'] )
	exit('パスワードが間違っているかユーザ名（Eメール）が存在しません');


//------------------------------------------------------------
//	セッションに代入
//------------------------------------------------------------
//x: session_start();	preproc.phpでやってたｗ
$_SESSION['user_id'] = $table['id'];
$_SESSION['user_name'] = $table['name'];
$_SESSION['user_email'] = $table['email'];	//これじゃユーザのemail変更に対応できないかも..? その都度SQLで取って来るべき？

echo 'no error';








?>