<?php
require_once('../include/preproc.php');//Need so from POST.

//------------------------------------------------------------
//	POSTで関数が選べるようにして
//------------------------------------------------------------
if($_POST['fn']&&$_POST['user_id'])
{
	switch($_POST['fn'])
	{
		case 'stack':
			$isSuccess = insert_stack($_POST['name'], $_POST['user_id']);
			break;
		case 'book':
			$isSuccess = insert_book($_POST['name'], $_POST['stack_id'], $_POST['user_id']);
			break;
		case 'bookmark':
			$isSuccess = insert_bookmark(
				$_POST['name'], $_POST['url'], $_POST['favicon_url'], 
				$_POST['book_id'], $_POST['tags'], $_POST['comment'], 
				$_POST['user_id']
			);
			break;
	}
	
	if($isSuccess)
		echo 'no error';
}


//------------------------------------------------------------
//	Functions	require_onceとかでもコールできちゃう
//------------------------------------------------------------
function insert_stack($name, $user_id = null)
{
	if(is_null($user_id))	return null;
	
	global $mysqli;
	$sql = sprintf('
		INSERT	INTO  stacks
		SET		user_id=%d, name="%s", created="%s"
		',
		$user_id, m_res(h($name)), get_sqldate()
	);
	query($sql);
	
	return $mysqli->insert_id;
}

function insert_book($name, $stack_id, $user_id = null)
{
	if(is_null($user_id))	return null;
	
	global $mysqli;
	$sql = sprintf('
		INSERT	INTO  books
		SET		user_id=%d, stack_id=%d, name="%s", created="%s"
		',
		$user_id, $stack_id, m_res(h($name)), get_sqldate()
	);
	query($sql);
	
	return $mysqli->insert_id;
}

function insert_bookmark($name, $url, $favicon_url, $book_id, $tags, $comment, $user_id = null)
{
	if(is_null($user_id))	return null;
	
	global $mysqli;
	$sql = sprintf('
		INSERT	INTO  bookmarks
		SET		user_id=%d, name="%s", url="%s", favicon_url="%s", book_id=%d, tags="%s", comment="%s", created="%s"
		',
		$user_id, m_res(h($name)), m_res(h($url)), m_res(h($favicon_url)), m_res($book_id), m_res(h($tags)), m_res(h($comment)), get_sqldate()
	);
	query($sql);
	
	return $mysqli->insert_id;
}

?>