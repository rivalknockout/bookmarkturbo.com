<?php require_once('../include/preproc.php');?>
<!DOCTYPE HTML>
<html>
<head>
<style>
html, body, #hoge{
	height: 100%;
}

.hoge{
	position: relative;
	width: 100px;
	height: 100px;
	background: red;
	overflow: auto;
}
.inner{
	position: relative;
}
.box{
	position: absolute; left: 40px; top:0;
	width: 70px;
	height: 70px;
	background: gray;
}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
</head>
<body>

<div class="hoge">
	<div class="inner">
		<div class="box"></div>
	</div>
</div>
<script>



/*

var $that = $('<iframe src=\"http://rivalknockout.sakura.ne.jp/bookmarkturbo.com/bookmarkLet/send.php?url='+location.href+'\"></iframe>')
.appendTo('body')
.css({position: 'fixed', left: '50%', top: '50%', width: 100, height: 100, margin:0, marginTop: -150, marginLeft: -50, border: 'none', zIndex: 99999})
.on("load", function(){
	
	setTimeout(function(){
		$that.remove();
	}, 1000);
});

*/

</script>
</body>
</html>