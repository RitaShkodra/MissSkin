
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
            <a href="face.php"><label for="">Face</label></a>
           <a href="hairbody.php" class="active"> <label for="">Hair-Body</label></a>   
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
 
  
     <div class="beauty">
        <br>
        <h1>Community of Beauty Enthusiasts</h1>
        <br>
        <p>MissSkin is more than a brand; it's a community of beauty enthusiasts who celebrate diversity and self-expression.
             Join our community, connect with like-minded individuals, 
            and share your skincare journey. Together, let's redefine beauty standards and foster a culture of self-love.
        </p>
        <br>
        <p>In a world saturated with skincare options, MissSkin stands out as a beacon of excellence, 
            offering a sanctuary where beauty and well-being converge. Explore our website, indulge in self-care, 
            and unveil the radiant beauty that is uniquely yours. Welcome to MissSkin 
             where your journey to glowing skin begins!
        </p>
        <br>
        <div class="p1">
         <p>Don't wait, join MissSkin now!</p>
         <br>
         <p>FOR RADIANT BEAUTY THAT SPEAKS VOLUMES. YOUR GLOW-UP JOURNEY STARTS HERE!</p>
        <br>
        <a href="register.php"><button class="sign-button">Sign up for our exclusive offers > </button></a>
        </div>
        
     </div>
     <hr>
     <br>
     <div class="bodycream">
        <h1>BODY CREAM </h1>
        </div>
        <hr>
        <div class="bodyC">
        <div class="bodyfoto">
            <img src="Fotot/bodyFoto.webp" alt="">
    </div> 
       
<div class="body_products">
        <div class="body_row">
            <?php
            $bodyProducts = $prodController->readDataByType('bodycream');
            $count = 0; 

            foreach ($bodyProducts as $product):
            
                $prodController->displayBodyC($product['Foto'], $product['Emri'], $product['Cmimi'], $product['Pershkrimi']);
                $count++;
                if ($count ==2) {
                    echo '</div><div class="body_row">';
                }
            endforeach;
            ?>
        </div>
    </div>
</div>

    </div>
    </div>
    <div class="bproducts">
    <?php
    $faceProducts = $prodController->readDataByType('body');
    foreach ($faceProducts as $product):
        $prodController->displayBody($product['Foto'], $product['Emri'], $product['Cmimi'], $product['Pershkrimi']);
    endforeach;
    ?>
</div>
    <div class="bodyimages">
            <img src="Fotot/bathFoto.webp" alt="">
            <img src="Fotot/bathFoto2.webp" alt="">
       </div>


    <hr>

    <div class="hair">
        <h1>HAIR PRODUCTS</h1>
    </div>
    <hr>

    <div class="produktet">
       
        <?php
       
        $faceProducts = $prodController->readDataByType('hair');
        foreach ($faceProducts as $product):
            $prodController->displayHair($product['Foto'], $product['Emri'], $product['Cmimi'], $product['Pershkrimi']);
        endforeach;
        
        ?>

        <div class="HairFoto"><img src="Fotot/FotoHair e madhe.webp" alt=""></div>

        <?php
       
       $faceProducts = $prodController->readDataByType('hairP');
       foreach ($faceProducts as $product):
           $prodController->displayHair($product['Foto'], $product['Emri'], $product['Cmimi'], $product['Pershkrimi']);
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
    <script src="missskin.js"></script>

    
</body>
</html>