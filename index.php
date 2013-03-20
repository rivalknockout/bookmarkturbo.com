<?php require_once('include/preproc.php');?>
<?php
$isLogin = $_SESSION['user_id'] ? true : false;


//	セッションにdataがあるか確認しなければdbからdumpしてセッションにいれる
if(empty($_SESSION['appData']['commonData']))
{
	require_once('sql/select.php');
	$_SESSION['appData']['commonData']	= dump_data_forJson(0);
}
if($isLogin && empty($_SESSION['appData']['accountData']))
{
	require_once('sql/select.php');
	$_SESSION['appData']['accountData']	= dump_data_forJson($_SESSION['user_id']);
}


?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>BOOKMARK TURBO</title>
<link href='//fonts.googleapis.com/css?family=Josefin+Sans:400' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Raleway:200' rel='stylesheet' type='text/css'>
<link href="css/reset.v1.0.css" rel="stylesheet" type="text/css">
<link href="css/inBox.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>
var commonData	= <?php echo json_encode($_SESSION['appData']['commonData']);?>;
<?php if($_SESSION['appData']['accountData']): ?>
var accountData	= <?php echo json_encode($_SESSION['appData']['accountData']);?>;
<?php endif; ?>
</script>
</head>
<body class="app">
<script>$('body').hide().fadeIn(1000);//1500</script>
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
		<? if($isLogin): ?>
			<p class="login"><?php echo $_SESSION['user_name'] ?></p>
		<? else: ?>
			<p class="login f-Josefin"><a href="login.php">ログイン</a></p>
		<? endif; ?>
		</div>
	</header>
	<!-- 02. -->
	<div id="tag">
	</div>
	<!-- 03. -->
	<div id="bookmark">
		<!--============== モデル ==============-->
		<div data-stack_id="00" class="theme-ground" style="display:none">
			<div class="caption  color-white f-Raleway t-shadow" style="font-weight:normal">
				<span class="first">MAJOR</span>
				<span class="second">SELECT <strong>MAJOR</strong> IS...</span>
				<span class="third">NAME</span>
			</div>
			<div class="base-rail">
				<!-- jsで.parentがあるということは子要素もあるという前提で作ってるので空の.parentは書かない -->
				<!-- byJs <div class="books parent"></div>-->
				<!-- byJs <div id="hoge" class="bookmarks parent"></div>-->
			</div>
		</div>
		<!--============== /モデル ==============-->
		<script>
		$(function(){
	<?php 
	//---------------------------------------------------------------------------
	//	共通
	//---------------------------------------------------------------------------
	?>
		if(typeof commonData == 'object')
			for(i in commonData)
				createThemeGround(commonData[i]);
	<?php 
	//---------------------------------------------------------------------------
	//	アカウント
	//---------------------------------------------------------------------------
	if($isLogin): 
	?>
		if(typeof accountData == 'object')
			for(i in accountData)
				createThemeGround(accountData[i]);
	<?php else: 
	//---------------------------------------------------------------------------
	//	パブリック	現在はフェイク用（実用性なし）
	//---------------------------------------------------------------------------
	?>
		createThemeGround({name: 'WORK'});
		createThemeGround({name: 'PRIVATE'});
	<?php endif; ?>
		});
		</script>
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
<script src="js/manage_inThemeGround.js"></script>
<script src="js/create.js"></script>

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