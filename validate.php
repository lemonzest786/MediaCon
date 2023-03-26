<?php
//capture from inputs from post array
$username = $_POST['username'];
$password = $_POST['password'];

//connect
require('shared/db.php');

//check if suername exists
$sql = "SELECT * FROM users WHERE username = :username";
$cmd = $db->prepare($sql);
$cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
$cmd->execute();
$user = $cmd->fetch();

if(empty($user)){
    header('location:login.php?valid=false');
    exit();
}
else{
//check if hashed password exists
if(password_verify($password, $user['password'])== false){
    header('location:login.php?valid=false');
    exit();
}
else{
    session_start();
    // if both credentials found, stores the user identity in the $_SESSION object as a var
    $_SESSION ['user'] = $username;
    //redirect to posts feed
    header('location:posts.php');
    $db = null;
    
}
}
?>