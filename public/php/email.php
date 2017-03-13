<?php


if (isset($_POST['inputName']) && isset($_POST['inputEmail']) && isset($_POST['inputCompany']) && isset($_POST['inputMessage'])) {

    $emailAddress= 'andrewfumagalli@gmail.com';   
   $msg = 'Name: ' . $_POST['inputName'] . "\n" 
		. 'Company Name: ' . $_POST['inputCompany'] . "\n"
		. 'Email: ' . $_POST['inputEmail'] . "\n"
		. 'Comment: ' . $_POST['inputMessage'];
	
		 
 
    if(@mail($emailAddress, '---AFVISIONS EMAIL---', $msg)) {
    	$data = array('success' => true, 'message' => 'Thanks! I have received your message.');
    	echo json_encode($data);
    	exit;
	}else{
        $data = array('success' => false, 'message' => 'Message could not be sent. Mailer Error');
        echo json_encode($data);
        exit;
    }
 }
