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
			$isSuccess = delete_stack($_POST['user_id'], $_POST['stack_id']);
			break;
		case 'book':
			$isSuccess = delete_book($_POST['user_id'], $_POST['book_id']);
			break;
		case 'bookmark':
			$isSuccess = delete_bookmark($_POST['user_id'], $_POST['bookmark_id']);
			break;
	}
	
	if($isSuccess)
		echo 'no error';
}


//------------------------------------------------------------
//	Functions	require_onceとかでもコールできちゃう
//	
//	user_idが0でもreturn 0;(=エラー扱い)にしてます
//	（パブリックデータは削除されたくない為...）
//------------------------------------------------------------

function delete_stack($user_id, $stack_id)
{
	if(empty($user_id) || empty($stack_id))	return 0;
		
	query('
		DELETE
		FROM	stacks
		WHERE	user_id=' .m_res($user_id). ' AND id=' .m_res($stack_id). '
	');
	
	return 1;
}
function delete_book($user_id, $book_id)
{
	if(empty($user_id) || empty($book_id))	return 0;
		
	query('
		DELETE
		FROM	books
		WHERE	user_id=' .m_res($user_id). ' AND id=' .m_res($book_id). '
	');
	
	return 1;
}
function delete_bookmark($user_id, $bookmark_id)
{
	if(empty($user_id) || empty($bookmark_id))	return 0;
		
	query('
		DELETE
		FROM	bookmarks
		WHERE	user_id=' .m_res($user_id). ' AND id=' .m_res($bookmark_id). '
	');
	
	return 1;
}


//------------------------------------------------------------
//	Tiny functions
//------------------------------------------------------------



?>