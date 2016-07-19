<?php
	if (isset($_POST['user_id']) && isset($_POST['id_token']) && isset($_POST['access_token']) && isset($_POST['access_token_secret'])) {
		$user_id =  $_POST['user_id'];
		$id_token =  $_POST['id_token'];
		$access_token =  $_POST['access_token'];
		$access_token_secret =  $_POST['access_token_secret'];
	} else {
		header("Location: https://google.com");
		die(); // No params provided
	}
	$url = "http://localhost:3001/users/". $user_id ."/" . "?id_token=" . $id_token . "&access_token=" . $access_token . "&access_token_secret=" . $access_token_secret;
	$options = array(
	    'http' => array(
	        'header'  => "Content-type: application/x-www-form-urlencoded\r\n", 
	        'header'  => "Authorization: Bearer " . $id_token, 
	    	'method'  => 'GET',
	        'content' => http_build_query($data)
	    )
	);
	$context  = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
	if ($result === FALSE) { 
		/* no user */
	} else {
		/* user found*/
	}
?>

