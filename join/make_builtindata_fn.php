<?php
require_once('../sql/insert.php');


//------------------------------------------------------------
//	dbにinsertしていくfunction
//------------------------------------------------------------
function make_builtindata($user_id)
{
	//	Stack
	$stack_id = insert_stack('inBox', $user_id);
	
	//	Book
	insert_book('inBox', $stack_id, $user_id);
}


?>