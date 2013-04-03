
//	stackObjectは.theme-groundにいれてあります
function createThemeGround(stackObject, className, isFirstopen)
{
	var $HIGHEST = $('#bookmark');
	
	var $themeGround = makeThemeGroundElement(stackObject, $HIGHEST, className);
	
	var $caption = makeCaptionElement(stackObject, $themeGround, isFirstopen);
	
	var $baseRail = makeBaseRailElement(stackObject, $themeGround);
	
	return 1;
}

//	bookObjectは子要素にいれてあります
function createBookParent($baseRail, bookArray)
{
	var $bookParent = makeParentElement($baseRail, 'books');
	
	var $children = makeBookChildrenElement(bookArray, $bookParent);
	
	return 1;
}

//	bookmarkObjectは子要素にいれてあります
function createBookmarkParent($baseRail, bookmarkArray, bookId)
{
	var $bookmarkParent = makeParentElement($baseRail, 'bookId' +bookId+ ' bookmarks');
	
	var $children = makeBookmarkChildrenElement(bookmarkArray, $bookmarkParent);
	
	
	//	Extend...
	//	アプリページからbookmarkをinsertするときに必要(create.js)
	$bookmarkParent.data('book_id', bookId);
	
	return 1;
}


//----------------------------------------------------------------------
//	Create Theme Ground
//----------------------------------------------------------------------
function makeThemeGroundElement(stackObject, $HIGHEST, className)
{
	var $themeGround = $('<div class="theme-ground"></div>')
		.appendTo($HIGHEST)
		.addClass( className );
	
	if( stackObject=='add' )
	{
		$('<img class="icon-addstack" src="img/icon_usefulA/014.png" title="stackを追加する">')
			.appendTo($themeGround);
			
		$themeGround
			.addClass('add')
			.click( add );
	}
	else
		$themeGround.data('stackObject', stackObject);
	
	
	return $themeGround;
}

/* Caption... */
function makeCaptionElement(stackObject, $themeGround, isFirstopen)
{
	if( stackObject=='add' ) return null;
	
	var stack_name	= stackObject.name	|| 'null';
	
	
	var $caption = $('<div class="caption  color-white f-Raleway t-shadow"></div>')
		.appendTo($themeGround)
	
	var $first = $('<span class="first">' +stack_name+ '</span>')
		.appendTo($caption)
		.click( openThemeGround );
		
		var $iconEdit = $('<img class="icon-edit" src="img/icon_white/Pen.png">')
			.appendTo($first)
			.click( changeName );
		
	var $second = $('<span class="second">SELECT <strong>' +stack_name+ '</strong> IS...</span>')
		.appendTo($caption)
		.click( closeThemeGround );
		
	var $third = $('<span class="third">NO NAME</span>')
		.appendTo($caption)
		.click( backToBook );
	
	
	if(isFirstopen)
		setTimeout(function(){
			$first.click();
		}, 900);
	
	
	return $caption;
}

/* Base Rail... */
function makeBaseRailElement(stackObject, $themeGround)
{
	return $('<div class="base-rail"></div>').appendTo($themeGround);
}


//----------------------------------------------------------------------
//	Create Book Parent, Bookmark Parent
//----------------------------------------------------------------------
function makeParentElement($baseRail, className)
{
	var $parent = $('<div class="' +className+ ' parent">').appendTo($baseRail);
	
	return $parent;
}

/* Children... */
function makeBookChildrenElement(bookArray, $parent)
{
	for( i in bookArray )
	{
		var $child = makeBookChildElement(bookArray[i], $parent)
			.click( showBookMark );
		var $edit = makeEditElement(bookArray[i], $child)
			.click(function(){ return false });
	}
	
	var $child = makeBookChildElement('add', $parent)
		.click(function(){ return false });
	
	//	Extend...
	var $children = $parent.find('>div')
		.adjustWH()
		.adjustM()
		.adjustTwoLines();
		
		
	return $children;
}
function makeBookmarkChildrenElement(bookmarkArray, $parent)
{
	for( i in bookmarkArray )
	{
		var $child = makeBookmarkChildElement(bookmarkArray[i], $parent);
		var $edit = makeEditElement(bookmarkArray[i], $child)
			.click(function(){ return false });
	}
	
	var $child = makeBookmarkChildElement('add', $parent)
		.click(function(){ return false });
	
	//	Extend...
	var $children = $parent.find('>a')
		.adjustWH()
		.adjustM()
		.adjustTwoLines();
		
		
	return $children;
}

/* Child... */
function makeBookChildElement(object, $parent)
{
	var $child = $('<div></div>').appendTo($parent);
	if( object=='add' )
	{
		$child.addClass('add');
		
		$('<img class="icon-addbook" src="img/icon_file_and_folder/083.png">')
			.appendTo($child)
			.click( add );
	}
	else
	{
		$('<img class="icon-book" src="img/icon_file_and_folder/081.png">').appendTo($child);
		$('<p class="name">' +object.name+ '</p>').appendTo($child);
		
		$child.data('bookObject', object);
	}
	
	
	return $child;
}
function makeBookmarkChildElement(object, $parent)
{
	var $child = $('<a href="' +object.url+ '"></a>').appendTo($parent);
	if( object=='add' )
	{
		$child.addClass('add');
		
		$('<img class="icon-addbookmark" src="img/icon_usefulA/014.png">')
			.appendTo($child)
			.click( add );
	}
	else
	{
		$('<img class="thumbnail" src="' +thumbURI(object.url)+ '">').appendTo($child);
		$('<img class="gloss" src="img/gloss-thumb.png">').appendTo($child);
		$('<p class="name">' +object.name+ '</p>').appendTo($child);
		
		$child.data('bookmarkObject', object).loadingCSS('70%');
	}
	
	
	return $child;
}

/* Edit... */
function makeEditElement(object, $child)
{
	var $edit = $('<div class="edit"></div>').appendTo($child);
	
	
	//	Icon...
	var $iconEdit = $('<img class="icon-edit" src="img/icon_white/Pen.png">')//21x21//Notepad:16x20
		.appendTo($edit)
		.click( openEdit_child );
	
	var $iconClose = $('<img class="icon-close" src="img/icon_white/017.png">')//32x32
		.appendTo($edit)
		.click( closeEdit_child );
	
	var $iconDelete = $('<img class="icon-delete" src="img/icon_white/Delete.png">').appendTo($edit);//18x22
	
	
	//	Form...
	var $select = $('<select></select>').appendTo($edit);
	$('<option value="" selected disabled>移動先</option>').appendTo($select);
	
	var $name = $('<p class="name">' +object.name+ '</p>')
		.appendTo($edit)
		.click( changeName );
	
	if( object.comment!=undefined )
	{
		var $comment = $('<p class="comment">' +object.comment+ '</p>')
			.appendTo($edit);
	}
	
	if( object.url!=undefined )
	{
		var $url = $('<p class="url">' +object.url+ '</p>')
			.appendTo($edit);
			//.click();
	}
	
	
	return $edit;
}


//----------------------------------------------------------------------
//	Tiny functions
//----------------------------------------------------------------------


function thumbURI(url)
{
	var unitedURI = '';
	
	unitedURI += 'http://s.wordpress.com/mshots/v1/';
	unitedURI += encodeURIComponent(url);
	unitedURI += '/?w=300';
	//unitedURI += '%2F?w=300';	どちらでも可
	
	return unitedURI;
}








