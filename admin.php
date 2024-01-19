<?php
require_once 'personClass.php';


class Admin extends Person
{
    public function __construct($fullname,$email, $username,  $password, $role)
    {
        parent::__construct($fullname,$email, $username,  $password, $role); 
    }


    public function setSession()
    {

        $_SESSION["role"] = 1;
        $_SESSION['roleName'] = "Administrator";
    }

    public function setCookie()
    {
        setcookie("username", $this->getUsername(), time() + 2 * 24 * 60 * 60);
    }


    public function getFullname()
    {
        return $this->fullname;
    }
    public function setFullname($fullname)
{
    $this->username = $fullname;
}

    public function getUsername()
    {
        return $this->username;
    }
    public function setUsername($username)
{
    $this->username = $username;
}
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
{
    $this->password = $password;
}
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
{
    $this->email = $email;
}
    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
{
    $this->role = $role;
}
}
