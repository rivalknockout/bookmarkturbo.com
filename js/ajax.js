
var ImSorry = '本当に申し訳ありません！こんなことは想定外でした！まるで茹でたポッキーのように私の心は残念でいっぱいです... 　　　　今後にご期待ください！';
function ajaxError(XMLHttpRequest, textStatus, errorThrown)
{
	alert(XMLHttpRequest);
	alert(textStatus);
	if(errorThrown=='parseError')
		alert('適切な値が返ってきていません。(例：json_encode()し忘れ)')
	else
		alert(errorThrown+ '　（インターネットは繋がっていますか？）');
}

//--------------------------------------------------------------------------------
//	Delete
//--------------------------------------------------------------------------------
function deleteStack(user_id, stack_id, this_callback)
{
	if( !user_id ) return 0;
	this_callback = this_callback || function(){};
	
	$.ajax({
		type: 'POST',
		data: {
			fn: 'stack',
			user_id:	user_id,
			stack_id:	stack_id
		},
		url: 'http://rivalknockout.sakura.ne.jp/bookmarkturbo.com/sql/delete.php',
		success: function(data){
			console.log(data);
			if(data != 'no error')
			{
				alert('内部エラーがおき削除できませんでした' + ImSorry);
				return;
			}
			
			this_callback();
		},
		error: ajaxError
	});
}


//--------------------------------------------------------------------------------
//	Update
//--------------------------------------------------------------------------------
function update(method, user_id, objectId, updateJson, success_callback)
{
	if( !user_id ) return 0;
	success_callback = success_callback || function(){};
	
	$.ajax({
		data: {
			method:			method,
			user_id:		user_id,
			recode_id:		objectId,
			update_assoc:	updateJson
		},
		success: function(data){
			console.log(data);
			if(data != 'no error')
			{
				alert('内部エラーがおき更新できませんでした' + ImSorry);
				return 0;
			}
			
			success_callback();
		},
		error: ajaxError,
		type: 'POST',
		url: 'http://rivalknockout.sakura.ne.jp/bookmarkturbo.com/sql/update.php'
	});
	
	return 1;
}


//--------------------------------------------------------------------------------
//	Insert
//--------------------------------------------------------------------------------
function insertStack(user_id, name, this_callback)
{
	this_callback = this_callback || function(){};
	
	$.ajax({
		type: 'POST',
		data: {
			fn: 'stack',
			user_id:	user_id,
			name:		name
		},
		url: 'http://rivalknockout.sakura.ne.jp/bookmarkturbo.com/sql/insert.php',
		success: function(data){
			console.log(data);
			if(data != 'no error')
			{
				alert('内部エラーがおき追加できませんでした' + ImSorry);
				return;
			}
			
			this_callback();
		},
		error: ajaxError
	});
}
function insertBook(user_id, name, stack_id, this_callback)
{
	this_callback = this_callback || function(){};
	
	$.ajax({
		type: 'POST',
		data: {
			fn: 'book',
			user_id:	user_id,
			stack_id:	stack_id,
			name:		name
		},
		url: 'http://rivalknockout.sakura.ne.jp/bookmarkturbo.com/sql/insert.php',
		success: function(data){
			console.log(data);
			if(data != 'no error')
			{
				alert('内部エラーがおき追加できませんでした' + ImSorry);
				return;
			}
			
			this_callback();
		},
		error: ajaxError
	});
}
function insertBookmark(user_id, url, name, book_id, tags, comment, this_callback)
{
	this_callback = this_callback || function(){};
	
	$.ajax({
		type: 'POST',
		data: {
			fn: 'bookmark',
			user_id:	user_id,
			url:		url,
			name:		name,
			book_id:	book_id,
			tags:		tags,
			comment:	comment
		},
		url: 'http://rivalknockout.sakura.ne.jp/bookmarkturbo.com/sql/insert.php',
		success: function(data){
			console.log(data);
			if(data != 'no error')
			{
				alert('内部エラーがおきブックマーク（追加）できませんでした' + ImSorry);
				return;
			}
			
			this_callback();
		},
		error: ajaxError
	});
}











