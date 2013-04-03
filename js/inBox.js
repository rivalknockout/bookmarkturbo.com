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

/*x:
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

*/





//-------------------------------------------------------------------------------------
//	???
//-------------------------------------------------------------------------------------
/*
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
*/




//-------------------------------------------------------------------------------------
//	汎用的なfunction
//-------------------------------------------------------------------------------------
function c(a1,a2,a3,a4,a5,a6,a7,a8,a9)
{
	console.log(a1);
}






