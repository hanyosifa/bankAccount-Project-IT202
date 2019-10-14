<?php


function checkPasswords(){
	if(isset($_POST['password']) && isset($_POST['confirmpassword'])){
		if($_POST['password'] == $_POST['confirmpassword']){
			echo "<br>Passwords Matched!<br>";

		}
		else{
			echo "<br>Passwords didn't match!<br>";
		}
	}
}

?>
<html>
<head>
<script>
function validate(){
    var name = document.forms[myForm][username].value;
 	  var password = document.forms[myForm][password].value;
	  var confp = document.forms[myForm][confirmpassword].value;
    let succeeded = true;
    if(name == ""){
        alert("Please enter a username");
        succeeded = false;  
   }
   
    var em = document.forms[myForm][email].value;
    var confem = document.forms[myForm][confirmemail].value;
    var format = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
   
    if((format.test(em) == true) && (em == confem)){
		    succeeded = true;   
    
	}
  
    else{
        alert("Please enter a valid email address");
		    succeeded = false;
	}
 
 
    if((password == confp) && (password == "" || confp == "")){
        alert("Passwords don't match or empty")
        succeeded = false;
             
  }

    else{
        succeeded = true;
		    }
    return succeeded;

}

</script>
</head>

<body>
<div style="margin-left: 50%; margin-right:50%;">
<form name="myForm" method = "POST" action="#" onsubmit="return validate();">

<input name="username" type="text" placeholder="Enter username"/>
<input name="email" type="email" placeholder="name@sample.com"/>
<input name="emailconfirm" type="email" placeholder="confirm email"/>
<input name="password" type="password" placeholder="password"/>
<input name="passwordconfirm" type="password" placeholder="Confirm password"/>


<input type="submit" value="Submit"/>


</form>
</body>
</html>
