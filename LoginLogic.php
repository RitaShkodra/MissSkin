<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');


include_once 'admin.php';
include_once 'simpleUser.php';
require_once 'UserMapper.php';

class LoginLogic
{
    private $username = "";
    private $password = "";
    private $userMapper;
  

    public function __construct($formData)
    {
        $this->username = isset($formData['username']) ? $formData['username'] : "";
        $this->password = isset($formData['password']) ? $formData['password'] : "";
        $this->userMapper = new UserMapper();
       
    }

    public function getUsername()
    {
        return $this->username;
    }

    
    public function loginUser()
    {
        $user = $this->userMapper->getUserByUsername($this->username);
    
       
        if (is_array($user) && isset($user['userpassword'])) {
            if (password_verify($this->password, $user['userpassword'])) {
                session_start();
                $_SESSION['user_id'] = $user['userID'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['loggedin'] = true;
    
                if (isset($user['role'])) {
                    $_SESSION['role'] = $user['role'];
                }
    
                header("Location: home.php");
                exit;
            } else {
            }
        } else {
            echo "User not found";
        }
    
        return false;
    }

   
}



            