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
 Welcome, <?php echo $_SESSION['user']['name'];?>
 <br></br> 
       <a href="logout.php">Logout</a> &nbsp | &nbsp    
       <a href="account.php">Home</a>  &nbsp  | &nbsp
        <a href="About.php">About Us</a> &nbsp |
        <a href="contact.php">Contact</a>
      </ul>
</body>

</html>