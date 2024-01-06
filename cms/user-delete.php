<?php

require 'user.php';

try {
    if (isset($_GET['id'])) {
        $user->delete($_GET['id']);
        header("location:user-view.php?process=delete");
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>