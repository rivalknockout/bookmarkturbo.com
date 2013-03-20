

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
		
		createBookParent($baseRail, stackObject.books);
	}
	
	
	//	排他的処理
	$('#bookmark .theme-ground.current').removeClass('current')
		.find('.base-rail').closeRail(SPEED, EASE);
	
	
	//	Done...
	$themeGround.addClass('current')
		.find('.base-rail').openRail(SPEED, EASE);
	
	
}


function showBookMark()
{
	var $thisBookmark	= $(this);
	var bookObject		= $thisBookmark.data('bookObject');
	
	var $bookParent		= $thisBookmark.parent();
	var $baseRail		= $bookParent.parent();
	//x:var $themeGround	= $baseRail.parent();
	
	
	//	Exist Bookmarks...?
	if( $('#bookId'+bookObject.id+'.bookmarks', $baseRail).length == 0 )
	{
		console.log(' Will Create BookMark Parent... ');
		
		createBookmarkParent($baseRail, bookObject.bookmarks, bookObject.id);
	}
	
	
	//	bookの子要素を反転
	$bookParent.find('>div').delayOutRotateX();
	
	//	Done...
	$('#bookId'+bookObject.id+'.bookmarks', $baseRail).show().find('>a').delayInRotateX();
	
	
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






