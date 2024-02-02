<?php
include_once 'admin.php';
include_once 'simpleUser.php';
include "ProdController.php"; 
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
  }

$prodController = new ProdController();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
 
   
    <div class="nav">

        <p>
            <div class="navicon">&#9776;</div>
           <a href="home.php"> <label for="">Home</label></a>
            <a href="face.php" class="active"><label for="">Face</label></a>
           <a href="hairbody.php"> <label for="">Hair-Body</label></a>   
            <a href="home.php" class="MissSkin"><label for="">MissSkin</label></a>
           
        </p>
        <div class="LogIn">
        <?php 
        if (isset($_SESSION['loggedin'])) { 
            echo '<a href="Logout.php" class="LogIn">Log Out</a>';
            
            if ($_SESSION['role'] == 1) { 
                echo '<a href="dashboard.php" class="LogIn">Dashboard</a>';
            }
        } else { 
            echo '<a href="login.php" class="LogIn">Log In</a>';
        } 
        ?>
    </div>
    </div>
    <div class="oferta-face"><img src="Fotot/slider3.png" alt=""></div>
    <div class="products">
    <?php
    $faceProducts = $prodController->readDataByType('face');
    foreach ($faceProducts as $product):
        $prodController->displayProduct($product['Foto'], $product['Emri'], $product['Cmimi'], $product['Pershkrimi']);
    endforeach;
    ?>
</div>

    <hr>

    <div class="faceserum">
        <h1>FACE SERUMS </h1>
    </div>

    <hr>
    <div class="serums">
    <div class="serumfoto">
        <img src="Fotot/fotoSerum.jpg" alt="">
    </div>

    <div class="serum_products">
        <div class="serum_row">
            <?php
            $serumProducts = $prodController->readDataByType('serum');
            $count = 0; 

            foreach ($serumProducts as $product):
            
                $prodController->displaySerum($product['Foto'], $product['Emri'], $product['Cmimi'], $product['Pershkrimi']);
                $count++;
                if ($count ==2) {
                    echo '</div><div class="serum_row">';
                }
            endforeach;
            ?>
        </div>
    </div>
</div>

    

    <div class="sociallinks">
        <hr>
        <h1> SOCIAL LINKS</h1>
        <p>
            Join us on social media 
            <a href="www.facebook.com"><img src="Fotot/facebook.png" alt=""></a>
            <a href="www.instagram.com"><img src="Fotot/instagram.png" alt=""></a>
            <a href="www.youtube.com"><img src="Fotot/youtube.png" alt=""></a>
            <a href="register.html"><button>Sign up for our exclusive offers ></button></a>
        </p>
        <hr>
    </div>
    <div class="products">
    <?php
    $faceProducts = $prodController->readDataByType('faceP');
    foreach ($faceProducts as $product):
        $prodController->displayProduct($product['Foto'], $product['Emri'], $product['Cmimi'], $product['Pershkrimi']);
    endforeach;
    ?>
</div>
<footer>
    <div class="footer">
        <div class="minifooter">
            <h1 id="footerTitle">MissSkin</h1>
            <p id="icon"><a href="https://www.facebook.com/" target="_blank"><img src="Fotot/facebook.png" alt=""></a>
                <a href="https://www.Instagram.com" target="_blank" ><img src="Fotot/instagram.png" alt=""></a>
                <a href="https://www.tiktok.com" target="_blank"><img src="Fotot/tik-tok.png" alt=""></a>
                <a href="https://www.youtube.com" target="_blank"><img src="Fotot/youtube.png" alt=""></a>
            </p>
        </div>
        <div class="minifooter">
            <h2>LEGAL</h2>
           <p>Terms and Conditions</p>
           <p>Cookie Policy</p>
           <p>Returns Policy</p>
           <p>Refunds Policy</p>
        </div>
        <div class="minifooter">
            <h2>CUSTOMER SERVICE</h2>
           <p>Contact Us</p>
           <p>Shipping & Returns</p>
           <p>Popular FAQs</p>
           <p>Find My Order</p>
        </div>
        <div class="minifooter">
            <h2>OUR PRODUCTS</h2>
           <p>Skincare Solution Finder</p>
           <p>Why MissSkin</p>
           <p>Where To Buy</p>
           <p>MissSkin.com</p>
        </div>
    </div>

</footer>         
</div>
</div>

<script src="missskin.js"></script>
  
  


</body>
</html>