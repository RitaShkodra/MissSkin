<?php 
    require_once 'UserMapper.php';

    session_start();
    if((isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && $_SESSION['role'] == 1) || !(isset($_SESSION['loggedin']))){
        header("location: home.php");
        exit;
    }

    if(isset($_GET['id'])){
        $adminId = $_GET['id'];
    
        $admin = new UserMapper();
        $admin->deleteUser($adminId);
    }
?>