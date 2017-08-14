<?php 

date_default_timezone_set('America/Sao_Paulo');
include "../autoload.php";

if (isset($_POST['token'])) {
	$message = new message();
	$message->username 		= $_POST['username'];
	$message->message 		= $_POST['message'];
	$message->created_at	= date("Y-m-d H:i:s");
	
	$message->Send();
}

 ?>