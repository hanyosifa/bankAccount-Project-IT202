<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>


<!DOCTYPE html >

<html>
<head>
<script>
function validatePass(form){
     var username = form.username.value;
     var password = form.password.value;
     var confirm = form.confirm.value;
     if (username == "" || password == "" || confirm == ""){
                alert("Please complete all of your information.");
                return false;
     }

     let isOK = form.password.value == form.confirm.value;
     if(!isOk){alert("Passwords don't match");}
     return isOk;
}

</script>
</head>
<body>
<form method="POST"  onsubmit="return validatePass(this);">
   <label>Username</label>
      <input type="text" name="username"/>
   <label>Password</label>
      <input type="password" name="password"/>
   <label>Confirm password</label>
    <input type="password" name="confirm"/>
    <input type="submit" value="Register"/>
<p>
  Already have account? <a href="login.php">Sign in</a>
</p>
</form>
</body>
</html>

<?php

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm'])){
     $user = $_POST['username'];
     $pass = $_POST['password'];
     $confirm = $_POST['confirm'];
     if($pass != $confirm){
            echo "Passwords don't match";
            exit();
     } 
 // do validation
    try{
        // hash passwords
        $hash = password_hash($pass, PASSWORD_BCRYPT);
        require("config.php");
        //database connection
        $conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
        $db = new PDO($conn_string, $username, $password);
        $stmt = $db->prepare("INSERT into `TestUsers` (`username`,`pin`) VALUES(:username, :password)");
        $result = $stmt->execute(array(":username"=>$user, ":password"=>$hash));
        print_r($stmt->errorInfo());
        echo var_export($result, true);
    }
    catch(Exception $e){
        echo $e->getMessage(); 
    }    
}

?>


