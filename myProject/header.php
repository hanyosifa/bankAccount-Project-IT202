<?php 
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<script
   src="https://code.jquery.com/jquery-3.4.1.js"
   integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
   crossorigin="anonymous">
</script>

<script>
$(document).ready(function(){
      var nav = ["Home", "About Us", "Logout"];
      let n = $("<nav>");
      $("body").append(n);
      nav.foreach(function(item, index){
           let ele = $("<a>");
           ele.attr("href", "?page="+item);
           ele.text(item);
           n.append($("<span class='nav'>").append(ele[0]));

      });
});
</script>
 