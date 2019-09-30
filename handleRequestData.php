<?php
      echo "<pre>" . var_dump($_GET, true) . "</pre>";
      if(isset($_GET['name'])){
              echo "<br>Hello, " . $_GET['name'] . "<br>";
      }
      if(isset($_GET['number'])){
	            $number = $_GET['number'];
             	echo "<br>" . $number . " should be a number...";
	            echo "<br>but it might not be<br>";

              
      }
      if(isset($_GET['number1'])){
	            $number1 = $_GET['number1'];         
             	echo "<br>" . $number1 . " should be a numbers...";
	            echo "<br>but it might not be<br>";
      }
               
             	echo "<br>" . $_GET['name'] . $number . $number1 . ". this is a concatenation of the prev parameter's values...";
	            echo "<br>but it might a mix of characters and nums<br>";
         
         // Question 3 
              echo "<br>3) Try passing two parameters with the same name but different values, the new value updates the exiting value of the same name ";
              echo "<br>";
         // question 4
              echo "<br>4) Try passing a parameter with a value containing various special characters, the GET function ignores the added 
              special characters";
               
     
      // TODO
      // handle addition of 2 or more parameters with proper number parseing
      // concatenate 2 or more parameter values and echo them
      // try passing multiple same_named parameters with different values
      // try passing the parameter value wth special characters
      // web.njit.edu/~ucid/IT202/handleRequestData.php?parameter1=a&p2=b
?>
      