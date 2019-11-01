<?php
require('config.php');
$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
$db = new PDO($conn_string, $username, $password);
if(isset($_POST['username']) && isset($_POST['password'])){

      $user = $_POST['username'];
      $userpwd = $_POST['password'];
      

     	$select_query = "select * FROM `TestUsers` where username = '$user' and pin = '$userpwd'";
      $result = mysqli_query($db,$sql_query);
      $row = mysqli_fetch_array($result);

      if($row == 1){
            echo "<script type='text/javascript'>alert('Login Credentials verified')</script>";

      }else{
            echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";
            	
          }

      }

?>

<!DOCTYPE html >

<html>
<head>

</head>
<body>
<form method="POST"  action= "">
username:<input type="text" name="username"/>
password:<input type="password" name="password"/>
<input type="submit" value="login"/>
</form>
</body>
</html>

