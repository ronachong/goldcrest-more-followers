<!-- html file for back office of http://goldcrests.hbtn.io/ -->

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Goldcrest Optimization</title>
        
        <!-- javascript to connect to API here -->

        <script type="text/javascript">            
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
              <a class="navbar-brand" href="#">Goldfinch Optimization</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <!-- <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></lsi>
                    <li class="dropdown-header">Nav header</li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
              </ul> -->
            </div><!--/.nav-collapse -->
          </div>
        </nav>

        <div class="container theme-showcase" role="main">

            <!-- Main jumbotron for a primary marketing message or call to action -->
          <div class="jumbotron">
            <h1>Theme example</h1>
            <p>This is a template showcasing the optional theme stylesheet included in Bootstrap. Use it as a starting point to create something more unique by building on or modifying it.</p>
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
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="../dist/js/bootstrap.min.js"></script>
        <script src="../assets/js/docs.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
      </body>
</html>



