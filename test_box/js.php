<!DOCTYPE HTML>
<html>
<head>
	<style>
	
	#hoge{
		width: 100px; height: 100px;
		background: red;
	}
	
	div{
		width: 100px; height: 100px; background: red;
	}
	
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="../js/lib/jquery.to.js"></script>
	<script src="../js/lib/jquery.tinyPlugins.js"></script>
	<script>
	
	
	</script>
</head>
<body>

<div id="hoge">
	<div id="child"></div>
</div>

<script>
	
	
	/*
	var JSONs = 
	[
	{ t:'img', id: 'imghoge', class: 'num0 num1', src: '/hoge.jpg' },
	{ t:'div', id: 'hoge', class: 'num0 num1', style:'padding:20px', c:
		[
		{ t: 'div', id: 'nest', style:'background:yellow' }
		]
	},
	{ t:'input', type:'text', value:'hog', data:{object:'hoge'} }
	];
	
	//むり...?
	var JSONs =
	[
		{ each:8, class:'hoge' }
	];
	
	
	$(function(){
		
		$(JSONs).to('body');
	});
	*/
	
	
/* .live() テスト
$('#hoge').live('click', function(){
	alert();
});


$('<div></div>')
.attr({
	id: 'hoge',
	hoge: 11
})
.appendTo('body');
*/

/*
var hoge = {
	foo : function(){
		this.bar();
	}
};

hoge.bar = function(){
	alert();
}


//Done
hoge.foo();
*/

</script>
</body>
</html>