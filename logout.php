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



?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>ログアウトしました</title>
</head>
<body>
ログアウトしました。2秒後もどります
<script>
setTimeout(function()
{
	history.back();
}, 1000);
</script>
</body>
</html>