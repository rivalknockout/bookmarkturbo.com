<?php
require_once('../sql/insert.php');


//------------------------------------------------------------
//	dbにinsertしていくfunction
//------------------------------------------------------------
function make_inidata()
{
	exit();
	//	Stacks...
	$stack_id = insert_stack('MAJOR');
	insert_stack('inBox');
	insert_stack('WORK');
	insert_stack('LIFE');
	
	
	//	Books...
	$book_id[0]	= insert_book('BGM', $stack_id);//too little too late   MJ  　アブリル ブリトニー　マドンナ
	$book_id[1]	= insert_book('動画共有', $stack_id);//youtube ニコ動 
	$book_id[2]	= insert_book('SNS', $stack_id);//fb mixi twiiter pixiv Twitpic instgram ついっぷる flickr picasa about.me google+
	$book_id[3]	= insert_book('２ちゃんねる系', $stack_id);// 
	$book_id[4]	= insert_book('Circulator', $stack_id);//GIGAZINE GIZMOOD
	$book_id[5]	= insert_book('検索エンジン', $stack_id);//google google画像検索 naver youtube yahoo bing
	$book_id[6]	= insert_book('GAME', $stack_id);
	$book_id[7]	= insert_book('ストリーム配信', $stack_id);//ニコ生 すてかむ ユースと ツイキャス
	$book_id[8]	= insert_book('その他Webサービス', $stack_id);//Dropbox Skype Evernote tumblr coconara GoogleErth
	
	
	//	Bookmarks...
	insert_bookmark('Too Little Too Late', 'http://www.youtube.com/watch?v=s8LIRtPnuA8', '', $book_id[0], '', '');
	insert_bookmark('Youtube', 'http://www.youtube.com/', '', $book_id[1], '', '');
	
	
}


//------------------------------------------------------------
//	ブックマーク情報がなかったらダンプしてセッションにいれておく処理へ
//------------------------------------------------------------







?>