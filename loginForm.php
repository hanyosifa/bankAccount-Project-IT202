<?php

if(isset($_POST['username']) && isset($_POST['password'])){
      require('config.php');
      $conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
      $db = new PDO($conn_string, $username, $password);
      $user = $_POST['username'];
      $userpwd = $_POST['password'];
      
     	$stmt= $db->prepare("select * FROM `TestUsers` where username = :username AND pin = :password");
      $stmt->execute(array(":username"=>$user, ":password"=>$userpwd));
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      echo var_export($result, true);
      if($result['pin'] == $userpwd){
            echo $result['username'] . ", ";
            echo "Login Credentials verified";

      }else{
            echo "Invalid Login Credentials";
            	
          }
      }
?>

<!DOCTYPE html >

<html>
<head>

</head>
<body>
<form method="POST" action="" >
username:<input type="text" name="username"/>
password:<input type="password" name="password"/>
<input type="submit" value="login"/>
</form>
</body>
</html>

