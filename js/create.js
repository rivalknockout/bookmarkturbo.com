

function createThemeGround(stackObject)
{
	//	stackObjectは.theme-groundにいれてあります
	var $HIGHEST = $('#bookmark');
	$( makeThemeGroundHTML(stackObject) ).appendTo( $HIGHEST )
	.data('stackObject', stackObject)
	
	//	Bind Click Event...
	.find('.caption .first').click( openThemeGround );
}


function createBookParent($baseRail, bookArray)
{
	//	bookObjectは子要素にいれてあります
	$( makeBookParentHTML(bookArray) ).appendTo( $baseRail )
		.find('div').each(function(i){
			
			$(this).data('bookObject', bookArray[i])
			
		})
		.adjustWH()
		.adjustM()
		.adjustTwoLines()
		
		//	Bind Click Event...
		.click( showBookMark );
}


function createBookmarkParent($baseRail, bookmarkArray, bookId)
{
	//	bookmarkObjectは子要素にいれてあります
	$( makeBookmarkParentHTML(bookmarkArray, bookId) ).appendTo( $baseRail )
		.find('a').each(function(i){
			
			$(this).data('bookObject', bookmarkArray[i])
			
		})
		.adjustWH()
		.adjustM()
		.adjustTwoLines();
}


//----------------------------------------------------------------------
//	Primary functions
//----------------------------------------------------------------------

function makeThemeGroundHTML(stackObject)
{
	var stack_name	= stackObject.name	|| 'null';
	
	var HTML = '';
	HTML+='<div class="theme-ground">';
	HTML+='\	<div class="caption  color-white f-Raleway t-shadow">';
	HTML+='\	\	<span class="first">' +stack_name+ '</span>';
	HTML+='\	\	<span class="second">SELECT <strong>' +stack_name+ '</strong> IS...</span>';
	HTML+='\	\	<span class="third">NAME</span>';
	HTML+='\	</div>';
	HTML+='\	<div class="base-rail">';
	HTML+='\	</div>';
	HTML+='</div>';
	
	return HTML;
}


function makeBookParentHTML(bookArray)
{
	var HTML = '';
	
	
	HTML+='<div class="books parent">';
	for( i in bookArray )
	{
		HTML+='<div>';
		HTML+='\	<p>' +bookArray[i].name+ '</p>';
		HTML+='</div>';
	}
	HTML+='</div>';
	
	
	return HTML;
}


function makeBookmarkParentHTML(bookmarkArray, bookId)
{
	var HTML = '';
	
	
	HTML+='<div id="bookId' +bookId+ '" class="bookmarks parent">';
	for( i in bookmarkArray )
	{
		HTML+='<a href="' +bookmarkArray[i].url+ '">';//a Element
		HTML+='\	<img src="' +thumbURI(bookmarkArray[i].url)+ '">';
		HTML+='\	<p>' +bookmarkArray[i].name+ '</p>';
		HTML+='</a>';
	}
	HTML+='</div>';
	
	
	return HTML;
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

