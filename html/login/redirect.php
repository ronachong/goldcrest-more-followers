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
	$data = array(
	    'user_id'      => $user_id,
	    'id_token'    => $id_token,
	    'access_token'       => $access_token,
	    'access_token_secret' => $access_token_secret
	);
	$url = "http://localhost:3001/users";    
	$content = json_encode($data);
	$authorization = "Authorization: Bearer " . $id_token;
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_HEADER, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json", $authorization));
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
	$json_response = curl_exec($curl);
	$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	curl_close($curl);
	if ( $status == 201 ) {
		header("Location: http://goldcrests.hbtn.io/registration.php/?user_id=" .  $user_id . "&id_token=" . $id_token); // User is new - Make them do stuff. 
		die(); 
	} elseif ( $status == 200 ) {
		header("Location: http://goldcrests.hbtn.io/back_office.php/?user_id=" .  $user_id . "&id_token=" . $id_token); // User exists - Let them in. 
		die(); 
	} else {
		header("Location: http://goldcrests.hbtn.io");
		die(); // 404
	}
?>

