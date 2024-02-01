<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');


// Include necessary files
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

    // function emptyFields()
    // {
    //     return empty($this->username) || empty($this->password);
    // }

    // function usernameExists()
    // {
    //     $mapper = new UserMapper();
    //     $user = $mapper->getUserByUsername($this->username);
    //     return ($user !== null && count($user) > 0);
    // }

    // function passwordVerify()
    // {
    //     $mapper = new UserMapper();
    //     $user = $mapper->getUserByUsername($this->username);

    //     // Check if the user and hashed password are valid
    //     if ($user && password_verify($this->password, $user['userpassword'])) {
    //         // Set the role in the session
    //         $_SESSION['role'] = $user['role'];

    //         // Create an instance based on the user's role
    //         if ($user['role'] == 1) {
    //             $obj = new Admin($user['userID'], $user['username'], $user['userpassword'], $user['role']);
    //         } else {
    //             $obj = new SimpleUser($user['userID'], $user['username'], $user['userpassword'], $user['role']);
    //         }

    //         // Set session for the user
    //         $obj->setSession();

    //         $_SESSION['loggedin'] = true;
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
    public function loginUser()
    {
        $user = $this->userMapper->getUserByUsername($this->username);
    
        // Add debug statements
        // var_dump($user);
        // echo "Entered Password: " . $this->password;
        // echo "Hashed Password: " . $user['userpassword'];
    
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
                // echo "Incorrect password";
            }
        } else {
            echo "User not found";
        }
    
        return false;
    }

    public function logoutUser()
    {
        session_start();
        session_unset();
        session_destroy();
    }
}



            