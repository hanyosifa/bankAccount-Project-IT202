<?php
session_start();
?>
<html>
<head>

<style>
input { border: 1px solid black; }
.error {border: 1px solid red;}
.noerror {border: 1px solid black;}

</style>

</head>

<body>
 Hello, <?php echo $_SESSION['user']['name'];?>
 <br></br> 
<!-- Add dropdown element (something specific to your project) -->
	      <a href="https://web.njit.edu/~mb784/IT-202/myProject/transaction.php?type=deposit">Deposit</a> |
        <a href="https://web.njit.edu/~mb784/IT-202/myProject/transaction.php?type=withdraw">Withdraw</a> |
        <a href="https://web.njit.edu/~mb784/IT-202/myProject/transaction.php?type=transfer">Transfer</a> |
        <a href="About.php">Statements</a> &nbsp |
        <a href="contact.php">Open New Account</a>

</body>

</html>

<?php checkPasswords();?>

<?php

if(isset($_POST)){

	echo "<br><pre>" . var_export($_POST, true) . "</pre><br>";

}

?>