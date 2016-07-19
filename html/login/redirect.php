<?php
	if (isset($_POST['macesc']) && isset($_POST['user_id']) && isset($_POST['id_token']) && isset($_POST['device_id'])) {
		$macesc =  $_POST['macesc'];
		$user_id =  $_POST['user_id'];
		$id_token =  $_POST['id_token'];
		$device_id =  $_POST['device_id'];
		$link_org =  $_POST['link_org'];

	} else {
		header("Location: https://access.freerangewifi.com");
		die(); // No params provided
	}
	$url = "https://connect.freerangewifi.com/api/login/web/" . $user_id . "/" . $device_id . "/" . $macesc . "/";
	$options = array(
	    'http' => array(
	        'header'  => "Content-type: application/x-www-form-urlencoded\r\n", 
	        'header'  => "Authorization: Bearer " . $id_token, 
	        'method'  => 'POST',
	        'content' => http_build_query($data)
	    )
	);
	$context  = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
	if ($result === FALSE) { /* Handle error */ 
		header("Location: https://access.freerangewifi.com/");
		die(); 
	}
	$decoded_json = json_decode($result, TRUE);
	if ($decoded_json['group'] == 'noaccess') {
		header("Location: https://www.freerangewifi.com/out-of-credit/?mac=" . $macesc . "&user_id=" . $user_id . "&id_token=" . $id_token . "&device_id=" . $device_id);
		die(); 
	}
	if ($decoded_json['redirectlocation'] == "") {
		if ($link_org == "") {
			$link_org = "https://www.freerangewifi.com";
		} 
	} else {
		$link_org = $decoded_json['redirectlocation'];
	}
	$mackey = $decoded_json['mackey'];
	$loginurl = $decoded_json['loginurl'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head><title>Free Range Wifi - Sign In</title></head>
<body>
	<form name="sendin" action="<?php echo $loginurl; ?>" method="post">
		<input type="hidden" name="username" value="<?php echo $macesc; ?>" />
		<input type="hidden" name="password" value="<?php echo $mackey; ?>" />
		<input type="hidden" name="dst" value="<?php echo $link_org; ?>" />
		<input type="hidden" name="popup" value="true" />
	</form>
	<script language="JavaScript">
		document.sendin.submit();
	</script>
	<noscript>Your browser does not support JavaScript!</noscript>
</body>
</html>

