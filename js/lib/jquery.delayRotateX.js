//-------------------------------------------------------------------
//	
//	Need:	transit.js
//	該当要素に
//	transform: perspective(1000);
//	を忘れないこと！（perspective:	'1000px'ですると１個目以外が適用されない）
//-------------------------------------------------------------------
(function($){
	
	$.fn.delayInRotateX = function(speed){
		
		$(this).show().css({ rotateX: '90deg' });// ini
		console.log($(this).parent().attr('class') +' : initialized delayInRotateX');
		
		speed = speed || 220;
		var delay = speed/4;
		
		return this.each(function(i){
			
			var $that = $(this);
			
			setTimeout(function(){
				
				$that.stop(true, true).delay(delay*i).transition({
					rotateX:		'0deg'
				}, speed, 'out');
				
			}, 200);
		});
	}
	
	
	$.fn.delayOutRotateX = function(speed){
		
		$(this).show().css({ 'rotateX': '0deg' });// ini
		
		speed = speed || 220;
		var delay = speed/4;
		
		return this.each(function(i){
			
			$(this).stop(true, true).delay(delay*i).transition({
				rotateX:		'-90deg'
			}, speed, 'in', function(){
				
				$(this).hide();
			});
		});
	}
	
	
})(jQuery);