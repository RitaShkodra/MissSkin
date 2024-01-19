<?php
include_once 'simpleUser.php';
include_once 'admin.php';
require_once 'userMapper.php';


class RegisterLogic
{
    private $fullname = "";
    private $username = "";
    private $email="";
    private $password = "";

    public function __construct($formData)
    {

        $this->fullname = $formData['register-fullname'];
        $this->username = $formData['register-username'];
        $this->email = $formData['register-emailaddress'];
        $this->password = $formData['register-password'];
    }

    public function getFullname()
    {
        return $this->fullname;
    }


    public function getEmail()
    {
        return $this->email;
    }

    public function getUsername()
    {
        return $this->username;
    }


    public function emptyFields(){
        if(empty($this->fullname)||  empty($this->username)|| empty($this->email) || empty($this->password)){
            return true;
        }
        return false;
    }

    public function validateEmail(){
       $emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        if(preg_match($emailRegex, $this->email)){
            return true;
        } else {
            return false;
        }
    }
    public function validateUsername(){
        $usernameRegex = /^[a-zA-Z]+$/;
        
        if(preg_match($usernameRegex, $this->username)){
            return true;
        } else {
            return false;
        }
    }
    public function validatePassword(){
        $passwordRegex = "/^.{8,}$/";
        
        if(preg_match($passwordRegex, $this->password)){
            return true;
        } else {
            return false;
        }
    }
    public function emailExists()
    {
            $mapper = new UserMapper();
            if ($mapper->emailExists($this->email)) {
                return true;
            } else {
                return false;
            }
    }

    public function usernameExists()
    {
            $mapper = new UserMapper();
            if ($mapper->usernameExists($this->username)) {
                return true;
            } else {
                return false;
            }
    }


    public function insertData()
{
    $mapper = new UserMapper();
    $numUsers = $mapper->countUsers();
    if ($numUsers < 2) {
        $role = 1;
    } else {
        $role = 0;
    }

    $user = new SimpleUser($this->fullname, $this->username, $this->email, $this->password, $role);

    $mapper->insertUser($user);
    header("Location:../home.php");
}


    public function insertDataAdmin(){
        $admin = new Admin($this->fullname, $this->username, $this->email, $this->password, 1);

        $mapper = new UserMapper();
        $mapper->insertUser($admin);
        header("Location:../dashboard.php");
    }
    
}