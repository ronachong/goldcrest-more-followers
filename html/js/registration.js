var id_token = "<?php echo $_POST['id_token'] ?>;"
var user_id = "<?php echo $_POST['user_id'] ?>;"

var returnJSON = null;
var authorization = "Bearer" + id_token
var submitButton = document.getElementById("submit");

// handler for clicking on submit button; sends POST request with email, name, user_id; sends GET request to API; and
// navigates to back office with POST request
submitButton.onclick = registerUser;

function registerUser() {
    name = document.getElementById("name").value
    email = document.getElementById("email").value  // update keyword value

    returnJSON = {
        "name" : name,
        "email" : email,
        "user_id" : user_id
    };

    sendPOSTrequest2API(returnJSON);
    sendGETrequest2API();
    
}

// function for sending POST request to API
function sendPOSTrequest2API(returnJSON) {
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', 'ENDPOINTHERE', true); // http://www.w3schools.com/ajax/ajax_xmlhttprequest_send.asp
    xhttp.setRequestHeader('Content-Type', 'application/json');
    xhttp.setRequestHeader('authorization', id_token);

    // do I need xhttp.onload here?? what does that do? see http://blog.garstasio.com/you-dont-need-jquery/ajax/ under Web API

    xhttp.send(JSON.stringify(returnJSON)); // not sure if I need to put send data inside () or can use just empty (); see http://blog.garstasio.com/you-dont-need-jquery/ajax/ under Web API
    
    // get response: hope that it contains id_token, user_id, email, name, keyword and is_active
    
}

/*
// function for sending GET request to API
function sendGETrequest2API() {
    var xhttp = new XMLHttpRequest();
    xhttp.open('GET', ENDPOINT HERE, true); // http://www.w3schools.com/ajax/ajax_xmlhttprequest_send.asp
    //xhttp.setRequestHeader('Content-Type', 'application/json');
    //xhttp.setRequestHeader('authorization', id_token);

    // do I need xhttp.onload here?? what does that do? see http://blog.garstasio.com/you-dont-need-jquery/ajax/ under Web API

    xhttp.send(); // not sure if I need to put send data inside () or can use just empty (); see http://blog.garstasio.com/you-dont-need-jquery/ajax/ under Web API
    responseJSON = json.parse(xhttp.responseText) // going by http://www.w3schools.com/ajax/ajax_xmlhttprequest_response.asp
    
} */