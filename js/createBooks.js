//--------------------------------------------------------------------------------
//	this program is...
//	.book.parentの中に大量のthumnailをつくり、それらにイベントをバインドする
//--------------------------------------------------------------------------------
function createThumnails_inBooks($book_rail)
{	
	var $P = $('.books.parent', $book_rail);
	
	for(key in data_books)
		$('<div data-index="'+key+'"></div>').appendTo($P);
	
	//作った子要素を登録
	var $Ts = $('> div', $P);
	
	
	// adjust~
	$Ts
	.adjustWH()
	.adjustM()
	.adjustTwoLines();
	// ~adjust
	
	
	$Ts.on('click', function(){
		
		
		$Ts.delayOutRotateX();
		
		
		//該当bookmarksが既にHTML上にあったら(Ajaxで取得する必要もDOMを作る必要もないので)
		//returnする
		if( $('#hoge.parent', $book_rail).length )
		{
			$('#hoge.parent', $book_rail).show()
			.find('> a').delayInRotateX();
			
			return;
		}
		
		$.ajax({
			
			dataType	:'json',
			
			url			:'get_bookmarks.php',
			
			data:{
				
				book_id	:data_books[key].id
				
			},
			
			success:function(data) {
				
				console.log(data);
				
				
				
				success(null, $book_rail);
				
			},
			
			error:function(XMLHttpRequest, textStatus, errorThrown) {
				
				console.log(XMLHttpRequest);
				
				console.log(textStatus);
				
				console.log(errorThrown);   //parseErrorとかでたら　php側で適切な値が返ってきてないっぽい(例：json_encode()し忘れ)
				
				
				success(null, $book_rail); //あとで消す
			}
			
			
		});
	});
}




// ajax success~
function success(data, $book_rail){
	
	//仮のjson
	data_bookmarks;
	var imgs = [];
	imgs[0] = '<img class="thumbnail" src="">';
	imgs[1] = '<img class="gloss" src="">';
	
	
	// create~
	var $P = $('<div id="hoge" class="bookmarks parent"></div>').appendTo($book_rail);
	
	for(key in data_bookmarks)
		$('<a href="#" data-index="'+key+'">'+imgs[0]+imgs[1]+'</a>').appendTo($P);
	// ~create
	
	
	// ini~
	var $T = $('> a', $P).css({ rotateX: '90deg' });
	
	$T
	.adjustWH()
	.adjustM()
	.adjustTwoLines();
	// ~ini
	
	
	$T.delayInRotateX();
	
	
}
// ~ajax success











