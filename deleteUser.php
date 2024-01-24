<?php
require_once 'UserMapper.php';

session_start();
if((isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && $_SESSION['role'] == 0) || !(isset($_SESSION['loggedin']))){
    header("location: home.php");
    exit;
}

if(isset($_GET['id'])){
    $userId = $_GET['id'];

    $user = new UserMapper();
    $user->deleteUser($userId);
}
?>
