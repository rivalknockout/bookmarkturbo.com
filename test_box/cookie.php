<?php
#Test


//set_cookie(array('email'=>'changed', 'hoge'=>'z'));

//setcookie('hoge','',time()-3600);


//echo $_COOKIE['hoge'];

echo $_COOKIE['email'];


function set_cookie($cookie_assoc)
{
	//保存される期間	例：time() + 60*60*24*14	で、2weeks
	$expire = time() + 60*60*24*14;
	
	
	foreach($cookie_assoc as $key => $value)
	{
		setcookie($key, $value, $expire);
	}
	
	
	return 1;	
}




?>