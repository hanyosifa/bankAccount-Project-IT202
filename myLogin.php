<?php
//helper
function getName(){
      if(isset($_GET['name'])){
            echo "<p>Hello, " . $_GET['name'] . "</p>";
       }
}
if(isset($_POST['submit'])){
     $name = $_POST['username'];
     $pass = $_POST['password'];
     if($name == "John" && $pass == "4321"){
         echo ("You have successfully loged in");
     }
     else{
         echo ("Error log in !");
     }

}
?>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php getName();?>
<!--This a comment-->
<form action="" method="post">
 <table align="center">
<tr>
<td>username</td>
<td><input name="userame" type="text" placeholder="Enter Username"/> </td>
</tr>

<tr>
<td>password</td>
<td><input type="password" placeholder="Enter Password"/></td>
</tr>

<tr>
<td>Password</td>
<td><input type="password" placeholder="Confirm Password"/></td>
</tr>
<tr>
<td><td>
<input type="submit" name="submit" value="submit"/>
</tr>
</form>
</body>
</html>
