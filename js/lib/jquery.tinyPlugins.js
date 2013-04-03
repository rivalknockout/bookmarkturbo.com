(function($)
{
	$.fn.loadingCSS = function(left, top)
	{
		var left = left || '50%', top = top || '50%';
		
		var $floatingBarsG = 
		$('<div id="floatingBarsG"></div>').prependTo(this)
		.css({
			position: 'absolute', left: left, top: top,
			marginTop: -12, marginLeft: -10
		}), i;
		
		for(i=1; i<=8; i++)
			$('<div class="blockG" id="rotateG_0'+i+'"></div>').appendTo($floatingBarsG);
		
		return this;
	}
	
	
})(jQuery);