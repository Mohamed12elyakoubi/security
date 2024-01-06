<?php
require 'user.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $pass = $_POST['password'];

    try {
        $userExist = $user->login($email, $pass);

        if ($userExist) {
            header("Location:user-view.php?logged_in");
        } else {
            echo "Incorrect username or password";
        } 
    } catch (\Exception $e) {
        echo 'Error: ' . $e->getMessage();
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Systeem</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST">
        Email: <input type="text" name="email" placeholder="email" required><br>
        Wachtwoord: <input type="password" name="password" placeholder="password" required><br>
        <input type="submit">
    </form>
</body>
</html>
