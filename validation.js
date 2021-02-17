/*------------- validation input form----------*/
var myInput_username = document.getElementById("username");
var start_username = document.getElementById("start_username");
var username = document.getElementById("validusername");

var myInput_password = document.getElementById("password");
var start = document.getElementById("start");
var number = document.getElementById("number");
var length = document.getElementById("length");
var spechar = document.getElementById("spechar");

//-----------------------------username-------------------------------
// When the user clicks on the username field, show the message_username box
myInput_username.onfocus = function() {
  document.getElementById("message_username").style.display = "block";
}

// When the user clicks outside of the username field, hide the message_username box
myInput_username.onblur = function() {
  document.getElementById("message_username").style.display = "none";
}

// When the user starts to type something inside the username field
myInput_username.onkeyup = function() {
  // Validate starting letters
  var starting_username = /^[a-zA-Z]/g;
  if(myInput_username.value.match(starting_username)) {
    start_username.classList.remove("invalid");
    start_username.classList.add("valid");
  } else {
    start_username.classList.remove("valid");
    start_username.classList.add("invalid");
  }

  // Validate containing only numbers and letters
  var numbers_username = /[^a-zA-Z0-9]/g;
  if(myInput_username.value.match(numbers_username)) {
    username.classList.add("invalid");  //add if not match
    username.classList.remove("valid");
  } else {
    username.classList.add("valid");
    username.classList.remove("invalid");
  }
}


//---------------password-----------------------------
// When the user clicks on the password field, show the message_password box
myInput_password.onfocus = function() {
  document.getElementById("message_password").style.display = "block";
}

// When the user clicks outside of the password field, hide the message_password box
myInput_password.onblur = function() {
  document.getElementById("message_password").style.display = "none";
}

// When the user starts to type something inside the password field
myInput_password.onkeyup = function() {
  // Validate starting letters
  var starting = /^[a-zA-Z]/g;
  if(myInput_password.value.match(starting)) {
    start.classList.remove("invalid");
    start.classList.add("valid");
  } else {
    start.classList.remove("valid");
    start.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput_password.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if(myInput_password.value.length >= 8 && myInput_password.value.length <= 16) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }

  // Validate special character
  var special = /[*!]/g;
  if(myInput_password.value.match(special)) {
    spechar.classList.remove("invalid");
    spechar.classList.add("valid");
  } else {
    spechar.classList.remove("valid");
    spechar.classList.add("invalid");
  }
}
