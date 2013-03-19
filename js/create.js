

function createThemeGround(stack_name, stack_id)
{
	var $HIGHEST = $('#bookmark');
	$HIGHEST.append( makeThemeGroundHTML(stack_name, stack_id) );
	
	//	Bind Click Event...
	$('.theme-ground .caption .first', $HIGHEST).click( openRail );
}


function createParent(stack_id, stack_name, booksArray)
{
	stack_id = stack_id || 'null';
	
	var $HIGHEST = $('#stack_id' +stack_id+ '.theme-ground  .base-rail');
	$HIGHEST.append( makeParentHTML(booksArray) );
}


//----------------------------------------------------------------------
//	Primary functions
//----------------------------------------------------------------------
function makeThemeGroundHTML(stack_name, stack_id)
{
	stack_name	= stack_name || 'null';
	stack_id	= stack_id   || 'null';
	
	var HTML = '';
	HTML+='<!-- 00-00.JavaScript:' +stack_name+ ' -->';
	HTML+='<div id="stack_id' +stack_id+ '" class="theme-ground">';
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


function makeParentHTML(booksArray)
{
	var HTML = '';
	
	
	HTML+='<div class="books parent">';
	
	for( i in booksArray )
	{
		var book_name	= booksArray[i].name;
		var book_id		= booksArray[i].id;
		HTML+='<div data-bookId="' +book_id+ '"></div>';
		HTML+='\	<p>' +book_name+ '</p>';
		HTML+='</div>';
	}
	
	HTML+='</div>';
	
	
	return HTML;
}


//----------------------------------------------------------------------
//	Tiny functions
//----------------------------------------------------------------------




