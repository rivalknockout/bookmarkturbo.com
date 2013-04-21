<?php
require_once('../include/preproc.php');//Need so from POST.

//------------------------------------------------------------
//	POSTで関数を呼べるようにして
//------------------------------------------------------------
$isSuccess = update(
	$_POST['method'], 
	$_SESSION['user_id'], 
	$_POST['recode_id'], 
	$_POST['update_assoc']
);

if($isSuccess)
	echo 'no error';
else
	echo 'error!';


//------------------------------------------------------------
//	Functions	require_onceとかでもコールできちゃう
//	
//	user_idが0でもreturn 0;(=エラー扱い)にしてます
//	（パブリックデータは編集されたくない為...）
//	
//	$update_assocにはkeyにフィールド名、valueに変更値をいれること
//------------------------------------------------------------
function update($method, $user_id, $recode_id, $update_assoc)
{
	if(empty($user_id) || empty($recode_id) || empty($method))	return 0;
	
	$table_name	= m_res($method.'s');
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
