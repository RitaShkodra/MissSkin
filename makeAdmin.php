<?php 
  require_once 'UserMapper.php';

  session_start();
  if((isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && $_SESSION['role'] == 0) || !(isset($_SESSION['loggedin']))){
      header("location: home.php");
      exit;
  }

  if(isset($_GET['id'])) {
    $userID = $_GET['id'];
    $mapper = new UserMapper();
    $mapper->makeUserAdmin($userID);
    header('Location: dashboard.php');
    exit;
  }
?>