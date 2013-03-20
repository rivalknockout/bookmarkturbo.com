

================================================================================
	データの説明
================================================================================

appData

ユーザ情報ではなく、アプリのデータ（ゲームでいうセーブデータ）のこと
以下の３つを総じてappDataと呼ぶ
・commonData
・accountData	アカウント特有のもの、userDataとは別
・publicData		accountDataにないものはここに位置する


builtinData（built-in data）

初期に組み込んであるデータのこと
accountDataの中に存在しinBoxなどがそれ
commonDataやpublicDataには存在しない（そもそもビルトインという扱いではないから）


$_SESSION['user_id']	= $mysqli->insert_id;
$_SESSION['user_name']	= $_POST['name'];
$_SESSION['user_email']	= $_POST['email'];
$_SESSION['appData']['commonData']
$_SESSION['appData']['accountData']


================================================================================
	エリアの説明
================================================================================

アプリページ

ユーザがアプリを使用するときに最も目にするページ
PHPにより、パブリック部分とアカウント部分、共通部分に割り振られる
・パブリック部分
・アカウント部分
・共通部分


共通部分


パブリック部分

ログインしていないときに表示されるアプリページ
・データベースにおいてuser_idが0であることが特徴
・セッションをもっていないことが特徴


アカウント部分

パブリックページの対義語
・セッションをもってることが特徴



ユーザーページ

ユーザの情報において変更や設定を行うページ
現在はまだない





テーマ

以前スタックとしておこうとしてた機能やブックマークのテーマ
.theme-groundの.captionの部分
企画中のテーマ
・BOOKMARKS
・SITEMARKS
・REMINDER
・FEED
・SITUATION
・TODO
・COLLECTION
・HOTENTRY





対応リスト

・日本語のフォントを細くてスタイリッシュなものに変更
・ウィンドウの可変にあわせて特定の要素が伸縮する
・Webkit系でデスクトップアラートだしちゃう
・ブックマーク上のinputで直接Wikipediaやweblio、動画検索できちゃう（クエリを使う）






以前のJosefinくん

<link href='//fonts.googleapis.com/css?family=Josefin+Sans:100,400' rel='stylesheet' type='text/css'>





jsによるtheme-groundの構築

createThemeGround()において
3Dアニメーション、高さのアニメーションはすべて問題なし（Chrome、FireFoxともに）

















//js//
encodeURIComponent(url);
//php
json_encode();
















preproc.phpから念のためバックアップ

//-----------------------------------------------------------------------
//	SQL
//-----------------------------------------------------------------------

//-------------------------------------------------------------load data
$data_store = get_united_data();

function get_united_data()
{
	$assoc['user'] = get_user();
	$assoc['tags'] = get_tags();
	$assoc['stacks'] = get_stacks();
	$assoc['books'] = get_books();
	$assoc['bookmarks'] = get_bookmarks();
	return $assoc;
}
function get_user()
{
	$rs = query("
		SELECT
			* 
		FROM
			users
		WHERE
			id=" . USER_ID . "
	");
	return $rs->fetch_assoc();
}
function get_tags()
{
	$rs = query("
		SELECT
			*
		FROM
			tags
		WHERE
			user_id=" . USER_ID . "
	");
	while($table = $rs->fetch_assoc())
		$assoc[] = $table;
	return $assoc;
}
function get_stacks()
{
	$rs = query("
		SELECT
			*
		FROM
			stacks
		WHERE
			user_id=" . USER_ID . "
	");
	while($table = $rs->fetch_assoc())
		$assoc[] = $table;
	return $assoc;
}
function get_books()
{
	$rs = query("
		SELECT
			*
		FROM
			books
		WHERE
			user_id=" . USER_ID . "
	");
	while($table = $rs->fetch_assoc())
		$assoc[] = $table;
	return $assoc;
}
function get_bookmarks()
{
	$rs = query("
		SELECT
			*
		FROM
			bookmarks
		WHERE
			user_id=" . USER_ID . "
	");
	while($table = $rs->fetch_assoc())
		$assoc[] = $table;
	return $assoc;
}




