<?php

require 'user.php';

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user->edit($_POST['email'], $_POST['password'], $_GET['id']);

        header("location:user-view.php?process=update");
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>

