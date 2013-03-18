<?php
session_start();
//------------------------------------------------------------
//	セッションのuser_idを確認する
//------------------------------------------------------------
if(is_null($_SESSION['user_id']))
	exit('ユーザIDがセッションにありません');

$user_id = $_SESSION['user_id'];


//------------------------------------------------------------
//	ユーザなどからのアクセスを拒否する
//------------------------------------------------------------



//------------------------------------------------------------
//	POSTで関数が選べるようにして
//------------------------------------------------------------
/*
$_POST['']
*/



//------------------------------------------------------------
//	Functions	require_onceとかでもコールできちゃう
//------------------------------------------------------------
function insert_stack($name)
{
	global $user_id, $mysqli;
	$sql = sprintf('
		INSERT	INTO  stacks
		SET		user_id=%d, name="%s", created="%s"
		',
		$user_id, m_res($name), get_sqldate()
	);
	query($sql);
	
	return $mysqli->insert_id;
}

function insert_book($name, $stack_id)
{
	global $user_id, $mysqli;
	$sql = sprintf('
		INSERT	INTO  books
		SET		user_id=%d, stack_id=%d, name="%s", created="%s"
		',
		$user_id, $stack_id, m_res($name), get_sqldate()
	);
	query($sql);
	
	return $mysqli->insert_id;
}

function insert_bookmark($name, $url, $favicon_url, $book_id, $tags, $comment)
{
	global $user_id, $mysqli;
	$sql = sprintf('
		INSERT	INTO  bookmarks
		SET		user_id=%d, name="%s", url="%s", favicon_url="%s", book_id=%d, tags="%s", comment="%s", created="%s"
		',
		$user_id, m_res($name), m_res($url), m_res($favicon_url), m_res($book_id), m_res($tags), m_res($comment), get_sqldate()
	);
	query($sql);
	
	return $mysqli->insert_id;
}

?>