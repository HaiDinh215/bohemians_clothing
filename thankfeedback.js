<script language="javascript">
function validate(){
    var username = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var area = document.getElementById("area").value;
    var message1 =document.getElementById("message1");
    var message2 =document.getElementById("message2");
    var message3 =document.getElementById("message3");
    var message4 =document.getElementById("message4");
    if(name == ""){
        message1.innerHTML =("Missing Name");
        message1.style.color = "red";
        return false;
    }
    else if(email == ""){
        message2.innerHTML =("Missing password");
        message2.style.color = "red";
        return false;
    }
    else if (area == ""){
        message3.innerHTML =("Missing feedback");
        message3.style.color = "red";
        return false;
    }
    else{
        return true;
    }
}