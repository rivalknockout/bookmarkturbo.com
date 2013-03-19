

function createParent(stack_id, stack_name, booksArray)
{
	stack_id = stack_id || 'null';
	
	var $HIGHEST = $('#stack_id' +stack_id+ '.theme-ground  .base-rail');
	$HIGHEST.append( makeParentHTML(booksArray) );
}


//--------------------------------------------------------------------------------
//	Primary functions
//--------------------------------------------------------------------------------
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


//--------------------------------------------------------------------------------
//	Tiny functions
//--------------------------------------------------------------------------------


