//-------------------------------------------------------------------------------------
//	Layout setting...
//-------------------------------------------------------------------------------------
(function($){
	
	// Save Value to DOM...
	var $TG = $('#bookmark .theme-ground');
	//x(dont need: $TG.data( 'height', parseInt($TG.css('height')) );
	//x(dont need: $TG.css({ height: $TG.css('height') });
	
	// Layout setting...
	$P = $('#bookmark .rail');
	$T = $('>div', $P);
	
	$T.adjustWH();
	$T.adjustM();
	$T.adjustTwoLines();
	
	
})(jQuery);
//-------------------------------------------------------------------------------------
//	Events...
//-------------------------------------------------------------------------------------
$(window).resize(function(){
	
	
	$P = $('#bookmark .rail');
	$T = $('>div', $P);
	
	
	$T.adjustWH();
	$T.adjustM();
	$T.adjustTwoLines();
	
	
});

// Caption...
var SECOND_Y = 60;
var $TG = $('#bookmark .theme-ground');
var $CAP = $('.caption', $TG);
var $1st = $('.first', $CAP);
var $2nd = $('.second', $CAP);
var $3rd = $('.third', $CAP);
var	SPEED	= 600;
var	EASE	= 'easeOutExpo';


$1st.click(function(){
	$TG.removeClass('current');
	$(this).parent().parent().addClass('current');
});

/*
$1st.toggle(function(){
	$(this).css({ visibility: 'hidden' });
}, function(){
	$(this).css({ visibility: 'visible' });
});

$2nd.toggle(function(){
	$(this).animate({ left: 0 },{ queue: false, duration: SPEED, easing: EASE })
	.fadeIn(SPEED);
}, function(){
	$(this).css({ left: SECOND_Y, display: 'none' });
});

$1st.click(function(){
	
	var $before_1st;
	$1st.each(function(i){
		if($(this).css('visibility') == 'hidden')
			$before_1st = $(this);
	});
	console.log($before_1st);
	$before_1st.click();
	$('+.second', $before_1st).click();
	
	
	$('+.second', $(this)).click();
	
	
});
*/


/*
$('.first', $CAP).toggle(function(){
	
	var 
	$this	= $(this),
	SPEED	= 600,
	EASE	= 'easeOutExpo';
	
	
	// Other Close...
	(function(){
		
		$1st.css({ visibility: 'visible' });
		
		if(!$2nd.data('left'))
			$2nd.data( 'left', $2nd.css('left') );
		$2nd.css({ left: $2nd.data('left'), display: 'none' });
		
	})();
	
	
	$this.css({ visibility: 'hidden' });
	$('+.second', $this).animate({ left: 0 },{ queue: false, duration: SPEED, easing: EASE })
	.fadeIn(SPEED);
	
}, function(){
	
	
	var $TG = $(this).parent().parent();
	
	
	
	
});

*/











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

