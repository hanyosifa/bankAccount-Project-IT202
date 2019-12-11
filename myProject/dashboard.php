<html>
<head>
<style>
.nav{padding:1%;}
</style>
</head>

<body>
<?php
include_once("header.php");
include_once("functions.php");
?>

      <ul> 
	      <br><li> <a href="logout.php">Logout-><?php echo $_SESSION['user']['name'];?></a> </li>     
        <br><li> <a href="homePage.php">Transactions</a> </li>
        <br><li> <a href="newacc.php">Create Account </a> </li>
      </ul>
</body>

</html>