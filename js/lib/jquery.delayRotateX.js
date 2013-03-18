//-------------------------------------------------------------------
//	
//	Need:	transit.js
//	該当要素に
//	transform: perspective(1000);
//	を忘れないこと！（perspective:	'1000px'ですると１個目以外が適用されない）
//-------------------------------------------------------------------
(function($){
	
	$.fn.delayInRotateX = function(speed){
		
		var WAIT = 100;//	Outと時差をつけるための待ち時間
		
		$(this).show().css({ rotateX: '90deg' });// ini
		console.log($(this).parent().attr('class') +' : initialized delayInRotateX');
		
		speed = speed || 180;
		var delay = speed/4;
		
		return this.each(function(i){
			
			var $that = $(this);
			
			setTimeout(function(){
				
				$that.stop(true, true).delay(delay*i).transition({
					//perspective:	'100px',	なぜか最初しか反映されない
					rotateX:		'0deg'
				}, speed, 'out');
				
			}, WAIT);
		});
	}
	
	
	$.fn.delayOutRotateX = function(speed){
		
		$(this).show().css({ 'rotateX': '0deg' });// ini
		
		speed = speed || 180;
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