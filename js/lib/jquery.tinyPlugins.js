(function($)
{
	//ローディングgifのようなものを表示する
	//プラグイン：floatingBarsG	on reset.css v1.0
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
	
	/*x:車輪の再発明
	//.find()の親探索版
	$.fn.findp = function( selector )
	{
		$this = $(this);
		
		for(var i=0; i<100; i++)
		{
			$this = $this.parent();
			if( $this.is( selector ) ) break;
			
		}
		
		return $this;
	}
	*/
	
})(jQuery);