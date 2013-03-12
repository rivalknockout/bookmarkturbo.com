//--------------------------------------------------------------
//	set id 'jqueryOpenTop' which want to implement.
//	if want have propaty 'push down', 
//	write 'data-pushdown' and set 'true' to this value.
//--------------------------------------------------------------
(function($){
	
	var $T = $('#jqueryOpenTop');
	var isPushDown = $T[0].dataset.pushdown || false;
	var h = parseInt($T.css('height'));
	var pt = parseInt($T.css('padding-top'));
	var pb = parseInt($T.css('padding-bottom'));
	
	if(isPushDown)
		$T.prependTo('body');
	
	$T.css({
		position:	isPushDown ? 'relative' : 'fixed',
		top:		0,
		left:		0,
		right:		0,
		marginTop:	-(h+pt+pb),
		boxShadow:	'						\
		inset 0 -14px 0 -10px #333,			\
		inset 0 -15px 0 -10px #606060, 		\
		inset 0 -12px 22px -2px black',
		background:	'url(img/bg-option-black.png) gray',
		zIndex:		1
	});
	/*
		borderBottom: '1px solid #606060',
		outline:	'4px solid #333',
	*/
	
	/*tab's style*/
	$('<a id="jqueryOpenTopButton"><img src="img/Settings.png"></a>').appendTo($T).css({
		display: 'block',
		position: 'absolute',
		right: 40,
		bottom: -28,
		width: 32,
		height: 28,
		borderRadius: '0 0 4px 4px',
		background: '#333',
		cursor:	'pointer'
	})
	.toggle(function(){
		
		$T.stop(true, true).animate({
			marginTop: '+=' + (h+pt+pb) + 'px'
		});
	}, function(){
		
		$T.stop(true, true).animate({
			marginTop: '-=' + (h+pt+pb) + 'px'
		});
	})
	/*gear's style*/
		.find('img').css({
			position: 'relative',
			top: 4,
			left: 6,
			width: 20,
			height: 20,
			opacity: .7
		});
	
})(jQuery);