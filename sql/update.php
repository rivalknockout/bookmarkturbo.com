<?php
require_once('../include/preproc.php');//Need so from POST.

//------------------------------------------------------------
//	POSTで関数が選べるようにして
//------------------------------------------------------------
if( $_POST['method']&&$_POST['user_id'] )
{
	$table_name = $_POST['method'].'s';
	$isSuccess = update(
		$table_name, 
		$_POST['user_id'], 
		$_POST['recode_id'], 
		$_POST['update_assoc']
	);
	
	if($isSuccess)
		echo 'no error';
	
	/*x:
	
	switch($_POST['fn'])
	{
		case 'stack':
			$isSuccess = update_stack(
				$_POST['user_id'], 
				$_POST['stack_id'],
				$_POST['update_assoc']
			);
			break;
		case 'book':
			$isSuccess = update_book(
				$_POST['user_id'], 
				$_POST['book_id'],
				$_POST['update_assoc']
			);
			break;
		case 'bookmark':
			$isSuccess = update_bookmark(
				$_POST['user_id'], 
				$_POST['bookmark_id'],
				$_POST['update_assoc']
			);
			break;
	}
	
	if($isSuccess)
		echo 'no error';
		*/
}


//------------------------------------------------------------
//	Functions	require_onceとかでもコールできちゃう
//	
//	user_idが0でもreturn 0;(=エラー扱い)にしてます
//	（パブリックデータは編集されたくない為...）
//	
//	$update_assocにはkeyにフィールド名、valueに変更値をいれること
//------------------------------------------------------------
function update_stack($user_id, $stack_id, $update_assoc)
{
	if(empty($user_id) || empty($stack_id))	return 0;
	
	foreach($update_assoc as $key => $value)
	{
		$value = m_res($value);
		$update_filed = " {$key}='{$value}'";
	}
	
	query('
		UPDATE stacks
		SET ' .$update_filed. '
		WHERE user_id=' .m_res($user_id). ' AND id=' .m_res($stack_id). '
	');
	
	return 1;
}
function update_book($user_id, $book_id, $update_assoc)
{
	if(empty($user_id) || empty($book_id))	return 0;
	
	foreach($update_assoc as $key => $value)
	{
		$value = m_res($value);
		$update_filed = " {$key}='{$value}'";
	}
	
	query('
		UPDATE books
		SET ' .$update_filed. '
		WHERE user_id=' .m_res($user_id). ' AND id=' .m_res($book_id). '
	');
	
	return 1;
}
function update_bookmark($user_id, $bookmark_id, $update_assoc)
{
	if(empty($user_id) || empty($bookmark_id))	return 0;
	
	foreach($update_assoc as $key => $value)
	{
		$value = m_res($value);
		$update_filed = " {$key}='{$value}'";
	}
	
	query('
		UPDATE bookmarks
		SET ' .$update_filed. '
		WHERE user_id=' .m_res($user_id). ' AND id=' .m_res($bookmark_id). '
	');
	
	return 1;
}



function update($table_name, $user_id, $recode_id, $update_assoc)
{
	if(empty($user_id) || empty($recode_id))	return 0;
	
	$table_name	= m_res($table_name);
	$user_id	= m_res($user_id);
	$recode_id	= m_res($recode_id);
	
	foreach($update_assoc as $key => $value)
	{
		$value = m_res($value);
		$update_filed = " {$key}='{$value}'";
	}
	
	query("
		UPDATE {$table_name}
		SET {$update_filed}
		WHERE user_id={$user_id} AND id={$recode_id}
	");
	
	return 1;
}
