<?php
#turn error reporting on
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

require('config.php');
echo $host;
$connection_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";

try{
foreach(glob("sql/*.sql") as $filename){

		//echo $filename;

		$sql[$filename] = file_get_contents($filename);

		//echo $sql[$filename];

	}

	ksort($sql);



	//connect to DB

	$db = new PDO($connection_string, $username, $password);

	//$db->setAttribute(PDO::ATTR_ERRMODE);

	foreach($sql as $key => $value){

		echo "<br>Running: " . $key;

		$stmt = $db->prepare($value);

		$result = $stmt->execute();

		$error = $stmt->errorInfo();

		if($error && $error[0] !== '00000'){

			echo "<br>Error:<pre>" . var_export($error,true) . "</pre><br>";

		}

		echo "<br>$key result: " . ($result>0?"Success":"Fail") . "<br>";

	}
/*
//connect to DB
$db = new PDO($connection_string, $username, $password);
echo "should have connected";
//create table 
	$query = "create table if not exists `TestUsers`(

		`id` int auto_increment not null,

		`username` varchar(30) not null unique,

		`pin` int default 0,

		PRIMARY KEY (`id`)

		) CHARACTER SET utf8 COLLATE utf8_general_ci";
   # error check
   $db->setAttribute(PDO::ATTR_ERRMODE,
PDO::ERRMODE_WARNING);

	$stmt = $db->prepare($query);
 #print the error
 print_r($stmt->errorInfo());
	$r = $stmt->execute();

	echo "<br>" . ($r>0?"Created table or already exists":"Failed to create table") . "<br>";

  $insert_query = "INSERT INTO `TestUsers`(`username`, `pin`) VALUES ('ali', 1826)";
  $stmt = $db->prepare($insert_query);
  $r = $stmt->execute();
  $select_query = "select * from `TestUsers` where username = 'ali'";
  $stmt = $db->prepare($select_query);
  $r = $stmt->execute();
  $result = $stmt->fetch();
echo "<br><pre>" . var_export($result, true) . "</pre><br>"; 
	unset($r);
 */
}

catch(Exception $e){
echo $e->getMessage();
exit("It didn't work");
}
?>
