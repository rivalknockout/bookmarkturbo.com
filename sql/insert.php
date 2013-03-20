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
			break;
		case 'book':
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
		$user_id, m_res($name), get_sqldate()
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
		$user_id, $stack_id, m_res($name), get_sqldate()
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
		$user_id, m_res($name), m_res($url), m_res($favicon_url), m_res($book_id), m_res($tags), m_res($comment), get_sqldate()
	);
	query($sql);
	
	return $mysqli->insert_id;
}

?>