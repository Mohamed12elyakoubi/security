<?php
require 'user.php';


if ($user->isLoggedIn()) {
    $user->logout();

    
    header("Location: login.php");
    exit();
} else {
    
    header("Location: login.php");
    exit();
}
?>
