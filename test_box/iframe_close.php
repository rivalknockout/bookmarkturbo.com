<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>test</title>
<!--<link href="../css/reset.v1.0.css" rel="stylesheet" type="text/css">-->
<style>


</style>
</head>
<body>

<script>

(function(d,j,b){function r(){setTimeout(function(){(typeof jQuery=='undefined')?r():b(jQuery)},99)}if(j){b(jQuery)}else{var s=d.createElement('script');s
.src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js';d.body.appendChild(s);r()}})(document,this.jQuery,function($){
	
	
	$('html, body').css({height: '100%'});
	
	
	var url = '';
	url+='http://rivalknockout.sakura.ne.jp/bookmarkturbo.com/bookmarkLet/send_all.php?title=';
	url+=document.title;
	url+='&url=';
	url+=location.href;
	
	var $that = 
	$('<iframe></iframe>')
	.attr({
		'id':	'rivalknockout_send_all_frame',
		'src':	url
	})
	.css({position: 'fixed', left: 0, top: 0, width: '100%', height: '100%', margin:0, border: 'none', zIndex: 99999})
	.appendTo('body');
	
	
	function changeIframeSize(e){
		if(e.data=='closeIframe')
			$that.remove();
	}
	
	if(window.addEventListener){
		addEventListener('message', changeIframeSize, false);
	}
	else{
		attachEvent('onmessage', changeIframeSize);
	}
	
	
});



















(function(d,j,b){function r(){setTimeout(function(){(typeof jQuery=='undefined')?r():b(jQuery)},99)}if(j){b(jQuery)}else{var s=d.createElement('script');s
	.src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js';d.body.appendChild(s);r()}})(document,this.jQuery,function($){
		
		
		$('html, body').css({height: '100%'});
		
		
		var url = '';
		url+='http://rivalknockout.sakura.ne.jp/bookmarkturbo.com/bookmarkLet/send_all.php?title=';
		url+=document.title;
		url+='&url=';
		url+=location.href;
		
		var $that = 
		$('<iframe></iframe>')
		.attr({
			'id':	'rivalknockout_send_all_frame',
			'src':	url
		})
		.css({position: 'fixed', left: 0, top: 0, width: '100%', height: '100%', margin:0, border: 'none', zIndex: 99999})
		.appendTo('body');
		
		
		function changeIframeSize(e){
			if(e.data=='closeIframe')
				$that.remove();
		}
		
		if(window.addEventListener){
			addEventListener('message', changeIframeSize, false);
		}
		else{
			attachEvent('onmessage', changeIframeSize);
		}
		
		
	});	


/*
	window.onmessage = function(ev){
		
		if(ev.data=='close iframe')
			$that.remove();
	};
*/
</script>
</body>
</html>