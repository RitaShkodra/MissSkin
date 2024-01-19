<?php
include_once 'person.php';

class SimpleUser extends Person
{
    
    public function __construct($id,$fullname,$email, $username,  $password, $role)
    {
        parent::__construct($id,$fullname,$email, $username, $password, $role);
    }

    public function setSession()
    {
        $_SESSION["role"] = "0";
        $_SESSION['roleName'] = "SimpleUser";
    }

    public function setCookie()
    {
        setcookie("username", $this->getUsername(), time() + 2 * 24 * 60 * 60);
    }

    public function getId()
    {
        return $this->id;
    }
    public function getFullname()
    {
        return $this->fullname;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getRole()
    {
        return $this->role;
    }
}