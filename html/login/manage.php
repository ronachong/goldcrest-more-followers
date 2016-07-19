<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Goldcrest - Manage Users</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="pragma" content="no-cache" />
		<meta http-equiv="expires" content="-1" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
		<link rel="manifest" href="/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	</head>
	<body style="margin:0px;padding:0px;overflow:hidden">
    	<iframe id="iframe" frameborder="0" style="overflow:hidden;height:100%;width:100%" height="100%" width="100%"></iframe>
	</body>
	<script type="text/javascript">
		var iframe = document.getElementsById('iframe');
		var url = iframe.src;
		var getData = function (data) {
		    if (data && data.query && data.query.results && data.query.results.resources && data.query.results.resources.content && data.query.results.resources.status == 200) loadHTML(data.query.results.resources.content);
		    else if (data && data.error && data.error.description) loadHTML(data.error.description);
		    else loadHTML('Error: Cannot load ' + url);
		};
		var loadURL = function (src) {
		    url = src;
		    var script = document.createElement('script');
		    script.src = 'https://manage.auth0.com/';
		    document.body.appendChild(script);
		};
		var loadHTML = function (html) {
		    iframe.src = 'about:blank';
		    iframe.contentWindow.document.open();
		    iframe.contentWindow.document.write(html.replace(/<head>/i, '<head><base href="' + url + '"><scr' + 'ipt>document.addEventListener("click", function(e) { if(e.target && e.target.nodeName == "A") { e.preventDefault(); parent.loadURL(e.target.href); } });</scr' + 'ipt>'));
		    iframe.contentWindow.document.close();
		} 
		loadURL(iframe.src);
	</script>
</html>
