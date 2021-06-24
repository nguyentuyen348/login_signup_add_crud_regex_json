<?php
include 'Data.php';
include 'User.php';
include "Validate.php";
session_start();

if($_SERVER['REQUEST_METHOD']=='POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $importPassword = $_POST['importPassword'];


    if (empty($username) || empty($password) || empty($email)) {
        echo '<p id="message">Please enter full!';
        return header('location:adduser.php');

    }elseif(!$password==$importPassword){
        echo '<p id="message">Please enter password!';
        return header('location:adduser.php');
    }

    if (!Validate::checkUsername($username) ||
        !Validate::checkEmail($email) ||
        !Validate::checkPassword($password)) {
        return header('location:adduser.php');
    }

    if (Validate::checkUsername($username) &&
        Validate::checkEmail($email) &&
        Validate::checkPassword($password)) {
        $user = new User($username, $email, $password);
        Data::addUser($user);
        echo 'signup succeed';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        #home{
            color: black;
        }
    </style>
</head>
<body>

<div style="background: #7878d7;"><span><a id="home" href="http://localhost/demoJson/index.php">HOME</a></span> </div>

<div class="container">

    <form action="http://localhost/demoJson/adduser.php" method="post">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="" placeholder="Enter username" name="username">
            <p class="help-block text-danger"><?php if (isset($_SESSION['username'])){ echo $_SESSION['username']; session_destroy();} ?></p>
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="text" class="form-control" id="" placeholder="Enter email" name="email">
            <p class="help-block text-danger"><?php if (isset($_SESSION['email'])){ echo $_SESSION['email']; session_destroy();} ?></p>
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
            <p class="help-block text-danger"><?php if (isset($_SESSION['password'])){ echo $_SESSION['password']; session_destroy();} ?></p>
        </div>
        <div class="form-group">
            <label for="pwd">Import Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="importPassword">
        </div>
        <button type="submit" class="btn btn-primary" name="signup">Signup</button>

    </form>
</div>

</body>
</html>
