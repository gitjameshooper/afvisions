 <?php

 
	$msg = 'Name: ' . $_POST['name'] . "\n" 
		. 'Company Name: ' . $_POST['company-name'] . "\n"
		. 'Email: ' . $_POST['email'] . "\n"
		. 'Comment: ' . $_POST['comment'];
	
		@mail('andrewfumagalli@gmail.com', '---AFVISIONS EMAIL---', $msg);
		 
?>
