<?php
    session_start();
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
        header("location: login.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
   <?php require 'partials/navbar.php' ?>
   <div id="st">
   <h1>WELCOME -  <?php echo $_SESSION['username'] ?> </h1>
   <p>Welcome to my page. Hope you like my website which I have design with help of html, css, javascript and php. If you wanna log out use this link.<a id= "anker" href="/LOGINSYSTEM/logout.php">LOGOUT</a>  </p>
   </div>

   <style>
       #st{
           background-color: white;
           padding: 5px;
           margin: 15px;
           border-radius: 10px; 
       }
       #anker:hover{
            color:black;
       }
   </style>
   
</body>
</html>