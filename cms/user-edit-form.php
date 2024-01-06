<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Systeem</title>
</head>
<body>
  
<form action="user-edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
    <input type="text" name="email" placeholder="New Username">
    <input type="text" name="password" placeholder="New Password">
    <input type="submit">
</form>
</body>
</html>