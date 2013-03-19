

// Rail... (あとでrailFunctions.jsでまとめてopenRail()でコールする予定　だって部品化は大事だもの)
function openRail($clicked_theme_ground)
{
	var $BR			= $('.base-rail', $clicked_theme_ground);
	var $P_BOOKS	= $('.books.parent', $BR);
	var SPEED		= 600;
	var EASE		= 'easeOutExpo';
	
	
	//.book-railが子要素をひとつももっていなかったら、.books.parentをつくりその中に子要素をもつ
	var hasChild = $BR.children().length;
	if(!hasChild)
	{
		$P_BOOKS = $('<div class="books parent"></div>').appendTo($BR);
		createThumnails_inBooks($BR);
	}
	
	
	console.log('Will Open The Clicked .base-rail');
	//Done
	$BR.show().animate({ height: window.innerHeight*.4 }, SPEED, EASE);
	setTimeout(function(){
		
		$P_BOOKS.delay(SPEED).addClass('left0').find('>div').show().css({ rotateX: 0 });
		
	}, SPEED*.2);
	
}
function closeRail($clicked_theme_ground)
{
	var $BR			= $('.base-rail', $clicked_theme_ground );
	var $P_BOOKS	= $('.books.parent', $BR);
	var SPEED		= 600;
	var EASE		= 'easeOutExpo';
	
	
	//Erase
	$('.bookmarks.parent', $BR).hide();
	
	
	//Done
	$P_BOOKS.removeClass('left0');
	$BR.animate({ height: 0 }, SPEED, EASE);
}