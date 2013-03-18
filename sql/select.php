<?php
session_start();
//------------------------------------------------------------
//	セッションのuser_idを確認する
//------------------------------------------------------------
/*x: SELECTはパブリックページ（=セッションなし状態）でも使うので必要
if(is_null($_SESSION['user_id']))
	exit('ユーザIDがセッションにありません');

$user_id = $_SESSION['user_id'];
*/


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
function dump_data_forJson($user_id = 0)
{
	$s_rs = select_stacks($user_id);
	while($s_table = $s_rs->fetch_assoc())
	{
		$b_rs = select_books($user_id, $s_table['id']);
		while($b_table = $b_rs->fetch_assoc())
		{
			$bm_rs = select_bookmarks($user_id, $b_table['id']);
			while($bm_table = $bm_rs->fetch_assoc())
			{
				$b_table['bookmarks'][] = $bm_table;
			}
			$s_table['books'][] = $b_table;
		}
		$stacks[] = $s_table;
	}
	
	return $stacks;
}
function dump_data($user_id = 0)
{	
	$assoc['stacks']	= cast_assoc(select_stacks($user_id));
	$assoc['books']		= cast_assoc(select_books($user_id));
	$assoc['bookmarks']	= cast_assoc(select_bookmarks($user_id));
	return $assoc;
};


//------------------------------------------------------------
//	Primary functions
//------------------------------------------------------------
function select_stacks($user_id = 0)
{
	$rs = query('
		SELECT	*
		FROM	stacks
		WHERE	user_id=' .m_res($user_id). '
	');
	
	return $rs;
}
function select_books($user_id = 0, $stack_id = null)// $stack_idに値をいれるとそのレコードだけ取得できる
{
	$AND = $stack_id ? ' AND stack_id='.$stack_id : '';
	$rs = query('
		SELECT	*
		FROM	books
		WHERE	user_id=' .m_res($user_id).$AND. '
	');
	
	return $rs;
}
function select_bookmarks($user_id = 0, $book_id = null)// $book_idに値をいれるとそのレコードだけ取得できる
{
	$AND = $book_id ? ' AND book_id='.$book_id : '';
	$rs = query('
		SELECT	*
		FROM	bookmarks
		WHERE	user_id=' .m_res($user_id).$AND. '
	');
	
	return $rs;
}


//------------------------------------------------------------
//	Tiny functions
//------------------------------------------------------------
function cast_assoc($recordSet)
{
	while($table = $recordSet->fetch_assoc())
		$assoc[] = $table;
	return $assoc;
}


?>