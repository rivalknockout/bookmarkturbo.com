

function openThemeGround_Handler()
{
	var $this			= $(this);//#bookmark .first
	
	var $themeGround	= $this.closest('.theme-ground');
	var $baseRail		= $themeGround.find('.base-rail');
	
	var stackObject	= $themeGround.data('stackObject');
	
	var SPEED		= 600;
	var EASE		= 'easeOutExpo';
	
	
	// Tmp create ( to Slide event. )( remove, when this close. )
	$baseRail.wrap('<div class="base-rail-wrapper"></div>');
	
	
	
	
	//	Exist Books...?
	if( $baseRail.find('.books.parent').length == 0 )
	{
		console.log(' Will Create Book Parent... ');
		
		var $parent = createBookParent($baseRail, stackObject.books);
		
		$parent
			.find('>div')
			//x:.adjustWH()
			.adjustM()
			.adjustTwoLines();
	}
	
	
	//	排他的処理
	closeThemeGround_Handler();
	
	
	//	Done...
	$themeGround.addClass('current')
		.find('.base-rail').openRail(SPEED, EASE);
	
	
}
function closeThemeGround_Handler()
{
	var SPEED		= 600;
	var EASE		= 'easeOutExpo';
	
	$('#bookmark .theme-ground.current')
	.removeClass('current')
	.removeClass('showingBookmark')
		.find('.base-rail')
		.unwrap()
		.closeRail(SPEED, EASE);
	
}



function showBookMarks_Handler()
{
	var $this			= $(this);//#bookmark .books.parent .child:not(.add)
	var bookObject		= $this.data('bookObject');
	if( bookObject===undefined )
		return;
	
	var $bookParent		= $this.closest('.parent');
	var $baseRail		= $bookParent.closest('.base-rail');
	var $themeGround	= $baseRail.closest('.theme-ground');
	
	
	//	Exist Bookmarks...?
	if( $('.bookmarks', $baseRail).hasClass('bookId'+bookObject.id)==false )
	{
		console.log(' Will Create BookMark Parent... ');
		
		var $parent = createBookmarkParent($baseRail, bookObject.bookmarks, bookObject.id);
		
		$parent
			.find('>a')
			//x:.adjustWH()
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


function backToBook_Handler()
{
	var $thisThird		= $(this);
	var $themeGround	= $thisThird.closest('.theme-ground');
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
function openEdit_child_Handler()
{
	var $iconEdit = $(this);
	
	$iconEdit.hide()
	.closest('.child').addClass('editing');
	
	setTimeout(function()
	{
		$iconEdit.closest('.edit').find('*:not(.icon-edit)').stop(true, true).fadeIn(600);
	}, 300);
	return false;
}
function closeEdit_child_Handler()
{
	var $iconClose = $(this);
	
	$iconClose.closest('.child').removeClass('editing');
	$iconClose.closest('.edit').find('*').hide();
	$iconClose.closest('.edit').find('.icon-edit').stop(true, true).fadeIn(600);
	return false;
}


//------------------------------------------------------------------------------------
//	jQuery's Open & Close rail Functions...
//------------------------------------------------------------------------------------

$.fn.openRail = function(SPEED, EASE)
{
	var $baseRail = $(this); var YOHAKU = 20; 
	var $child = $baseRail.find('>.parent>.child');
	var height = 
	(
	parseInt( $child.css('height') )+
	parseInt( $child.css('margin-bottom') )
	)*2 +YOHAKU;
	
	
	//	Done...
	$baseRail
	.show()
	.animate({ height: height }, SPEED, EASE);
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






