<?php
session_start();
include "../Classes/Authentication.php";
$auth = new Authentication();
if(isset($_POST['username']) && isset($_POST['password'])) {
    $res = $auth->signin($_POST['username'], $_POST['password']);
    $user = $res->fetch();
    if($res->rowCount() > 0){
        if($user['role'] == "ROLE_CLIENT"){
            $_SESSION['username'] = $user['email'];
            $_SESSION['password'] = $user['password'];
            //Client
            header("location: home.php");
        }else{
            //Agent
            header("location: index.php");
        }
    }else {
        echo "Failure: Invalid password or username";
    }

}
?>
<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="wrapper">
    <h2>LOGIN</h2>
    <form action="" method="post">
        <div class="input-box">
            <input type="text" name="username" placeholder="Enter your username" required>
        </div>
        <div class="input-box">
            <input type="password" name="password" placeholder="Enter your password" required>
        </div>

        <div class="input-box button">
            <input type="Submit" name="login" value="Signin">
        </div>
    </form>
</div>

</body>
</html>
