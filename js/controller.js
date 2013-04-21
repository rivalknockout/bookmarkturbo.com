
//----------------------------------------------------------------------
//	Delete Event Handler
//----------------------------------------------------------------------
function remove()
{
	if(!confirm('本当に削除してよろしいですか？\r\n【！】この操作は取り消せません')) return false;
	
	var method = whoami_byEventElem(this);
	var object = getObject_byEventElem(this);
	del(method, object.id, function()
	{
		reloadFn();
	});
	
	return false;
}

//----------------------------------------------------------------------
//	Update Event Handler
//----------------------------------------------------------------------
function changeName()
{
	var object = getObject_byEventElem(this);
	var changeValue = prompt( '名前の変更：', object.name );
	
	if( changeValue!=null )
		UpdateHandoff( { name: changeValue }, this );
	
	return false;// bubbling stop.
}
function changeComment()
{
	var object = getObject_byEventElem(this);
	var changeValue = prompt('コメントの変更：', object.comment);
	
	if( changeValue==null ) return 1;
	
	changeHandoff(this, { 
		comment: changeValue 
	}, object);
	
	return false;// bubbling stop.
}
function changeUrl()
{
	var object = getObject_byEventElem(this);
	var changeValue = prompt('URLの変更：', object.url);
	if( changeValue==null ) return 1;
	
	changeHandoff(this, { 
		url: changeValue 
	}, object);
	
	return false;// bubbling stop.
}

//----------------------------------------------------------------------
//	Update Handoff to Ajax function
//----------------------------------------------------------------------
function UpdateHandoff( updateData, that )
{
	var method = whoami_byEventElem(that);
	var object = getObject_byEventElem(that);
	update(method, object.id, updateData, function()
	{
		reloadFn();
	});
}







//----------------------------------------------------------------------
//	Insert Event Handler
//----------------------------------------------------------------------

function add_Handler()//this function is event handler (so exist eventDOM in 'this')
{
	if(!isLogin) return alert('追加を行うにはログインしてください');//User have no acount
	
	var name = prompt('新しい名前：');	if( name==null ) return 1;//User canceled
	
	switch( whoami_byEventElem(this) )
	{
		case 'stack':
			insertStack(name, reloadFn);
			break;
			
			
		case 'book':
			var stack_id = getObject_byEventElem(this, 'stack').id;
			insertBook(name, stack_id, reloadFn);
			break;
			
			
		case 'bookmark':
			var url = prompt('URL：');	if( url==null ) return 1;//User canceled
			var comment = prompt('コメント：');	if( comment==null ) return 1;//User canceled
			var tags = 'NULL';
			var book_id = $(this).closest('.parent').data('book_id');
			insertBookmark(url, name, book_id, tags, comment, reloadFn);
			break;
	}
	
	return false;
}


//----------------------------------------------------------------------
//	Tiny Functions
//----------------------------------------------------------------------
function getBookId_byEventBookmarkChild(that)
{
	var $tmp = $(that);
	for(var i=0; i<100; i++)
	{
		if( $tmp.is('body') ) return;
		
		
		if( $tmp.hasClass('parent') ) break;
		
		
		$tmp = $tmp.parent();
	}
	
	
	return $tmp.data('book_id');
}

//	methodによって返すobejectを切り替えることができる
function getObject_byEventElem(that, method)
{
	var $tmp = $(that);
	for(var i=0; i<100; i++)
	{
		if( $tmp.is('body') ) return;
		
		
		if( method=='stack' ){
			if( $tmp.hasClass('theme-ground') ) break;
		}
		else{
			if( $tmp.hasClass('child') ) break;
			if( $tmp.hasClass('theme-ground') ) break;
		}
		
		
		$tmp = $tmp.parent();
	}
	
	
	return $tmp.data('object');
}

function whoami_byEventElem(that)
{
	var $tmp = $(that), who=null;
	for(var i=0; i<100; i++)
	{
		if( $tmp.is('body') ) return;
		
		
		if( $tmp.is('.parent.books') ){ 		who = 'book'; break; }
		if( $tmp.is('.parent.bookmarks') ){ 	who = 'bookmark'; break; }
		if( $tmp.hasClass('theme-ground') ){ 	who = 'stack'; break; }
		
		
		$tmp = $tmp.parent();
	}
	
	return who;
}

function reloadFn()
{
	location.reload();
}





