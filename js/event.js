
	$(document)
//--------------------------------------------------------------------------------
//	Slide event 	on Base rail
//--------------------------------------------------------------------------------
	
	.on('mousemove', '#bookmark .base-rail-wrapper', slideRail_Handler)
	.on('mouseout', '#bookmark .base-rail-wrapper', stopSlideRail_Handler)
	
	
//--------------------------------------------------------------------------------
//	Delete
//--------------------------------------------------------------------------------
	
	.on('click', '#bookmark .icon-delete', remove)
	/*x:
	$('#bookmark .first .icon-delete').live('click', remove);
	$('#bookmark .edit .icon-delete').live('click', remove);
	*/
	
	
//--------------------------------------------------------------------------------
//	Update
//--------------------------------------------------------------------------------

	.on('click', '#bookmark .first .icon-edit', changeName)
	.on('click', '#bookmark .edit .name', changeName)
	.on('click', '#bookmark .edit .comment', changeComment)
	.on('click', '#bookmark .edit .url', changeUrl)
	/*x:
	//x:$('#bookmark .first .icon-edit').live('click', changeName);
	$('#bookmark .edit .name').live('click', changeName);
	$('#bookmark .edit .comment').live('click', changeComment);
	$('#bookmark .edit .url').live('click', changeUrl);
	*/
	
	
//--------------------------------------------------------------------------------
//	Insert
//--------------------------------------------------------------------------------
	
	.on('click', '#bookmark .add', add_Handler)
	
	//x:$('#bookmark .theme-ground.add').live('click', add);
	/*x:
	$('#bookmark .theme-ground.add').live('click', function(){
		add('stack');
	});
	*/
	//x:$('#bookmark .books.parent .child.add').live('click', add);
	/*x:
	$('#bookmark .books.parent .child.add').live('click', function(){
		add('book');
	});
	*/
	//x:$('#bookmark .bookmarks.parent .child.add').live('click', add);
	/*x:
	$('#bookmark .bookmarks.parent .child.add').live('click', function(){
		add('bookmark');
	});
	*/


//--------------------------------------------------------------------------------
//	Caption
//--------------------------------------------------------------------------------
	
	.on('click', '#bookmark .first', openThemeGround_Handler)
	.on('click', '#bookmark .second', closeThemeGround_Handler)
	.on('click', '#bookmark .third', backToBook_Handler)
	/*
	$('#bookmark .first').live('click', openThemeGround);
	$('#bookmark .second').live('click', closeThemeGround);
	$('#bookmark .third').live('click', backToBook);
	*/
	
	
//--------------------------------------------------------------------------------
//	Base rail
//--------------------------------------------------------------------------------
	
	//	Books parent...
	.on('click', '#bookmark .books.parent .child:not(.add)', showBookMarks_Handler)
	//x:$('#bookmark .books.parent .child:not(.add)').live('click', showBookMarks);
	
	//	Edit...
	.on('click', '#bookmark .edit', function(){ return false })
	.on('click', '#bookmark .edit .icon-edit', openEdit_child_Handler)
	.on('click', '#bookmark .edit .icon-close', closeEdit_child_Handler)
	/*x:
	$('#bookmark .edit').live('click', function(){ return false });
	$('#bookmark .edit .icon-edit').live('click', openEdit_child);
	$('#bookmark .edit .icon-close').live('click', closeEdit_child);
	*/
	
	
	;//	<----- ! Don't forget!!;)
	
	
	
	
	
	
	
	