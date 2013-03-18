<?php require_once('include/preproc.php');?>
<?php require_once('sql/select.php');?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>BOOKMARK TURBO</title>
<link href='//fonts.googleapis.com/css?family=Josefin+Sans:100,400' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css'>
<link href="css/reset.v1.0.css" rel="stylesheet" type="text/css">
<link href="css/inBox.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
</head>
<body class="app">
<script>
$('body').hide().fadeIn(1000);//1500

var commonData	= <?php echo json_encode(dump_data_forJson(0));?>;
var userData	= null;

//初期に表示するBOOKをAjaxで取ってきましたと仮定して
var data_books = [
	{id: 1}, {id: 4},{id: 7},{id: 8},{},{},{},{},{},{},
	{},{},{},{},{},{},{},{},{},{},
	{},{},{},{},{},{},{},{},{},{}
];
var data_bookmarks = [
	{id: 24}, {id: 29},{id: 31},{id: 38},{},{},{},{},{},{},
	{},{},{},{},{},{},{},{},{},{},
	{},{},{},{},{},{},{},{},{},{}
];
</script>
<img id="appBg" src="img/app_bg.jpg">
<div id="container">
	<!-- 01.show application title, user's BM count, and more... -->
	<header id="status">
		<!-- 01-01. -->
		<div class="app-title color-white f-Josefin">
			<h1>BOOKMARK TURBO</h1>
			<h1>hoge</h1>
		</div>
		<dl class="cntbm-total">
			<dt>TOTAL BM</dt>
			<dd>0,000</dd>
		</dl>
		<dl class="cntbm-crrnt">
			<dt>MAJOR BM</dt>
			<dd>0,000</dd>
		</dl>
		<div>
			<p class="clock"></p>
		</div>
		<div class="useraccount">
			<p class="login f-Josefin">LOG IN</p>
		</div>
	</header>
	<!-- 02. -->
	<div id="tag">
	</div>
	<!-- 03. -->
	<div id="bookmark">
		<!-- 03-01.BOOKMARK -->
		<div class="theme-ground">
			<div class="caption  color-white f-Raleway t-shadow">
				<span class="first">BOOKMARKS</span>
				<span class="second">SELECT <strong>BOOK</strong> IS...</span>
				<span class="third">NAME</span>
			</div>
			<div class="base-rail">
				<!-- jsで.parentがあるということは子要素もあるという前提で作ってるので空の.parentは書かない -->
				<!-- byJs <div class="books parent"></div>-->
				<!-- byJs <div id="hoge" class="bookmarks parent"></div>-->
			</div>
		</div>
		<!-- 03-02.SITEMARKS -->
		<div class="theme-ground">
			<div class="caption  color-white f-Raleway t-shadow">
				<span class="first">SITEMARKS</span>
				<span class="second">SELECT SITE IS...</span>
				<span class="third">NAME</span>
			</div>
			<div class="base-rail">
			</div>
		</div>
		<!-- 03-03.REMINEDER -->
		<div class="theme-ground">
			<div class="caption  color-white f-Raleway t-shadow">
				<span class="first">REMINEDER</span>
				<span class="second">SELECT REMINEDER IS...</span>
				<span class="third">NAME</span>
			</div>
			<div class="base-rail">
			</div>
		</div>
		<!-- REEDLATER FEED SITUATION TODO COLLECTION HOTENTRY, AND MORE... -->
	</div>
</div>
<footer id="bottom">
<?php if($_SESSION['user_id']): ?>
	<a href="logout.php" class="moveLogout">ログアウト</a>
<?php endif; ?>
</footer>
<!-- set the DOM which will implement 'openTop' to here -->
<div id="jqueryOpenTop" data-pushdown="true" style="padding:40px;">
	<div style="height:200px; width:300px; "></div>
</div>
<script src="https://raw.github.com/rivalknockout/inBox/master/jquery.easing.1.3.js"></script>
<script src="https://raw.github.com/rivalknockout/myjQueryPlugin/master/toast.js"></script>
<script src="js/lib/jquery.transit.min.js"></script>
<script src="js/lib/jquery.adjustRect.js"></script>
<script src="js/lib/jquery.delayRotateX.js"></script>
<script src="js/lib/jquery.openTop.js"></script>
<script src="js/createBooks.js"></script>
<script src="js/inBox.js"></script>
<script>
//---------------------------------------<< initialize >>----------------------------------------
(function($){
	
	//First Select Num (nth-child Type.)
	var THEME_GROUND = 1;
	
	
	//$('#bookmark .theme-ground:nth-child('+THEME_GROUND+') .caption .first').click();
	
	
})(jQuery);
//---------------------------------------<< /initialize >>----------------------------------------













</script>
</body>
</html>