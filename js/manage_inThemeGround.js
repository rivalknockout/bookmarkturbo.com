

function openThemeGround()
{
	var $thisFirst	= $(this);
	
	var $themeGround	= $thisFirst.parent().parent();
	var $baseRail		= $('.base-rail', $themeGround);
	
	var stackObject	= $themeGround.data('stackObject');
	
	var SPEED		= 600;
	var EASE		= 'easeOutExpo';
	
	
	//	Exist Books...?
	if( $('.books.parent', $baseRail).length == 0 )
	{
		console.log(' Will Create Book Parent... ');
		
		var $parent = createBookParent($baseRail, stackObject.books);
		
		$parent
			.find('>div')
			.adjustWH()
			.adjustM()
			.adjustTwoLines();
	}
	
	
	//	排他的処理
	closeThemeGround();
	
	
	//	Done...
	$themeGround.addClass('current')
		.find('.base-rail').openRail(SPEED, EASE);
	
	
}
function closeThemeGround()
{
	var SPEED		= 600;
	var EASE		= 'easeOutExpo';
	
	$('#bookmark .theme-ground.current').removeClass('current').removeClass('showingBookmark')
		.find('.base-rail').closeRail(SPEED, EASE);
}



function showBookMarks()
{
	var $thisBook		= $(this);
	var bookObject		= $thisBook.data('bookObject');
	if(bookObject === undefined)
		return;
	
	var $bookParent		= $thisBook.parent();
	var $baseRail		= $bookParent.parent();
	var $themeGround	= $baseRail.parent();
	
	
	//	Exist Bookmarks...?
	if( $('.bookmarks', $baseRail).hasClass('bookId'+bookObject.id)==false )
	{
		console.log(' Will Create BookMark Parent... ');
		
		var $parent = createBookmarkParent($baseRail, bookObject.bookmarks, bookObject.id);
		
		$parent
			.find('>a')
			.adjustWH()
			.adjustM()
			.adjustTwoLines()
			
			.filter(':not(.add)')
			.loadingCSS('70%');
	}
	
	
	$themeGround.addClass('showingBookmark');
	$themeGround
		.find('.caption .third').text(bookObject.name);
	
	
	//	bookの子要素を反転
	$bookParent
		.find('>div').delayOutRotateX();
	
	//	Done...
	$('.bookId'+bookObject.id+'.bookmarks', $baseRail).show().addClass('current')
		.find('>a').delayInRotateX();
	
	
}


function backToBook()
{
	var $thisThird		= $(this);
	var $themeGround	= $thisThird.parent().parent();
	var $baseRail		= $themeGround.find('.base-rail');
	
	
	$themeGround.removeClass('showingBookmark');
	
	
	//	Bookmarkを反転して...
	$('.bookmarks.current').removeClass('current')
		.find('>a').delayOutRotateX();
	
	//	Bookを表示する
	$baseRail
		.find('.books.parent >div').delayInRotateX();
	
	
}


//	icon < edit < child
function openEdit_child()
{
	var $iconEdit = $(this);
	
	$iconEdit.parent().parent().addClass('editing');
	$iconEdit.parent().find('.icon-edit').hide();
	setTimeout(function()
	{
		$iconEdit.parent().find('*:not(.icon-edit)').stop(true, true).fadeIn(600);
	}, 300);
	return false;
}
function closeEdit_child()
{
	var $iconClose = $(this);
	
	$iconClose.parent().parent().removeClass('editing');
	$iconClose.parent().find('*').hide();
	$iconClose.parent().find('.icon-edit').stop(true, true).fadeIn(600);
	return false;
}


//------------------------------------------------------------------------------------
//	jQuery's Open & Close rail Functions...
//------------------------------------------------------------------------------------

$.fn.openRail = function(SPEED, EASE)
{
	var $baseRail = $(this);
	
	//	Done...
	$baseRail
	.show()
	.animate({ height: window.innerHeight*.4 }, SPEED, EASE);
	setTimeout(function(){
		
		//	BookParent Animation...
		$('.books.parent', $baseRail)
		.show()
		.addClass('left0')
			.find('>div')
			.show()
			.css({ rotateX: 0 });
		
	}, SPEED*.2);
	
	return this;
};


$.fn.closeRail = function(SPEED, EASE)
{
	var $baseRail = $(this);
	
	//	BookParent Animation...
	$('.books.parent', $baseRail)
	.removeClass('left0');
	
	//	BookmarkParent Erase...
	$('.bookmarks.parent', $baseRail).hide();
	
	//	Done...
	$baseRail
	.animate({ height: 0 }, SPEED, EASE, function(){
		
		$(this).hide();
	});
	
	return this;
}






