
<html>
<head>
    <script>
    function pageLoaded(){
   
    let myDiv = document.createElement('div');
    myDiv.innerText = "New element added";
    document.body.appendChild(myDiv);
    //add it to DOM body
  
    }

    </script> 
</head>
<body> onload = "pageLoad();"
<!--This a comment-->
<p id="myPara">Just showing that we loaded something...</p>
</body>

</html>
