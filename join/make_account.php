<?php
//------------------------------------------------------------
//	postで送られているか
//------------------------------------------------------------
if( 
	is_null($_POST['name']) || 
	is_null($_POST['email']) || 
	is_null($_POST['password']) 
)
	exit('無効な値');


require_once('../include/preproc.php');


//------------------------------------------------------------
//	アドレスの重複項目のチェック
//------------------------------------------------------------
$sql = sprintf(
	'SELECT COUNT(*) AS cnt FROM users WHERE email="%s"', 
	m_res($_POST['email'])
);
$rs = query($sql);
$table = $rs->fetch_assoc();

if($table['cnt']>0)
	exit('そのアドレスは既に登録されています');


//------------------------------------------------------------
//	パスワードの暗号化（no write）
//------------------------------------------------------------


//------------------------------------------------------------
//	Done
//------------------------------------------------------------
$sql = sprintf(
	'INSERT INTO users SET name="%s", email="%s", password="%s", created="%s" ', 
	m_res($_POST['name']),
	m_res($_POST['email']),
	m_res($_POST['password']),
	get_sqldate()
);
query($sql);


//------------------------------------------------------------
//	セッションに代入
//------------------------------------------------------------
//x: session_start();	preproc.phpでやってたｗ
$_SESSION['user_id']	= $mysqli->insert_id;
$_SESSION['user_name']	= $_POST['name'];
$_SESSION['user_email']	= $_POST['email'];	//これじゃユーザのemail変更に対応できないかも..? その都度SQLで取って来るべき？


echo 'no error';//Ajaxへ報告


//------------------------------------------------------------
//	つづいて、できたてホヤホヤのユーザのdbに
//	ブックマークやスタックなどの初期データを挿入する
//------------------------------------------------------------
require_once('../join/make_inidata_fn.php');	//so Need user_id
make_inidata();













//------------------------------------------------------------
//	Functions	（$mysqli->insert_id	 で間に合いました＼(^o^)／！）
//------------------------------------------------------------
/*x:
function get_user_id()
{
	$sql = sprintf(
		'SELECT id FROM users WHERE email="%s"', 
		m_res($_POST['email'])
	);
	$rs = query($sql);
	$table = $rs->fetch_assoc();
	
	return $table['id'];
}
*/

?>