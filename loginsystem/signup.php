<?php
$showAlert = false;
$showError = false;
$showError2 = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    // Check whether this username exists
    $existSql = "SELECT * FROM `user` WHERE username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        // $exists = true;
        $showError2 = true;
    }
    else{
         // $exists = false; 
        if(($password == $cpassword)){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `user` ( `username`, `password`, `dt`) VALUES ('$username', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result){
                 $showAlert = true;
            }
        }
        else{
            $showError = true;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>
<body>
    <?php require 'partials/navbar.php' ?>
    <?php
    if ($showAlert) {
        echo "Form have submitted succesfully so go to the login page for login";
    }
    if ($showError) {
        echo "password donot match";
    }
    if ($showError2) {
        echo "username is already taken";
    }
    ?>

    <script>
        function func(){
            let username = document.signup.username.value;
            let password = document.signup.password.value;
            let cpassword = document.signup.cpassword.value;
            if (username == "") {
                alert("please enter username");  
                return false;
            }
            if (password == "") {
                alert("please enter password");  
                return false;
            }
            if (cpassword == "") {
                alert("please enter your confirm password");  
                return false;
            }
            else{
                return ture;
            }
        }
    </script>
   
    <div id= "myform">
        <form name="signup" action="/LOGINSYSTEM/signup.php" onsubmit = "return func()" method="post">
            <h1>SIGN UP</h1>
            <div>
                <label for="username" >Username:</label> <input type="text" name= "username" id= "username">
            </div>
            <br>
            <div>
                <label for="password">Password: </label> <input type="password" name= "password" id= "password">
            </div>
            <br>
            <div>
                <label for="cpassword">Confirm Password: </label> <input type="password" name= "cpassword" id= "cpassword">
            </div>
            <small>Make sure you have type same password</small>
            <div>
            <button type = "submit">SignUp</button>
            <button type = "reset">Reset</button>
            </div>

        </form>
    </div>

    <style>
        form{
            display: inline-block;
            text-align: left;
            margin-left:30%;
        }
        label{
            font-size: 22px;

        }
        small{
            font-size:10px;
            margin-left: 180px;
            color: red;
        }
        button{
            background: darkgreen;
            cursor: pointer;
            height:30px;
            width: 80px;
            margin: 7px;
            border-radius: 14px;
        }
        button:hover{
            background: white;
        }
    </style>
</body>
</html>