<?php require_once('../include/preproc.php');?>
<!DOCTYPE HTML>
<html>
<head>
<!--
	セッションに格納することがAjaxからだとできないのか検証
	結論：できるょー
-->
<meta charset="UTF-8">
<title>BOOKMARK TURBO</title>
<link href='http://fonts.googleapis.com/css?family=Josefin+Sans:100,400' rel='stylesheet' type='text/css'>
<link href="../css/reset.v1.0.css" rel="stylesheet" type="text/css">
<link href="../css/inBox.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<!--
<script src="https://raw.github.com/rivalknockout/inBox/master/jquery.easing.1.3.js"></script>
<script src="https://raw.github.com/rivalknockout/myjQueryPlugin/master/toast.js"></script>
-->
<script src="../js/lib/jquery.transit.min.js"></script>

<style>
	.hoge{
		height: 75px;
		background: red;
	}
	.hoge div{
		display: inline-block;
		background: gray;
		height: 100%;
	}
</style>
</head>
<body class="app">
<img id="appBg" src="../img/app_bg.jpg">


<?php
	
	//$_SESSION['hoge'] = 111;
	echo $_SESSION['hoge'];
	
	
?>

<script>
/*
$.ajax({
  dataType:'text',
  url:'http://rivalknockout.sakura.ne.jp/bookmarkturbo.com/session_ajax_test.php',
  success:function(data) {
   alert(data);
  },
  error:function(XMLHttpRequest, textStatus, errorThrown) {
   alert(XMLHttpRequest);
   alert(textStatus);
   alert(errorThrown);   //parseErrorとかでたら　php側で適切な値が返ってきてないっぽい(例：json_encode()し忘れ)
  }
 });
*/

</script>
</body>
</html>