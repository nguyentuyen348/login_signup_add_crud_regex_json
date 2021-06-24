<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    function backHome(){
        location.reload();
    }
    </script>
</head>
<body>
<div style="background: #7878d7"><span onclick="backHome()" >HOME</span> </div>


<div class="container">

    <form method="post">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="email" placeholder="Enter username" name="username">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
        </div>
        <button type="submit" class="btn btn-primary" name="login">Login</button>
        <button type="submit" class="btn btn-primary" name="signup">Signup</button>
    </form>
</div>

</body>
</html>
<?php
include 'Data.php';
include 'User.php';

if (isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    Data::login($username, $password);

}
else if(isset($_POST['signup'])){
    header('location: adduser.php');
}
?>