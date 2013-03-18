<?php
session_start();



//参考：http://jp2.php.net/manual/ja/function.session-destroy.php
$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
session_destroy();


setcookie('email','',time()-3600);
setcookie('password','',time()-3600);



?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>ログアウトしました</title>
</head>
<body>
ログアウトしました。3秒後もどります
<script>
setTimeout(function()
{
	history.back();
}, 3000);
</script>
</body>
</html>