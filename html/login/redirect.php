<?php
	if (isset($_POST['user_id']) && isset($_POST['id_token']) && isset($_POST['access_token']) && isset($_POST['access_token_secret'])) {
		$user_id =  $_POST['user_id'];
		$id_token =  $_POST['id_token'];
		$access_token =  $_POST['access_token'];
		$access_token_secret =  $_POST['access_token_secret'];
	} else {
		header("Location: http://goldcrests.hbtn.io");
		die(); // No params provided
	}
	$url = "http://localhost:3001/users/". $user_id . "/" . "?id_token=" . $id_token . "&access_token=" . $access_token . "&access_token_secret=" . $access_token_secret;
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
		header("http://goldcrests.hbtn.io/registration-2.php/?user_id=" .  $user_id . "&id_token=" . $id_token); /* User is new - Make them do stuff. */
		die(); 
	} else {
		header("http://goldcrests.hbtn.io/back_office.php/?user_id=" .  $user_id . "&id_token=" . $id_token); /* User exists - Let them in. */
		die(); 
	}
?>

