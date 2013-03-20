(function($){
	
	//-----------------------------------------------------------------
	//	ウィンドウの高さに対して、高さと幅の比率を決める
	//	adjustWH([prm1][,prm2]);
	//	prm1 :ウィンドウの高さを1としたときの高さの比率
	//	prm2 :高さを1としたときの幅の比率
	//-----------------------------------------------------------------
	$.fn.adjustWH = function(ratioHeightInWindow, ratioWidthForHeight)
	{	
		var COEF1 = ratioHeightInWindow || .18; //coefficient:係数 
		var COEF2 = ratioWidthForHeight || 2; //2nd golden ratio 1:2.618 ...is See you!!
		
		var h = window.innerHeight*COEF1;
		var w = h*COEF2;
		
		return this.each(function(){
			
			$(this).css({width :w, height :h});
		});
	}
	
	//-----------------------------------------------------------------
	//	要素の高さに対して、マージンを決める
	//	adjustM([prm1]);
	//	prm1	:高さを1としたときのマージンの比率
	//-----------------------------------------------------------------
	$.fn.adjustM = function(ratioMarginForHeight)
	{
		var COEF = ratioMarginForHeight || .04;
		
		var h = parseInt($(this).css('height'));//this height
		var mb = h*COEF;
		var mr = h*COEF;
		
		return this.each(function(){
			
			$(this).css({marginBottom:mb, marginRight:mr});
		});
	}
	
	//-----------------------------------------------------------------
	//	!Warrning: 要素をabsoluteかfixedにしておくこと！
	//	!Warrning: もし期待通りの動作をしない場合は、$(child1ren)であるか確認する
	//	
	//	2行、複数列の要素の並び方にする。marginも考慮するので安心
	//	幅と高さをもとに計算している
	//	あとでleft補正ができるようにする（スライドのため）
	//-----------------------------------------------------------------
	$.fn.adjustTwoLines = function(baseLeft)
	{
		var BASE = baseLeft || 0;
		
		var $this = $(this);
		var w = parseInt($this.css('width'));//this width
		var h = parseInt($this.css('height'));//this height
		var mb = parseInt($this.css('margin-bottom'));//this margin-bottom
		var mr = parseInt($this.css('margin-right'));//this margin-left
		console.log(w+':'+h+':'+mb+':'+mr);
		
		return this.each(function(i){
			var isOdd = i%2 ? true : false;//odd:奇数
			var t = isOdd ? h+mb : 0;
			var j = Math.floor(i/2);
			
			$(this).css({left: ((w+mr)*j)+BASE, top: t});
		});
	}	
	
	
	
	
	
	
	
	
	
	
})(jQuery);


