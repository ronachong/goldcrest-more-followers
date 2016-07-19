console.log("does this work");
var id_token = <?php echo $_POST['id_token'] ?>;
var user_id = <?php echo $_POST['user_id'] ?>;
var email = <?php echo $_POST['email'] ?>;
var name = <?php echo $_POST['name'] ?>;
var keyword = <?php echo $_POST['keyword'] ?>;
var is_active = <?php echo $_POST['is_active'] ?>;

var returnJSON = null;
var authorization = "Bearer" + id_token

var submitButton = document.getElementByID("submit");
var activateButton = document.getElementByID("activate");

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
    xhttp.open('POST', 'ENDPOINT HERE', true); // http://www.w3schools.com/ajax/ajax_xmlhttprequest_send.asp
    xhttp.setRequestHeader('Content-Type', 'application/json');
    xhttp.setRequestHeader('authorization', id_token);

    // do I need xhttp.onload here?? what does that do? see http://blog.garstasio.com/you-dont-need-jquery/ajax/ under Web API

    xhttp.send(JSON.stringify(returnJSON)); // not sure if I need to put send data inside () or can use just empty (); see http://blog.garstasio.com/you-dont-need-jquery/ajax/ under Web API
}
