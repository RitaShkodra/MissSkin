<?php
require_once 'UserMapper.php';
require_once 'Veprimet.php';

session_start();
if((isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && $_SESSION['role'] == 0) || !(isset($_SESSION['loggedin']))){
    header("location: home.php");
    exit;
}

if(isset($_GET['id'])){
    $userId = $_GET['id'];

    $user = new UserMapper();
    $deletedUser = $user->getUserByUsername($_POST['user']);
    
    $veprimi = 'Delete User';
    $userId = $_SESSION['user_id']; 
    $koha = date('Y-m-d H:i:s');
    $detajet =  ' Emri i User: ' . $deletedUser['user']; 


    $db = new Database();
    $veprim = new Veprimet($db->pdo);
    $veprim->logAction($veprimi, $userId, $koha, $detajet);
    $user->deleteUser($userId);
}
?>
