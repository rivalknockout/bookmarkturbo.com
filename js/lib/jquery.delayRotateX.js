//-------------------------------------------------------------------
//	Need:	transit.js
//	
//	該当要素に
//	CSS transform: perspective(1000);
//	を忘れないこと！
//	Js perspective:	'1000px'ですると１回目以外がなぜか適用されない
//-------------------------------------------------------------------
(function($){
	
	var SPEED = 180, DELAY_RATIO = .35;
	
	
	$.fn.delayInRotateX = function(speed){
		
		var WAIT = 200;//	Outと時差をつけるための待ち時間
		
		$(this).css({ rotateX: '90deg' }).show();// ini
		
		SPEED = speed || SPEED;
		var delay = SPEED*DELAY_RATIO;
		
		return this.each(function(i){
			
			var $that = $(this);
			
			setTimeout(function(){
				
				$that.stop(true, true).delay(delay*i).transition({
					//perspective:	'100px',	なぜか最初しか反映されない
					rotateX:		'0deg'
				}, SPEED, 'out');
				
			}, WAIT);
		});
	}
	
	
	$.fn.delayOutRotateX = function(speed){
		
		$(this).show().css({ 'rotateX': '0deg' });// ini
		
		SPEED = speed || SPEED;
		var delay = SPEED*DELAY_RATIO;
		
		return this.each(function(i){
			
			$(this).stop(true, true).delay(delay*i).transition({
				rotateX:		'-90deg'
			}, SPEED, 'in', function(){
				
				$(this).hide();
			});
		});
	}
	
	
})(jQuery);