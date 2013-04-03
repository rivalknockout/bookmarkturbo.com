
//----------------------------------------------------------------------
//	Event Handler
//----------------------------------------------------------------------
function changeName()
{
	var object = getObject_byEventElem(this);
	var changeValue = prompt('名前の変更：', object.name);
	if( changeValue==null ) return 1;
	
	var updateJson = { name: changeValue };
	var method = whoami_byEventElem(this);
	
	update(method, user_id, object.id, updateJson, function()
	{
		reloadFn();
	});
	
	return false;// bubbling stop.
}

//----------------------------------------------------------------------
//	Primary Functions
//----------------------------------------------------------------------
function edit(target, user_id, id, updateJson, success_callback)
{
	/*x:
	switch( target )
	{
		case 'book':
			updateBook(user_id, id, updateJson, success_callback);
			break;
		case 'bookmark':
			updateBookmark(user_id, id, updateJson, success_callback);
			break;
		case 'stack':
			updateStack(user_id, id, updateJson, success_callback);
			break;
	}
	*/
	
	return 1;
}


function add(){
	
	if(!user_id)
	{
		alert('追加を行うにはログインしてください');
		return false;
	}
	
	var $this = $(this);
	
	//	スタック、ブック、ブックマーク どの要素かを判定する
	if($this.hasClass('theme-ground'))					//	スタック
	{
		var name = prompt('新しいスタックの名前：');
		if(!name)
		{
			if(name=='') alert('スタックの名前を入力してください');
			//	キャンセルを押した場合はnull値が入る
			return;
		}
		
		insertStack(user_id, name, reloadFn);
	}
	else if($this.filter('div').length)					//	ブック
	{
		var name = prompt('新しいブックの名前：');
		if(!name)
		{
			if(name=='') alert('ブックの名前を入力してください');
			//	キャンセルを押した場合はnull値が入る
			return;
		}
		var stack_id = $this.parent().parent().parent().data('stackObject').id;
		
		insertBook(user_id, name, stack_id, reloadFn);
	}
	else												//	ブックマーク
	{
		var url = prompt('URL：');
		if(!url)
		{
			if(url=='') alert('URLを入力してください');
			//	キャンセルを押した場合はnull値が入る
			return;
		}
		
		var name = prompt('タイトル：');
		if(name==null)return;
		
		var tags = 'NULL';
		
		var comment = prompt('コメント：');
		if(comment==null)return;
		
		var book_id = $this.parent().data('book_id');
		
		insertBookmark(user_id, url, name, book_id, tags, comment, reloadFn);
	}
	
	
}


//----------------------------------------------------------------------
//	Tiny Functions
//----------------------------------------------------------------------
function getObject_byEventElem(that)
{
	var who = whoami_byEventElem(that);
	var object = null;
	var $tmp =
	$(that)
	.parent()	//.first			or	.edit
	.parent();	//.caption			or	.child
	
	switch( who )
	{
		case 'book':
			object = $tmp.data('bookObject');
			break;
		case 'bookmark':
			object = $tmp.data('bookmarkObject');
			break;
		case 'stack':
			object = $tmp.parent().data('stackObject');
			break;
	}
	
	return object;
}

function whoami_byEventElem(that)
{
	var who = '';
	var $tmp =
	$(that)
	.parent()	//.first			or	.edit
	.parent()	//.caption			or	.child
	.parent();	//.theme-ground		or	.parent
	
	if( $tmp.hasClass('books') )			who = 'book';
	else if( $tmp.hasClass('bookmarks') )	who = 'bookmark';
	else if( $tmp.hasClass('theme-ground') )who = 'stack';
	
	return who;
}

function reloadFn()
{
	location.reload();
}

