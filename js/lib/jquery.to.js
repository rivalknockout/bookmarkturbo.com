//------------------------------------------------------------------
//	USAGE:
//	.to(JSONs : array)
//	
//	①配列を用意し、そこにJSONをいれてください。
//	　例：[{ t:'div', id:'id_name', class:'class_name' }]
//	　tプロパティは要素名です。あとは.attr()で登録するのとまったく同じです
//	
//	②DOMを複数生成したい場合はこの配列を利用してください。DOMをネスト（入れ子に）したい場合はc(children)プロパティです
//	　例：
//	[
//	{ t:'div', class:'parent num0', 
//		c:
//		[{ t:'a', href:'./index.html', class:'child num0' }]
//	}, 
//	{ t:'div', class:'parent num1' }
//	]
//	
//	SPECIAL:
//	DOM自身にかんたんにデータを格納できるようにdataプロパティを用意しました。
//	t:'div', data: { foo: 'bar' } と書くことで .data('foo')で'bar'を取り出すことができます。もちろん'bar'はJSONオブジェクトなどを与えることもできます
//	
//	FUTURE:
//	第二引数にtrueを与えると、prependのようなふるまいになる予定です
//------------------------------------------------------------------
(function($){
	
	$.fn.to = function(appendToSelector)
	{
		if(!$(appendToSelector).length){ alert('DOM to append is not found!\r\nis it read already?'); return 0; }
		
		return done(this, appendToSelector);
	};
	
	function done(JSONs, to)
	{
		for(var i=0; i<JSONs.length; i++)
		{
			//	Append...
			var $new = 
			$( castDOMstring(JSONs[i]) ).appendTo(to);
			
			//	Add data...(this is special proc)
			$new.data(JSONs[i].data);
			
			//	Add attributes...
			var hash = JSON.parse( JSON.stringify( JSONs[i] ) );//To passed by value (not reference!)
			
			hash.t=undefined; hash.c=undefined; hash.type=undefined; hash.data=undefined;
			
			$new.attr(hash);
			
			//	Recursive...
			if(JSONs[i].c!==undefined)
				done(JSONs[i].c, $new);
		}
		
		return $new;
	}
	
	function castDOMstring(JSON)
	{
		if( JSON.t=='input' ) return '<input type="' +JSON.type+ '" />';
		return '<' +JSON.t+ '></' +JSON.t+ '>';
	}
})(jQuery);