<?php
require 'user.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = htmlspecialchars($_POST['email']);
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
