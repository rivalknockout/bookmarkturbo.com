<?php require_once('include/preproc.php');?>
<?php require_once('sql/select.php');

$isLogin = $_SESSION['user_id'] ? true : false;

$_SESSION['appData']['commonData']	= dump_data_forJson(0);
if($isLogin)
	$_SESSION['appData']['accountData']	= dump_data_forJson($_SESSION['user_id']);

?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>BOOKMARK TURBO</title>
	<link href='//fonts.googleapis.com/css?family=Josefin+Sans:400' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Raleway:200' rel='stylesheet' type='text/css'>
	<link href="css/reset.v1.0.css" rel="stylesheet" type="text/css">
	<link href="css/inBox.css" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script>
		var commonData	= <?php echo json_encode($_SESSION['appData']['commonData']);?>;
		var accountData = null;
		var user_id		= null;
	<?php if($isLogin): ?>
		accountData	= <?php echo json_encode($_SESSION['appData']['accountData']);?>;
		user_id		= <?php echo $_SESSION['user_id'];?>;
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
		<dl class="cntbm-total" style="visibility: hidden;">
			<dt>TOTAL BM</dt>
			<dd>0,000</dd>
		</dl>
		<dl class="cntbm-crrnt" style="visibility: hidden;">
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
		<script>
		$(function(){
		//---------------------------------------------------------------------------
		//	共通
		//---------------------------------------------------------------------------
		var isFirstopen = false;
		if(!user_id)
			isFirstopen = true;
		
		
		if(typeof commonData == 'object')
			for(i in commonData)
				createThemeGround(commonData[i], 'COMMON', isFirstopen);
		//---------------------------------------------------------------------------
		//	アカウント
		//---------------------------------------------------------------------------
		if(user_id)
		{
			if(typeof accountData == 'object')
				for(i in accountData)
					createThemeGround(accountData[i]);
		}
		//---------------------------------------------------------------------------
		//	パブリック	現在はフェイク用（実用性なし）
		//---------------------------------------------------------------------------
		else
		{
			createThemeGround({name: 'WORK', books:[{name: 'inBox', bookmarks: []}]}, 'PUBLIC');
			createThemeGround({name: 'PRIVATE', books:[{name: 'inBox', bookmarks: []}]}, 'PUBLIC');
		}
		createThemeGround('add');
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
	<div id="config">
		<div class="user">
			<div class="evernoteTips"><div class="inner">
				<img class="icon" src="img/icon_human/339.png">
				<?php 
				if($isLogin)
					echo $_SESSION['user_name'];
				else
					echo 'ゲスト';
				?>
				<a href="javascript:%28function%28d%2cj%2cb%29%7bfunction%20r%28%29%7bsetTimeout%28function%28%29%7b%28typeof%20jQuery%3d%3d%27undefined%27%29%3fr%28%29%3ab%28jQuery%29%7d%2c99%29%7dif%28j%29%7bb%28jQuery%29%7delse%7bvar%20s%3dd%2ecreateElement%28%27script%27%29%3bs%0d%0a%2esrc%3d%27https%3a%2f%2fajax%2egoogleapis%2ecom%2fajax%2flibs%2fjquery%2f1%2e7%2e1%2fjquery%2emin%2ejs%27%3bd%2ebody%2eappendChild%28s%29%3br%28%29%7d%7d%29%28document%2cthis%2ejQuery%2cfunction%28%24%29%7b%0d%0a%09%0d%0a%09%0d%0a%09%24%28%27html%2c%20body%27%29%2ecss%28%7bheight%3a%20%27100%25%27%7d%29%3b%0d%0a%09%0d%0a%09%0d%0a%09var%20url%20%3d%20%27%27%3b%0d%0a%09url%2b%3d%27http%3a%2f%2frivalknockout%2esakura%2ene%2ejp%2fbookmarkturbo%2ecom%2fbookmarkLet%2fsend_all%2ephp%3ftitle%3d%27%3b%0d%0a%09url%2b%3ddocument%2etitle%3b%0d%0a%09url%2b%3d%27%26url%3d%27%3b%0d%0a%09url%2b%3dlocation%2ehref%3b%0d%0a%09%0d%0a%09var%20%24that%20%3d%20%0d%0a%09%24%28%27%3ciframe%3e%3c%2fiframe%3e%27%29%0d%0a%09%2eattr%28%7b%0d%0a%09%09%27id%27%3a%09%27rivalknockout_send_all_frame%27%2c%0d%0a%09%09%27src%27%3a%09url%0d%0a%09%7d%29%0d%0a%09%2ecss%28%7bposition%3a%20%27fixed%27%2c%20left%3a%200%2c%20top%3a%200%2c%20width%3a%20%27100%25%27%2c%20height%3a%20%27100%25%27%2c%20margin%3a0%2c%20border%3a%20%27none%27%2c%20zIndex%3a%2099999%7d%29%0d%0a%09%2eappendTo%28%27body%27%29%3b%0d%0a%09%0d%0a%09%0d%0a%09function%20changeIframeSize%28e%29%7b%0d%0a%09%09if%28e%2edata%3d%3d%27closeIframe%27%29%0d%0a%09%09%09%24that%2eremove%28%29%3b%0d%0a%09%7d%0d%0a%09%0d%0a%09if%28window%2eaddEventListener%29%7b%0d%0a%09%09addEventListener%28%27message%27%2c%20changeIframeSize%2c%20false%29%3b%0d%0a%09%7d%0d%0a%09else%7b%0d%0a%09%09attachEvent%28%27onmessage%27%2c%20changeIframeSize%29%3b%0d%0a%09%7d%0d%0a%09%0d%0a%09%0d%0a%7d%29%3b%0d%0a"><img style="display:inline-block" src="img/icon_white/Notepad.png"></a>
			</div></div>
			<div class="conBody">
				<div class="inner">
					<p><input type="text"></p>
					<p><input type="text"></p>
					<p><select></select></p>
					<p><input type="radio"><input type="radio"></p>
					<p><textarea></textarea></p>
				</div>
				<div class="cover">
					<p>
					ごめん(;´Д`)
					<br>ユーザ情報の編集はまだ開発中なんだ...
					<br>でもすぐに作るから待っててね(´・ω・｀)
					</p>
				</div>
			</div>
		</div>
		<div class="future">
			<div class="evernoteTips"><div class="inner">
				<img class="icon" src="img/icon_usefulA/080.png">
				・なにか問題がおきましたか？ <a class="moveTwiter" href="https://twitter.com/rivalknockout2"> この人に相談してください！すぐに返事がきます。</a><br>
				・みなさまからの要望（フィードバック）を頂いております。<a href="mailto:rivalknockout2@gmail.com?subject=BOOKMARK TURBO - フィードバック&body=%0D%0A開発者の方へ%0D%0A">メールする</a><br>
				　<strong>近日実装していく機能としては以下▼のものになります。</strong>
			</div></div>
			<div class="conBody">
				<ul>
					<li class="green">ブックマークレットの提供</li>
					<li class="yellow">削除、変更機能</li>
					<li class="yellow">ユーザ情報の編集</li>
					<li class="yellow">横スクロールの使いづらさを解消</li>
					<li class="yellow">Cookieの許可</li>
					<li class="red">CSVでインポート、エクスポートできる</li>
					<li class="red">スタック・ブック・ブックマークの並び替え</li>
					<li class="red">フリーワード検索機能（エゴサーチ）</li>
					<li class="red">フォローフォロワーシステム</li>
					<li class="red">なうで話題のWebページの表示 - ホッテントリ</li>
					<li class="red">他ユーザが公開しているブックのフォークできる</li>
					<li class="red">あと読みができる - リードレイター機能</li>
					<li class="red">あるシチュエーションになったらコールしてくる - リマインド機能</li>
					<li class="red">おすすめWebページの表示 - レコメン機能</li>
					<li class="red">集めたブックマーク自体をRSS購読できる - RSSで自身のブックマークゆっくり整理・お楽しみいただけます</li>
					<li class="red">ブックマーク時にスクロール量も保存</li>
					<li class="red">SNS内でのコメントやイイネ！、RTを表示</li>
					<li class="red">サムネイルのリサイズができる</li>
					<li class="red">ファビコンを表示する</li>
					<li class="red">キーボード対応 - キーボードでもすべての操作が行える</li>
					<li class="red">タグ機能</li>
					<li class="red">ブックにコメントを付けることができる</li>
					<li class="red">スタック・ブック・ブックマークの数を表示する</li>
					<li class="red">クイックブックマークレット - ワンクリックでブックマーク</li>
					<li class="red">ツイッターログイン</li>
					<li class="red">その他SNSログイン</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<?php if(!$_SESSION['once']): ?>
<div class="welcomeMessage">
	<div class="header">
		<p class="h f-Raleway">Hello! user +*＊</p>
		<p class="s">すべてのブラウザからアクセスできるサムネイル表示型BMサービス。</p>
	</div>
	<div class="body">
		<br>
		<strong>2013-03-29（３日以内）：</strong><br>
		本日はメンテナンス中です。
		<br>
		<br>
		<strong>ブックマークのしかた</strong><br>
		ログイン後、お好きなサイトで"ブックマークレット"をクリックすると行えます。<br>
		<br>
		ブックマークレット：<a href="javascript:%28function%28d%2cj%2cb%29%7bfunction%20r%28%29%7bsetTimeout%28function%28%29%7b%28typeof%20jQuery%3d%3d%27undefined%27%29%3fr%28%29%3ab%28jQuery%29%7d%2c99%29%7dif%28j%29%7bb%28jQuery%29%7delse%7bvar%20s%3dd%2ecreateElement%28%27script%27%29%3bs%0d%0a%2esrc%3d%27https%3a%2f%2fajax%2egoogleapis%2ecom%2fajax%2flibs%2fjquery%2f1%2e7%2e1%2fjquery%2emin%2ejs%27%3bd%2ebody%2eappendChild%28s%29%3br%28%29%7d%7d%29%28document%2cthis%2ejQuery%2cfunction%28%24%29%7b%0d%0a%09%0d%0a%09%0d%0a%09%24%28%27html%2c%20body%27%29%2ecss%28%7bheight%3a%20%27100%25%27%7d%29%3b%0d%0a%09%0d%0a%09%0d%0a%09var%20url%20%3d%20%27%27%3b%0d%0a%09url%2b%3d%27http%3a%2f%2frivalknockout%2esakura%2ene%2ejp%2fbookmarkturbo%2ecom%2fbookmarkLet%2fsend_all%2ephp%3ftitle%3d%27%3b%0d%0a%09url%2b%3ddocument%2etitle%3b%0d%0a%09url%2b%3d%27%26url%3d%27%3b%0d%0a%09url%2b%3dlocation%2ehref%3b%0d%0a%09%0d%0a%09var%20%24that%20%3d%20%0d%0a%09%24%28%27%3ciframe%3e%3c%2fiframe%3e%27%29%0d%0a%09%2eattr%28%7b%0d%0a%09%09%27id%27%3a%09%27rivalknockout_send_all_frame%27%2c%0d%0a%09%09%27src%27%3a%09url%0d%0a%09%7d%29%0d%0a%09%2ecss%28%7bposition%3a%20%27fixed%27%2c%20left%3a%200%2c%20top%3a%200%2c%20width%3a%20%27100%25%27%2c%20height%3a%20%27100%25%27%2c%20margin%3a0%2c%20border%3a%20%27none%27%2c%20zIndex%3a%2099999%7d%29%0d%0a%09%2eappendTo%28%27body%27%29%3b%0d%0a%09%0d%0a%09%0d%0a%09function%20changeIframeSize%28e%29%7b%0d%0a%09%09if%28e%2edata%3d%3d%27closeIframe%27%29%0d%0a%09%09%09%24that%2eremove%28%29%3b%0d%0a%09%7d%0d%0a%09%0d%0a%09if%28window%2eaddEventListener%29%7b%0d%0a%09%09addEventListener%28%27message%27%2c%20changeIframeSize%2c%20false%29%3b%0d%0a%09%7d%0d%0a%09else%7b%0d%0a%09%09attachEvent%28%27onmessage%27%2c%20changeIframeSize%29%3b%0d%0a%09%7d%0d%0a%09%0d%0a%09%0d%0a%7d%29%3b%0d%0a" ><img style="display:inline-block" src="img/icon_white/Notepad.png"></a><br>
		これをブラウザのブックマークバーまでドラッグしてお使いください。<br>
		また、ブックマークレットを使わずにこのページからも行えます。
	</div>
</div>
<? endif;?>

<script src="js/lib//jquery.easing.1.3.js"></script>
<script src="js/lib/jquery.transit.min.js"></script>
<!-- 自作jQueryPlugin -->
<script src="js/lib/jquery.adjustRect.js"></script>
<script src="js/lib/jquery.delayRotateX.js"></script>
<script src="js/lib/jquery.openTop.js"></script>
<script src="js/lib/jquery.tinyPlugins.js"></script>
<script src="js/manage_inThemeGround.js"></script>
<script src="js/controller.js"></script>
<script src="js/create.js"></script>
<script src="js/ajax.js"></script>

<script src="js/inBox.js"></script>
<script>
//---------------------------------------<< initialize >>----------------------------------------
(function($){
	
	$('.welcomeMessage').click(function(){
		
		if(confirm('閉じていいですか？'))
			$(this).fadeOut(600);
	});
	
})(jQuery);
//---------------------------------------<< /initialize >>----------------------------------------

<?php 


$_SESSION['once'] = true;


?>










</script>
</body>
</html>