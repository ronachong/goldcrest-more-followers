<!-- html file for back office of http://goldcrests.hbtn.io/ -->

<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <title>Goldcrest Optimization</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="dist/css/bootstrap-theme.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="styles/theme.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      
      <!-- javascript to connect to API here -->

        <script>            
            //responseJSON = json.parse(xhttp.responseText); going by http://www.w3schools.com/ajax/ajax_xmlhttprequest_response.asp
            var id_token = <?php echo $_POST['id_token'] ?>;
            var user_id = <?php echo $_POST['user_id'] ?>;
            var email = <?php echo $_POST['email'] ?>;
            var name = <?php echo $_POST['name'] ?>;
            var keyword = <?php echo $_POST['keyword'] ?>;
            var is_active = <?php echo $_POST['is_active'] ?>;

            var returnJSON = NULL;
            var authorization = "Bearer" + id_token

            var submitButton = getElementByID("submit");
            var activateButton = getElementByID("activate");

            // handler for clicking update button; sends POST request with keyword, user_id
            submitButton.onclick = updateKeyword;

            function updateKeyword() {
                keyword = document.getElementById("keyword").value  // update keyword value

                returnJSON = {
                    "keyword" : keyword,
                    "user_id" : user_id
                };

                sendPOSTrequest(returnJSON);
            }

            // handler for clicking deactivate/activate button; sends POST request with is_active, user_id
            activateButton.onclick = updateStatus;

            function updateStatus() {
                is_active = is_active ? False : True; // switch value of is_active

                returnJSON = {
                    "is_active" : is_active,
                    "user_id" : user_id
                }

                sendPOSTrequest(returnJSON);
            }

            // function for sending POST request
            function sendPOSTrequest(returnJSON) {
                var xhttp = new XMLHttpRequest();
                xhttp.open('POST', ENDPOINT HERE, true); // http://www.w3schools.com/ajax/ajax_xmlhttprequest_send.asp
                xhttp.setRequestHeader('Content-Type', 'application/json');
                xhttp.setRequestHeader('authorization', id_token);

                // do I need xhttp.onload here?? what does that do? see http://blog.garstasio.com/you-dont-need-jquery/ajax/ under Web API

                xhttp.send(JSON.stringify(returnJSON)); // not sure if I need to put send data inside () or can use just empty (); see http://blog.garstasio.com/you-dont-need-jquery/ajax/ under Web API
            }
        </script>
  </head>

  <body role="document">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Goldcrest Optimization</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <!--<ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>-->
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container theme-showcase" role="main">
        
        
        <p id="b_office_caption"><img id="gc_logo" src="bird-icon.png" alt="goldcrest logo"><br>Enter a word or topic. Our service will search Twitter for tweets that mention the word you enter and like them!</p>
        
        <div id="back_office_form">
            <form class="form-group row">
              <fieldset class="form-group">
                <label for="keywordForm" class="col-sm-2 form-control-label">Word</label>
                  <!-- replace placeholder with a word -->
                <div class="col-sm-10">
                  <input type="keyword" class="form-control" id="keywordForm" placeholder="placeholder keyword">
                    </div>
              </fieldset>

              <button type="submit" class="btn btn-primary">Update</button>
              <button type="submit" class="btn btn-success">Activate</button>
            </form>
         </div>

    </div> <!-- /container -->

    <div class="sticky">
        <div class="fb-like" data-href="goldcrests.hbtn.io" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="false"></div>
        <a href="https://twitter.com/teamgoldcrest" class="twitter-follow-button" data-size="large" data-show-count="false">Follow @teamgoldcrest</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>
   
      <!-- Facebook JDK for Like Button
    ================================================== -->
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>



