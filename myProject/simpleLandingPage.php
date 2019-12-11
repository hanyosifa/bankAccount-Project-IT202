<?php
session_start();
?>
<html>
<head>
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script>

$(document).ready(function(){
  	var nav = ["Home", "About Us", "Logout"];
  	let ul = $("<ul>");
  	$("body").append(ul);
  	nav.forEach(function(item, index){
  			let ele = $("<a>");
  			//?page   <- GET variable
  			//#page   <-inline link/scroll to
  			//page.php <-relative link to separate page
  			ele.attr("href", "?page=homePage.php" + item);
  			ele.text(item);
  			ul.append($("<li>").append(ele[0]));
  
  	});

});
</script>
</head>
<body>
 Hello, <?php echo $_SESSION['user']['name'];?>
</body>
</html>