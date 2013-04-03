
<?php if(!$_SESSION['once']): ?>
<div class="welcomeMessage">
	<div class="header">
		<p class="h f-Raleway">Hello! user +*＊</p>
		<p class="s">すべてのブラウザからアクセスできるサムネイル表示型BMサービス。</p>
	</div>
	<div class="body">
		<br>
		<strong>2013-03-22（３日以内）：</strong><br>
		結局間に合いませんでした(;´Д`);;<br>
		まだ削除変更、スクロール周りやらができてませんし、スマホにも対応してません。<br>
		MacのChromeとFireFoxのみ動作チェック済み(´・ω・｀);;<br>
		でも裏のシステムはセキュアも含め完璧にしたのでブックマークしてもらってぜんぜん大丈夫です(^ー゜)b+<br>
		その他、何か問題があれば言っていただけると助かります。
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