<?php require_once('../include/preproc.php');?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>send - iframe</title>
<link href='http://fonts.googleapis.com/css?family=Josefin+Sans:100,400' rel='stylesheet' type='text/css'>
<link href="../css/reset.v1.0.css" rel="stylesheet" type="text/css">
<style>
/*
*{margin: 0;}
html, body{height: 100%;}
*/
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="../js/lib/jquery.transit.min.js"></script>
<script src="../js/lib/jquery.bounceAlert.js"></script>
</head>
<body>
<?php 
/*
//------------------------------------------Send Data To DB.
if($_GET['url'] && USER_ID)
{
	query("
	INSERT INTO
		bookmarks
	SET
		user_id = ".USER_ID.",
		url = '" .m_res($_GET['url']). "',
		book_id = 1,
		tags = 1,
		comment = 'こめんと',
		created = '" .get_sqldate(). "'
	");
}
*/


//------------------------------------------Show Error.
if(!$_GET['url'])
	$hoge .= '<!注意>no $_GET[url] ';
if(!USER_ID)
	$hoge .= '<!注意>no USER_ID<あなたはログインしていない可能性があります> ';
?>
<script type="text/javascript">
<?php if($hoge) echo "alert('{$hoge}');";?>
bounceIn();
$('body').toggle(function(){
	bounceIn();
}, function(){
	bounceOut();
});














</script>
</body>
</html>