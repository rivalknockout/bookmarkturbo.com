/*! bounce.js
 * need:		transit.js
 * modified:	2013-03-10	
 * writer:		Hideaki
 */
function bounceIn(text, icon, isReverse)
{
	text = text || 'Starred';
	icon = icon || '★';
	
	var width	= 60;
	var height	= 60;
	
	var cssHash = {
		position:'fixed',
		left	:'50%',
		top		:'50%',
		border	:'1px solid #333',
		width	:width,
		height	:height,
		margin		:0,
		marginTop	:-height/2,
		marginLeft	:-width/2,
		padding		:0,
		borderRadius	:5,
		boxShadow		:
		'inset 0 1px rgba(255,255,255,.4), 0 3px 10px rgba(0,0,0,.7)',
		color		:'white',
		textAlign	:'center',
		textShadow	:'0 -1px black, 0 -1px black'
	};
	
	var gradStr = '';
	var browzer = ['-webkit-','-moz-','-ms-','-o-',''];
	for(i in browzer)
		gradStr += 'background-image:'+browzer[i]+'linear-gradient(rgba(70,70,70,.9) 0%, rgba(0,0,0,.9) 100%);';
	
	//style parent
	var $P = $('<dl><dt>'+icon+'</dt><dd>'+text+'</dd></dl>')
	.appendTo('body')
	.attr({style: gradStr})
	.css(cssHash);
	
	//style icon
	$('dt', $P).css({
		padding	:0,
		paddingTop:10,
		fontSize:17
	});
	
	//style text
	$('dd', $P).css({
		padding	:0,
		fontSize:10
	});
	
	
	//transition
	$P.css({
		scale: isReverse ? 1.7 : 0.7,
		opacity:0
	})
	.transition({scale: isReverse ? 0.94 : 1.06, opacity:1}, 120)
	.transition({scale: 1}, 25)
	.transition({scale: 1}, 500)//wait
	.transition({scale: isReverse ? 0.7 : 1.7, opacity:0}, 120, 
	function(){
		$(this).remove();
	});
	
}

function bounceOut(text, icon)
{
	text = text || 'Unstarred';
	icon = icon || '☆';
	bounceIn(text, icon, true);
}





