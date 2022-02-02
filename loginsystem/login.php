<?php
    $login = false;
    $showError = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include 'partials/dbconnect.php';
        $username = $_POST["username"];
        $password = $_POST["password"];
        // $sql = "SELECT * from user where username = '$username' AND password = '$password'";
        $sql = "SELECT * from user where username = '$username'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            while($row = mysqli_fetch_assoc($result)){
                if (password_verify($password, $row['password'])) {
                    $login = true;
                    //session start hunxa aaba-->session is similar to cookies but it store in server site and it is more private than cookiees
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username;
                    header("location: welcome.php"); //yesle chai login vaye paxi welcome page ma pathaedinxa
                }
                else{
                    $showError = true;
                }
            }
        }
        else{
            $showError = true;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loginin</title>
</head>
<body>
    <?php require 'partials/navbar.php' ?>
    <?php
    if ($login) {
        echo "SUCESS! login sucessfuly";
    }
    if ($showError) {
        echo "Invalid CREdentials";
    }
    ?>

    <script>
        function func(){
        let username = document.register.username.value;
        let password = document.register.password.value;
            if (username == "") {
                alert("Enter your user name");
                return false;
            }
            if (password == "") {
                alert("Enter your password");
                return false;
            }
            else{
                return ture;
            }
        }
    </script>
    <div id= "myform">
        <form name= "register" action="/LOGINSYSTEM/login.php" onsubmit = "return func()" method= 'post'>
            <h1>LOG IN</h1>
            <div>
                <label for="username" >Username:</label> <input type="text" name= "username" id= "username">
            </div>
            <br>
            <div>
                <label for="password">Password: </label> <input type="password" name= "password" id= "password">
            </div>
            <small>Make sure you have type correct password</small>
            <div>
            <button type = submit>Login</button>
            <button type = reset>Reset</button>
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
            margin-left: 100px;
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