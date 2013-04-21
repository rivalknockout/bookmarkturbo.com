	
	var SPEED		= 600;
	var EASE		= 'easeOutExpo';
	
//--------------------------------------------------------------------------------
//	Slide
//--------------------------------------------------------------------------------
	
	//onmouseしたらslideの位置を再計算して、その位置にアニメーションする
	
	function stopSlideRail_Handler(e)
	{
		//console.log('out');
	}
	
	function slideRail_Handler(e)
	{
		var $eventObserveElem	= $(this);
		var $slideElem			= $(this).find('.base-rail');
		
		var maxLeft = getMaxLeft( $slideElem );
		
		var x = e.clientX;
		var marginL	= Math.abs( parseInt( $(this).css('margin-left') ) );
		var width	= parseInt( $(this).css('width') );
		if( x>marginL && x<width+marginL )
		{
			x = x-marginL;
			console.log( x );
		}
		
		//$slideElem.css({ left: -maxLeft });
		
		
		return false;
	}
	
	//tiny functions...
	function getMaxLeft( $slideElem )
	{
		var target_fullWidth = getChildrenFullWidth();
		
		var maxLeft = 
		target_fullWidth - parseInt( $slideElem.css('width') );
		
		return maxLeft;
	}
	
	function getChildrenFullWidth()
	{
		var $children = $('#bookmark').find('.parent.current .child');
		
		var child_fullWidth =
		parseInt( $children.css('width') ) +
		parseInt( $children.css('margin-right') );
		var numberOf_oddChildren =
		Math.ceil( $children.length/2 );
		
		var target_fullWidth = numberOf_oddChildren * child_fullWidth;
		return target_fullWidth;
	}
	
	
	/*
	 *	マウスがとまってるときはコールされない。
	 *	mousemoveイベントはマウスが動いている間のみコールされる
	 *	そのため、このハンドラーは'動いたマウスの位置を別の関数に伝える関数'として使う
	 *	
	 *	マウスが動いているとき、止まっているときによって処理が必要
	 *	マウスが動いているとき cssを書き換えるだけ
	 *	止まっているとき setIntervalに任せる
	 *	
	 *	
	 */
	var Timer = {};
	function _stopSlideRail_Handler(e)
	{
		if( Timer ) clearInterval( Timer );
	}
	function _slideRail_Handler(e)
	{
		//マウスが動いたらすぐにIntervalを止める
		if( Timer ) clearInterval( Timer );
		
		
		//変数
		var $this	= $(this);
		
		var eventX, baseX, relatX, boxwidth;
		//eventX		= e.pageX-$this.position().left;
		eventX		= e.pageX;
		boxwidth	= 
			parseInt( $this.css('margin-left') )	+
			parseInt( $this.css('width') )			+
			parseInt( $this.css('margin-right') );
		baseX		= boxwidth/2;
		relatX		= eventX-baseX;//相対的に数値を得られる（左側のときはマイナス値）
		
		
		//変数2
		var operator, operand, power;
		operator	= relatX>0?	'-':'+';
		operand		= Math.abs(relatX);
		power		= getPower( operand );
		console.log('operand:'+operand);
		console.log('power:'+power);
		
		
		//CSS書き換え
		rewriteCss( operator, power, $this );
		
		
		//マウスが止まったとき用にIntervalをセット
		Timer = setInterval(function(){
			rewriteCss( operator, power, $this );
		}, 30);//30~60fps
		
	}
	
	function rewriteCss( operator, power, $this )
	{
		//Why margin left?
		$this.css({
			left: operator+'='+power+'px'
		});
	}
	
	function getPower( operand )
	{
		//return Math.pow(i, Math.pow(i,.1) );
		return Math.pow(operand,2);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	/*
	 *	回帰的に動作し続けている関数のふるまいを変えるための関数
	 *	
	 */
	function changeBehavior( operator, operand, $this )
	{
		if( Timer ) clearInterval( Timer );
		
		Timer = setInterval(function(){
			recursiveSetCss( operator, 1, $this );
		}, 30);//30~60fps
		
	}
	
	function recursiveSetCss( operator, operand, $this )
	{
		power = 1*operand;
		
		$this.css({
			marginLeft: operator+'='+power+'px'
		});
	}
	
	
	
	
	
	
	
	
	
	
	
		/*
		//動きが激しいのでここで減退
		relatX = relatX/16;
		
		
		if( relatX>0 )
			//イベントは中央より右で発生
			marginLeft = '-=' +relatX+ 'px';
		else if( relatX<0 )
			//イベントは中央より左で発生
			marginLeft = '+=' +(relatX*-1)+ 'px';
		
		
		/	Done...
		$this.css({
			marginLeft: marginLeft
		});
		*/
	/*
	for(var i=0; i<100; i++){
		console.log( Math.pow(i, Math.pow(i,.1) ) );
	}
	*/
	function powEngine(i){
		//return Math.pow(i, Math.pow(i,.1) );
		return Math.pow(i,.1);
	}
	
	
	
	
	
	
