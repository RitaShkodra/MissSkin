<?php 
    require_once 'ProdController.php';
    require_once 'Veprimet.php';

    session_start();
    if((isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && $_SESSION['role'] == 0) || !(isset($_SESSION['loggedin']))){
        header("location:home.php");
        exit;
    }
    $produkti = new ProdController;
    $produktiId = null;
    if(isset($_GET['id'])){
        $produktiId = $_GET['id'];
    }

    
    

    $veprimi = 'Delete Product';
    $userId = $_SESSION['user_id']; 
    $koha = date('Y-m-d H:i:s');
    $detajet = ' ProduktID: ' . $produktiId; 

    $db = new Database();
    $veprim = new Veprimet($db->pdo);
    $veprim->logAction($veprimi, $userId, $koha, $detajet);
    $produkti->delete($produktiId);
?>