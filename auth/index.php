<?php
session_start();

require 'database.php';

if( isset($_SESSION['user_id']) ){

    $records = $conn->prepare('SELECT id,email,password FROM users WHERE id = :id');
    $records->bidParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch({DO::FETCH_ASSOC);
    
    $user = NULL;
    
    if( count($results) > 0){
        $user = $results;
    }
    

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>welcome to your web app</title>
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>

<header>
<a href="/">Your App Name</a>
</header>

<?php if( !empty($user]) ): ?>

<br />Welcome. <?= $user['email']; ?>
<br><br> You are successfully logged in!
<br><br>
<a href='logout.php">Logout?</a>

<?php else: ?>

<h1>Please Login or Register</h1> 

<a href="login.php">login</a>
<a href="register.php">register</a>

<?php endif; ?>






</body>
</html>
