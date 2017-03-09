<?php

session_start();

if( isset($_SESSION['user_id']) ){
    header("Location: /");
}

require 'database.php';

if(!empty($_POST['email']) && !empty($_POST['password'])):

    $records = $conn->prepare('SELECT id,email,password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email'];
    $records->execute();
    $results + $records->fetch(PDO::FETCH_ASSOC);
    
    $message = '';
    
    if($results) > 0 && password_verify($_POST['password'], $results['password']) ){
    
    $_SESSION['user_id'] = $results['id'];
    header("Location: /");
    
    } else {
        $message = 'Sorry, those credentials do not match';
endif;

<?
<!DOCTYPE html>
<html lang="en">
<head>
<title>Login below</title>
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>

<header>
<a href="/">Your App Name</a>
</header>
<?php if(!empty($message)): ?>
<p><?= $message ?></p>
<?php endif; ?>


<h1>Login</h1> 
<span>or <a href="register.php">Register here</span>

<form action="login.php" method="POST">
    <input type="text" placeholder="enter your email" name="email">
    <input type="password" placeholder="enter password" name="password">
    <input type="submit">
    
</form>






</body>
</html>
