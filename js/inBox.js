//-------------------------------------------------------------------------------------
//	Layout setting...
//-------------------------------------------------------------------------------------
(function($){
	
	// Save Value to DOM...
	var $TG = $('#bookmark .theme-ground');
	//x(dont need: $TG.data( 'height', parseInt($TG.css('height')) );
	//x(dont need: $TG.css({ height: $TG.css('height') });
	
	
	
	//	ふれてない...
	/*
	// Layout setting...
	$P = $('#bookmark .rail');
	$T = $('>div', $P);
	
	$T
	.adjustWH()
	.adjustM()
	.adjustTwoLines();
	*/
	
})(jQuery);
//-------------------------------------------------------------------------------------
//	Events...
//-------------------------------------------------------------------------------------
$(window).resize(function(){
	
	
	//	ふれてない...
	/*
	$P = $('#bookmark .rail');
	$T = $('>div', $P);
	
	
	$T
	.adjustWH()
	.adjustM()
	.adjustTwoLines();
	*/
	
});

// Caption... 
var $TGs = $('#bookmark .theme-ground');
var $CAP = $('.caption', $TGs);
var $1st = $('.first', $CAP);
var $2nd = $('.second', $CAP);
var $3rd = $('.third', $CAP);


$1st.click(function(){
	
	//排他的処理
	closeRail($TGs.filter('.current'));
	$TGs.removeClass('current');
	
	
	//該当をオープン
	var $TG = $(this).parent().parent().addClass('current');
	openRail($TG);
});


<<<<<<< HEAD
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


=======
>>>>>>> createThemeGround.jsとcreateParent.jsに分けていたバージョンを保存





//-------------------------------------------------------------------------------------
//	???
//-------------------------------------------------------------------------------------
$('#status .app-title').hover(function(){
	
	$(this).stop(true, true).transition({
		perspective: '200px',
		rotateX: '-180deg'
	});
}, function(){
	
	$(this).stop(true, true).transition({
		perspective: '200px',
		rotateX: '0deg'
	});
});



