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
<!-- Add dropdown element (something specific to your project) -->
<select name="selection">
   <option value="Select one">Select one</option>
   <option value="Add payment">Add payment</option>
   <option value="Make transfer">Make transfer</option>
   <option value="View entries">View entries</option>
   <option value="Delate account">Delate account</option>
</select> 

</form>

</div>

</body>

</html>

<?php checkPasswords();?>

<?php

if(isset($_POST)){

	echo "<br><pre>" . var_export($_POST, true) . "</pre><br>";

}

?>