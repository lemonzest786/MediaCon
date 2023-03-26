<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$title = 'Login';
require 'shared/header.php';
?>
<main>
    <h1>Login</h1>
    <h5>Please enter your credentials.</h5>
    <form method="post" action="validate.php">
        <fieldset>
            <label for="username">Username:</label>
            <input name="username" id="username" required type="email" placeholder="email@email.com" />
        </fieldset>
        <fieldset>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required />
        </fieldset>
        <button class="btnOffset">Login</button>
    </form>
</main>
<?php require('shared/footer.php');
?>
    
</body>
</html>