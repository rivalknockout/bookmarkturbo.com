<?php
session_start();

echo $_SESSION['user_id'];
echo $_SESSION['user_name'];
echo $_SESSION['user_email'];


hoge();

function hoge($hoge = null)
{
	echo $hoge ? 111 : 000;
}



/*
$str = 'abcde';

if (strpos($str, "c") !== false) {	// 見つかった位置(0番目から)を返す
    echo "見つかりました！";
}
else{
	echo 'not find';
}
*/

?>