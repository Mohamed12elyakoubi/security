<?php

require 'user.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // prevent xss
    $email = $_POST['email'];
    $pass = $_POST['password'];

    try {
        $lastId = $user->add($email, $pass);
        header("location:user-view.php?process=$lastId");
    } catch (\Exception $e) {
        echo "Fout bij het toevoegen" . $e->getMessage();
        die();
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
    <h2>Register</h2>
    <form method="POST">
        Email: <input type="text" name="email" placeholder="email" required><br>
        Wachtwoord: <input type="password" name="password" placeholder="password" required><br>
        <input type="submit">
    </form>
</body>
</html>