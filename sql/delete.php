<?php
require_once('../include/preproc.php');//Need so from POST.

//------------------------------------------------------------
//	POSTで関数が選べるようにして
//------------------------------------------------------------
$isSuccess = delete(
	$_POST['method'],
	$_SESSION['user_id'], 
	$_POST['recode_id']
);

if($isSuccess)
	echo 'no error';
else
	echo 'error!';


//------------------------------------------------------------
//	Functions	require_onceとかでもコールできちゃう
//	
//	user_idが0でもreturn 0;(=エラー扱い)にしてます
//	（パブリックデータは削除されたくない為...）
//------------------------------------------------------------
function delete($method, $user_id, $recode_id)
{
	if(empty($user_id) || empty($recode_id) || empty($method))	return 0;
	
	$table_name	= m_res($method.'s');
	$user_id	= m_res($user_id);
	$recode_id	= m_res($recode_id);
	
	query("
		DELETE 
		FROM	{$table_name}
		WHERE	user_id={$user_id} AND id={$recode_id}
	");
	
	return 1;
}




//------------------------------------------------------------
//	Tiny functions
//------------------------------------------------------------



?>