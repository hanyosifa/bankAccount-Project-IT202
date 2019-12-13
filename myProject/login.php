<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['username']) && isset($_POST['password'])){
      require('config.php');
      $conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
      $db = new PDO($conn_string, $username, $password);
      $user = $_POST['username'];
      $userpwd = $_POST['password'];
      
     	$stmt= $db->prepare("select * FROM `TestUsers` where username = :username");
      $stmt->execute(array(":username"=>$user));
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      //echo var_export($result, true);
      if(password_verify($userpwd, $result['pin'])){
            echo "Welcome, " . $result['username'];
            $user = array("id"=> $result['id'], "name"=> $result['username']);
            $_SESSION['user'] = $user;
            echo var_export($user, true);
            echo var_export($_SESSION, true);          
            header("Location: landingPage.php");

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

