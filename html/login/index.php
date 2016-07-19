<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<script src="jquery-2.1.4.min.js" type="text/javascript"></script>
		<script src="https://cdn.auth0.com/js/lock-9.0.min.js"></script>
		<script src="auth0-variables.js"> </script>
		<title>Goldcrest - Login</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="pragma" content="no-cache" />
		<meta http-equiv="expires" content="-1" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="apple-touch-icon" sizes="57x57" href="apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
		<link rel="manifest" href="manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="ms-icon-144x144.png">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/stylish-portfolio.css" rel="stylesheet">
	</head>
	<body>
		<form name="sendin" action="#" method="post">
			<input type="hidden" name="user_id" />
			<input type="hidden" name="id_token" />
			<input type="hidden" name="access_token" />
			<input type="hidden" name="access_token_secret" />
		</form>
		<header id="top" class="header">
			<div class="text-vertical-center">
				<div id="logged-in-box-loading">
					<h2>Loading...</h2>
				</div> 
				<div id="login-box" style="display: none;">
					<h2>Loading...</h2>
				</div>
				<div id="logged-in-box" style="display: none;">
				  <h1>Goldcrest</h1>
					<br>
					<h2>Redirecting...</h2>
				</div>             
			</div>
		</header>
		<footer class="site-footer">
		</footer>
	</body>
	<script type="text/javascript">
			var lock = new Auth0Lock(
				AUTH0_CLIENT_ID,
				AUTH0_DOMAIN
			);
			var userProfile;
			var id_token;
			var hash = lock.parseHash(window.location.hash);
			if (hash) {
				if (hash.error) {
					alert('There was an error loading your profile: ' + err.message);
					window.location.replace("http://goldcrests.hbtn.io/");
				} else {
					id_token = hash.id_token;
				}
			}   
			if (id_token) {
				lock.getProfile(id_token, function (err, profile) {
					if (err) {
						alert('There was an error loading your profile: ' + err.message);
						window.location.replace("http://goldcrests.hbtn.io/");
					}
					document.getElementById('login-box').style.display = 'none';
					document.getElementById('logged-in-box-loading').style.display = 'none';
					document.getElementById('logged-in-box').style.display = 'inline';
					document.sendin.user_id.value = profile.user_id;
					document.sendin.id_token.value = id_token;
					document.sendin.access_token.value = profile.identities[0].access_token;
					document.sendin.access_token_secret.value = profile.identities[0].access_token_secret;
					document.sendin.action = "http://goldcrests.hbtn.io/login/redirect.php";
					document.sendin.submit();
				});
			} else {		
				document.getElementById('login-box').style.display = 'none';
				document.getElementById('logged-in-box').style.display = 'none';
				lock.show({ 
					authParams: { scope: 'openid' },
					closable: false,
					socialBigButtons: true,
					icon: 'apple-icon-57x57.png'
				}); 
			}
	</script>
</html>
