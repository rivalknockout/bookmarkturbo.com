//----------------------------------------------------------------------
//	Theme-ground	objectは.them-groundにいれてあります
//----------------------------------------------------------------------
//冗長なプログラムのために'stackObject'を与えています。
function createThemeGround( stackObject, className )
{
	name = stackObject.name||'null';
	var JSONs = 
	[{ 
	class:'theme-ground '+className, data:{ 'stackObject':stackObject, 'object':stackObject },
		c:[
		{ class:'caption  color-white f-Raleway t-shadow', 
			c:[
			{ t:'span', class:'first', html:name, 
				c: [
				{ t:'img', class:'icon-edit', src:'img/icon_white/Pen.png' },
				{ t:'img', class:'icon-delete', src:'img/icon_white/Delete.png' }
				]
			},
			{ t:'span', class:'second', html:'SELECT <strong>' +name+ '</strong> IS...' },
			{ t:'span', class:'third', html:'NO NAME' }
			]
		},
		{ class:'base-rail' }
		]
	}];
	
	return $(JSONs).to('#bookmark');;
}
function createThemeGround_toAdd()	//to add...
{
	return $([{ 
	class:'theme-ground add', 
		c: [{ t:'img', class:'icon-addstack', src:'img/icon_usefulA/014.png', title:'stackを追加する' }]
	}])
	.to('#bookmark');
}


//----------------------------------------------------------------------
//	Parent and Child	objectは子要素にいれてあります
//----------------------------------------------------------------------
//冗長なプログラムのために'bookObject'を与えています。
function createBookParent( $baseRail, objects )
{
	//	Parent...
	var JSONs = [{ class:'books parent', c:[] }];
	
	
	//	Children...
	if( objects==undefined ) objects=[];//例外処理
	for(var i=0; i<objects.length; i++)
	{
		//	Child...
		JSONs[0].c[JSONs[0].c.length] = { 
		class:'child num'+i, 
		data:{ 'bookObject':objects[i], 'object':objects[i] }, 
			
			//	Icon and Name...
			c:[
			{ t:'img', class:'icon-book', src:'img/icon_file_and_folder/081.png' },
			{ t:'p', class:'name', html:objects[i].name },
			getJSON_edit_toChildInner( objects[i] )
			]
		};
	}
	
	
	//	Child to Add...
	JSONs[0].c[JSONs[0].c.length] = 
	{ 
	class:'child add', 
		c:[
		{ t:'img', class:'icon-addbook', src:'img/icon_file_and_folder/083.png' }
		]
	};
	
	return $(JSONs).to( $baseRail );
}
//冗長なプログラムのために'bookmarkObject'を与えています。
function createBookmarkParent( $baseRail, objects, bookId )
{
	//	Parent...
	var JSONs = [{ class:'bookId' +bookId+ ' bookmarks parent', data:{ 'book_id':bookId }, c:[] }];
	
	
	//	Children...
	if( objects==undefined ) objects=[];//例外処理
	for(var i=0; i<objects.length; i++)
	{
		//	Child...
		JSONs[0].c[JSONs[0].c.length] = { 
		t:'a', href:objects[i].url, 
		class:'child num'+i, 
		data:{ 'bookmarkObject':objects[i], 'object':objects[i] }, 
			
			//	Icon and Name...
			c:[
			{ t:'img', class:'thumbnail', src:thumbURI(objects[i].url) },
			{ t:'img', class:'gloss', src:'img/gloss-thumb.png' },
			{ t:'p', class:'name', html:objects[i].name },
			getJSON_edit_toChildInner( objects[i], 'bookmark' )
			]
		};
	}
	
	
	//	Child to Add...
	JSONs[0].c[JSONs[0].c.length] = 
	{ 
	t:'a', class:'child add', 
		c:[
		{ t:'img', class:'icon-addbookmark', src:'img/icon_usefulA/014.png' }
		]
	};
	
	return $(JSONs).to( $baseRail );
}

//----------------------------------------------------------------------
//	Childの下層、Edit
//----------------------------------------------------------------------
function getJSON_edit_toChildInner( object, method )
{
	var JSON = { 
	class:'edit', 
		c:[
		{ t:'img', class:'icon-edit', src:'img/icon_white/Pen.png' },//21x21//Notepad:16x20
		{ t:'img', class:'icon-close', src:'img/icon_white/017.png' },//32x32
		{ t:'img', class:'icon-delete', src:'img/icon_white/Delete.png' },//18x22
		getJSON_select_toMove()
		]
	};
	JSON.c[JSON.c.length] = 
	{ t:'p', class:'name', html:object.name };
	
	if( method=='bookmark' )
	{
		JSON.c[JSON.c.length] = 
		{ t:'p', class:'comment', html:object.comment };
		JSON.c[JSON.c.length] = 
		{ t:'p', class:'url', html:object.url };
	}
	
	return JSON;
}

//----------------------------------------------------------------------
//	Select
//----------------------------------------------------------------------
function getJSON_select_toMove()
{
	var JSON = { 
	t:'select', 
		//	first child
		c:[{ t:'option', selected:'', disabled:'', value:'', html:'移動先' }] };
	for(var i=0; i<2; i++)
	{
		//	children
		JSON.c[JSON.c.length] = 
		{ t:'option', value:'', html:'name'+i }
	}
	
	return JSON;
}


//----------------------------------------------------------------------
//	Tiny functions
//----------------------------------------------------------------------


function thumbURI(url)
{
	var unitedURI = '';
	
	unitedURI += 'http://s.wordpress.com/mshots/v1/';
	unitedURI += encodeURIComponent(url);
	unitedURI += '/?w=300';
	//unitedURI += '%2F?w=300';	どちらでも可
	
	return unitedURI;
}















