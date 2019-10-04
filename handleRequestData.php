<?php


      echo "<pre>" . var_export($_GET, true) . "</pre>";
 	          if(isset($_GET['name'])){
               echo "<br>Hello, " . $_GET['name'] . "<br>";
	}
 
     if(isset($_GET['number'])){
	          	$number = $_GET['number'];
	           	echo "<br>" . $number . " should be a number...";
		          echo "<br>but it might not be<br>";
	   }            
  
echo "<br>1- Adding two or more query parameters with numerical values.<br>";
     	if(isset($_GET['num1'])){
             $num1 = $_GET['num1'];
	}
	    if(isset($_GET['num2'])){
 	        	$num2 = $_GET['num2'];
	}
    	if(isset($num1) && isset($num2)){
		        if(is_numeric($num1) && is_numeric($num2)){
			          $num1 = (int)$num1;
		          	$num2 = (int)$num2;
			          echo "<br>Sum: " . ($num1 + $num2);
	        	}
		        else{
			         echo "<br> Values aren't numbers";
          }
 echo "<br><br>2- Concatenate two or more parameter's values and echo them";
		       echo "<br><br>";
		       echo "Concat: " . ($num1 . $num2);
  	}
	    if(isset($_GET['parameter'])){
	      	echo "<div> " . $_GET['parameter'] . "</div>";
	     }
echo "<br><br>3- Try passing two parameters with the same name but different values, we note that the previous paramer value is updated the new one.";
      $test = 10;
      echo "<br>";
      echo $test1;
      $test = 2;
      echo "<br>" . $test;

echo "<br><br>4- Try passing a parameter with a value containing various special characters, we note that add <br>function won't be executed
 since we have two deffirent data type values. Therefor, the else statment will be printed."; 
 
            
?>
      