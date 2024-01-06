<?php

require 'db.php';

class User 
{
    public $dbh;
    public $table = 'users';

    public function __construct(DB $dbh)
    {
        $this->dbh = $dbh;
        session_start();
    }

    public function hash($password): string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
    

    public function all() : array 
    {
        return $this->dbh->run("SELECT * from $this->table")->fetchAll();
    }

    public function first($id) : array 
    {
        return $this->dbh->run("SELECT * from $this->table where id = $id")->fetch();
    }

    public function add($email, $password) : int
    {
        $hash = $this->hash($password);
        $this->dbh->run("INSERT INTO $this->table (email, password) VALUES ('$email', '$hash')");
        return $this->dbh->lastId();
    }

    public function edit($email, $password, $id) : PDOStatement 
    {
        $hash = $this->hash($password);
        return $this->dbh->run("UPDATE $this->table SET email ='$email', password = '$hash' WHERE id = $id");
    }

    public function delete($id) : PDOStatement
    {
        return $this->dbh->run("DELETE FROM $this->table where id = $id");
    }

public function login($email, $password) : bool 
{
    $stmt = $this->dbh->run("SELECT * FROM $this->table WHERE email = :email");
    
    $stmt->execute([':email' => $email]);

    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['email'];
        return true;
    }
    return false;
}


    

    public function isLoggedIn() : bool
    {
        return isset($_SESSION['user_id']);
    }

    public function logout() : void
    {
        session_destroy();
        session_start();
    }
}

$myDb = new DB('cms_db');
$user = new User($myDb);