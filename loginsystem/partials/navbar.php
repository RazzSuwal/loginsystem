<?php
 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggdin = true;
}
else{
    $loggdin = false;
 }
echo'
<nav>
<div id = navbar>
    <li>LOGIN_SYSTEM</li>
    <a href="/LOGINSYSTEM/welcome.php">Home</a>';
    if(!$loggdin){
    echo '
    <a href="/LOGINSYSTEM/login.php">LogIn</a>
    <a href="/LOGINSYSTEM/signup.php">SignUp</a>';
    }
    
    if ($loggdin) {
        echo '<a href="/LOGINSYSTEM/logout.php">LogOut</a>';
    }
echo '
    </div>
    </nav>
    <style>
        #navbar{
            display: flex;
            flex-direction: row;
            background-color: black;
            border-radius: 15px;
            height:65px;
        }

        li{
            margin: 13px;
            padding: 10px;
            background-color: darkgreen;
            border: 2px solid black;
            border-radius: 6px;
            list-style: none;
        }

        a{
            margin: 20px;
            text-decoration: none;
            font-size: 24px;
            color: darkgreen;
        }
        
        a:hover{
            text-decoration: underline;
            color: white;
        }
        body{
            background-color : grey;
        }
    </style>
    ';
?>