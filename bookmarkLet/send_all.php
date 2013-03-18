<?php require_once('../include/preproc.php');

//------------------------------------------------------
//	ユーザIDをチェックして、ログインしてなかったら
//	header()でログイン画面へ飛ばし、ログインしたらもどる
//	もどってくださいフラグは、isBack=trueをURLにいれればよい。
//	
//	x:alert()をだす
//	x:※あとあと、_blankでログイン画面に飛ばす。
//------------------------------------------------------



//------------------------------------------------------
//	必要なデータ：ブックとスタックのデータ(たぶんIDと名前)
//	このデータでカテゴリ(select)をつくる
//------------------------------------------------------



?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>send_all - iframe</title>
<link href='http://fonts.googleapis.com/css?family=Josefin+Sans:100,400' rel='stylesheet' type='text/css'>
<link href="../css/reset.v1.0.css" rel="stylesheet" type="text/css">
<style>
/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~hideaki*/


body > div {
/*hideaki~ */
width: 400px;
margin: auto;
/* ~hideaki   box-shadowはナンセンスかなっ */
padding: 0 6px 6px;/*触るなっ*/
border-radius: 0 0 6px 6px;
background-color: rgba(0, 0, 0, 0.56);
}
#main {
border-radius: 0 0 4px 4px;
background-color: #333;
color: white;
width: 100%;
height: 100%;
overflow: hidden;
}
/*hideaki~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
#status > div{
	padding: 4px 0px 4px;
	border-style: solid;
	border-width: 1px 0;
	border-color: #444 #000 #000; 
}
#status > div:first-child{
	border-top-width: 0;
}
#status > div:last-child{
	border-bottom-width: 0;
}
#status select{width: 100%; background: black; border: 1px solid #777;}
#status input,
#status select,
#status textarea{
	height: 2em;
	margin-top: 4px;
}
#status textarea:focus{
	height: auto;
}
#appTitle{
	font-family: 'Josefin Sans';
	font-size: 13px;
	line-height: 36px;
	padding-left: 2px;
}
/*icon*/
#category{background: url(../img/icon_white_folder.png) no-repeat 2px center;}
#tag{background: url(../img/icon_white_tag.png) no-repeat 2px center;}
#comment{background: url(../img/icon_white_comment.png) no-repeat 2px center;}
#category,#tag,#comment{padding-left: 30px !important;}
/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~hideaki*/
#status {
margin: 6px;
padding: 6px;
/*background-color: #262626; hideaki*/background-color: #161616;
font-size: 12px;
line-height: 18px;
}
.depressedBox {
/*border: 1px inset #444; hideaki*/
border: 1px solid;/*hideaki*/
border-color: #000 #444 #444 #000;/*hideaki*/
border-radius: 4px;
-webkit-font-smoothing: antialiased;
}
#footer {
margin: 0;
height: 0;
opacity: 0;
position: relative;
-webkit-font-smoothing: antialiased;
}
#footer.expanded {
-webkit-animation-duration: 500ms;
-webkit-animation-name: footerExpand;
margin: 8px;
margin-top: 4px;
height: 32px;
opacity: 1;
}
#closeControl {
position: absolute;
bottom: 0;
right: 0;
}
#closeControl > input {
padding: 6px 12px;
color: white;
border-radius: 5px;
/*border: 1px inset #444; hideaki*/
border: 1px solid;/*hideaki*/
border-color: #000 #444 #444 #000;/*hideaki*/
background-color: rgb(16%, 16%, 16%);
font-size: 12px;
background: -webkit-gradient(linear, left top, left bottom, from(rgb(25%, 25%, 25%)), to(rgb(10%, 10%, 10%)));
background: -moz-linear-gradient(rgb(25%, 25%, 25%) 0%, rgb(10%, 10%, 10%) 100%);
background: -ms-linear-gradient(rgb(25%, 25%, 25%) 0%, rgb(10%, 10%, 10%) 100%);
background: -o-linear-gradient(rgb(25%, 25%, 25%) 0%, rgb(10%, 10%, 10%) 100%);
background: linear-gradient(rgb(25%, 25%, 25%) 0%, rgb(10%, 10%, 10%) 100%);
box-shadow: 0 1px 0px 0px rgba(100%, 100%, 100%, 0.20);
-webkit-font-smoothing: antialiased;
cursor: pointer;/*hideaki*/
}
#closeResultControl {
margin: 0;
}
/*---------------------------------Input */
input, textarea {/*hideaki*/
-webkit-border-radius: 0px;
-moz-border-radius: 0px;
-ms-border-radius: 0px;
-o-border-radius: 0px;
border-radius: 0px;
box-shadow: none;
border: none;
}
input[type=text], input[type=password], input[type=search], input[type=submit], textarea, select {/*evernote.css 19*/
font-family: Helvetica, Arial, sans-serif;
font-size: 12px;
/*color: #696969; hideaki*/color: #ddd;
outline: none;
}
form {/*evernote.css 115*/
padding: 0px;
margin: 0px;
}
/*
body {/*evernote.css 1
color: #696969;
font-size: 12px;
font-family: Helvetica, Arial, sans-serif;
line-height: 1.5;
}
*/

.clipForm .row {/*627*/
margin: 0px;
padding: 4px;
border-style: solid;
border-width: 0px 1px 1px 1px;
border-color: #d9d9d9;
/*background-color: white; hideaki*/
}
.clipForm #status .row{/*hideaki*/
	/*background: none; hideaki*/
}
.clipForm input,
.clipForm textarea{/*hideaki*/
	background: none;
}
.clipForm .row.firstRow {/*638*/
border-top-width: 1px;
border-top-left-radius: 4px;
border-top-right-radius: 4px;
}
.clipForm input[type=text], .clipForm textarea {/*648*/
margin: 0px 0px 0px 0px;
padding: 0px;
border: none;
width: 100%;
/*-webkit-padding-start: 4px; hideaki*/
-webkit-box-sizing: border-box;
}
textarea[name=comment] {
display: block;/*hideaki*/
/*height: 14px; hideaki*/
max-height: 150px;
/*max-width: 456px; hideaki*/
resize: vertical !important;
}
</style>
<link href='http://fonts.googleapis.com/css?family=Josefin+Sans:100,400' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="../js/lib/jquery.transit.min.js"></script>
<script src="../js/lib/jquery.bounceAlert.js"></script>
</head>
<body>
<div>
	<div id="main">
		<form class="clipForm" action="#">
			<div id="status" class="depressedBox">
				<div id="title">
					 <input 
					 class="row firstRow" 
					 type="text" 
					 name="title" 
					 title="タイトル" 
					 maxlength="200" 
					 tabindex="8"
					 value="<?php echo $_GET['title'];?>"
					 placeholder="タイトルがありません"/>
					<!--
					<div id="title"><?php echo $_GET['title'];?></div>
					-->
				</div>
				<div id="category">
					<select
					tabindex="9"
					placeholder="カテゴリを選択">
						<option value="foo">ふー</option>
						<option value="foo">ばー</option>
					</select>
				</div>
				<div id="tag">
					※申し訳ありません。タグ機能は現在開発中です
					<!-- hidden を type にしてつかってください -->
					<input 
					tabindex="10"
					type="hidden"
					placeholder="タグを追加">
				</div>
				<div id="comment">
					<textarea
					name	="comment"
					rows	="1"
					tabindex="11"
					placeholder="コメントを追加"
					></textarea>
				</div>
			</div>
			<div id="footer" class="expanded">
				<p id="appTitle">BOOKMARK TURBO</p>
				<div id="closeControl">
					<input 
					type	="button" 
					id		="closeResultControl" 
					message	="Submit" 
					value	="ブックマークする">
				</div> 
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
<?php 
//------------------------------------------Show Error~

if(!$_GET['url'])
	$hoge .= '<!注意>no $_GET[url] ';
if(!USER_ID)
	$hoge .= '<!注意>no USER_ID<あなたはログインしていない可能性があります> ';
	
if($hoge) echo "alert('{$hoge}');";

//------------------------------------------ ~Show Error
?>





//------------------------------------------------------
//	Dont Rremove:
//	textareaにフォーカスしたら数行高さを与えるtoggle
//------------------------------------------------------
$("textarea").focus(function(){
	
	$(this).attr({'rows': 3});
}).blur(function(){
	
	$(this).attr({'rows': 1});
});


//------------------------------------------------------
//	自身のiframeを消す
//	条件：呼び出し元のiframeのidが
//	rivalknockout_send_all_frame であること!
//------------------------------------------------------
function closeSelf()
{
	var selfFrame = 
	window.parent.document
	.getElementById('rivalknockout_send_all_frame');
	$(selfFrame).remove();
}

//------------------------------------------------------
//	ボックスの外をクリックしたら（閉じる）
//------------------------------------------------------




//------------------------------------------------------
//	「ブックマークする」を押したら
//	AjaxをつかってINSERTする
//------------------------------------------------------
$('#closeResultControl').click(function(){
	
	var $P=$('#main form #status');
	var title		=$('#title input', $P)[0].value;
	var category	=$('#category select', $P)[0].value;
	var tags		=$('#tag input', $P)[0].value;
	var comment		=$('#comment textarea', $P)[0].value;
	
	
	//jsonでとれるかためす
	$.ajax({
		data:{
			url: location.href,
			title: title,
			category: category,
			tags: tags,
			comment: comment
		},
		url: '../sql/bookmark_insert.php',
		success: function(){
			alert('o');
		},
		error:function(XMLHttpRequest, textStatus, errorThrown) {
		   alert(XMLHttpRequest);
		   alert(textStatus);
		   alert(errorThrown);   //parseErrorとかでたら　php側で適切な値が返ってきてないっぽい(例：json_encode()し忘れ)
		}
	});
});






</script>
</body>
</html>