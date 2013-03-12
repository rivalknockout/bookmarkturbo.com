(function($){
	
	$P = $('#bookmark .rail');
	$T = $('>div', $P);
	
	$T.adjustWH();
	$T.adjustM();
	$T.adjustTwoLines();
	
	
	
	
	
	
})(jQuery);

$(window).resize(function(){
	
	$P = $('#bookmark .rail');
	$T = $('>div', $P);
	
	$T.adjustWH();
	$T.adjustM();
	$T.adjustTwoLines();
	
	
});



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

