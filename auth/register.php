<?php

session_start();

if( isset($_SESSION['user_id']) ){
    header("Location: /");
}


require 'database.php';

$message = '';

if(!empty($_POST['email']) && !empty($_POST['password'])):

    //enter the new user in database
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':password', password_hash$_POST['password'] PASSWORD_BCRYPT);
    if( $stmt->execute() ):
        $message = 'Successfuly created an account';
    else:
        $message = 'Sorry, there must have been an issue creating an account';
    endif;
endif;


 
<?


<!DOCTYPE html>
<html lang="en">
<head>
<title>Register Below</title>
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>

<header>
<a href="/">Your App Name</a>
</header>




<h1>Register</h1>
<span>or <a href="login.php">Login here</span>

<form action="register.php" method="POST">
    <input type="text" placeholder="enter your email" name="email">
    <input type="password" placeholder="enter password" name="password">
    <input type="password" placeholder="confirm password" name=" confirm password">
    <input type="submit">






</body>
</html>
