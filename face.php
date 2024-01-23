<?php
include_once 'admin.php';
include_once 'simpleUser.php';
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
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
<?php 
    session_start();
    include "ProdController.php"; 
?>
    <div class="nav">

        <p>
            <div class="navicon">&#9776;</div>
           <a href="home.html"> <label for="">Home</label></a>
            <a href="face.html" class="active"><label for="">Face</label></a>
           <a href="hairbody.html"> <label for="">Hair-Body</label></a>   
            <a href="home.html" class="MissSkin"><label for="">MissSkin</label></a>
           <a href="login.html" class="LogIn"> <label for="" >Log In</label></a>
           
        </p>
        <?php 
                
                if (isset($_SESSION['loggedin'])) { 
                    
                    echo '<li><a href="Logout.php" class="nav">Log Out</a></li>';
                    
                    if ($_SESSION['role'] == 1) { 
                      
                        echo '<li><a href="dashboard.php" class="nav">Dashboard</a></li>';
                    }
                } else { 
          
                   echo ' <li><a href="login.php" class="nav">Login</a></li>';
                 } ?>
    </div>
    <div class="oferta-face"><img src="Fotot/slider3.png" alt=""></div>

    <!-- Shfaqja e produkteve -->
    <div class="products">
        <?php
            // Funksioni per shfaqjen e produkteve
            function displayProduct($imgSrc, $title, $price, $description) {
                echo '<div class="product">';
                echo '<img src="' . $imgSrc . '" alt="">';
                echo '<h1>' . $title . '</h1>';
                echo '<p>€' . $price . '</p>';
                echo '<label for="">' . $description . '</label>';
                echo '</div>';
            }

            // Seksioni i parë me produkte
            displayProduct("Fotot/Oferta1f1.webp", "Waterlight Gel Moisturizer 72 Hour Hydration 50 ml", "8.50", "Instantly Hydrates Skin | LightWeight & Non-Sticky");
            displayProduct("Fotot/Oferta1f2.webp", "Clearing & Calming Acne Face Wash 72 Hour Hydration 100 ml", "6.25", "Speeds Up Healing Of Acne | Gentle Cleansing | Acne");
            displayProduct("Fotot/Oferta1f3.webp", "Acne Care & Healing Gel Moisturiser With Tea Tree", "6.99", "Healing Of Acne | Gently Hydrates |Treats & Prevents");
            displayProduct("Fotot/Oferta1f4.webp", "Overnight Acne Spot Corrector,Fast-Acting Spot Treatment: & Cica 50 ml", "9.70", "Reduces & Shrinks | Works on Active Acne, Blackheads");
            displayProduct("Fotot/Oferta1f5.webp", "Dark Spot & Hyperpigmentation Correcting Power Serum", "12.00", "Fades Dark Spots | Reduces Hyperpigmentation");
            displayProduct("Fotot/Oferta1f6.webp", "Super Clarifying 12% Niacinamide Face Serum for All Skin Types", "11.50", "Controls Oil | Refines Pores | Evens out Rough Texture");
        ?>
    </div>

    <hr>

    <div class="faceserum">
        <h1>FACE SERUMS </h1>
    </div>

    <hr>

    <!-- Seksioni i dytë me produkte (Serumet) -->
    <div class="serums">
        <div class="serumfoto">
            <img src="Fotot/fotoSerum.jpg" alt="">
        </div>

        <div class="serum_products">
            <div class="serum_row">
                <?php
                    displayProduct("Fotot/Serum1.webp", "Dark Spot & Hyperpigmentation Correcting Power Serum", "16.99", "Fades Dark Spots | Reduces Hyperpigmentation");
                    displayProduct("Fotot/Serum2.webp", "Super Clarifying 12% Niacinamide Face Serum for All", "19.70", "Controls Oil | Refines Pores | Evens out Rough Texture");
                ?>
            </div>

            <div class="serum_row">
                <?php
                    displayProduct("Fotot/Serum3.webp", "Vitamin C Antioxidant Radiance Serum 30 ml", "12.55", "Reduces Pigmentation | Energizes Skin");
                    displayProduct("Fotot/Serum4.webp", "Anti Acne Serum 30 ml + Pigmentation Relief Duo", "22.50", "Prevents Breakouts & Whiteheads");
                ?>
            </div>
        </div>
    </div>

    <!-- Këtu mund të vazhdohet me seksionet e tjera të produkteve (nëse ka) -->

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

    <!-- Pjesa e fundit me produkte -->
    <div class="products">
        <?php
            displayProduct("Fotot/Acne1.webp", "Overnight Acne Spot Corrector 72 Hour Hydration 30 ml", "18.50", "Reduces & Shrinks Acne | Works on active Blackheads");
            displayProduct("Fotot/Mask1.webp", "Overnight Exfoliating AHA BHA Radiance Mask 72 Hour Hydration 100 ml", "6.25", "Double Exfoliates | Reduces Pigmentation | Evens Out Skin");
            displayProduct("Fotot/Moisturiser1.webp", "Daily Moisturiser With Blue Light Protection and Reduces Pigmentation", "16.99", "Hydrates Skin | Improves Dullness | All Skin types");
            displayProduct("Fotot/Toner1.webp", "Hydrating Toner and Overnight Acne Spot Corrector 100 ml", "9.70", "Reduces & Shrinks | Works on Active Acne, Blackheads");
            displayProduct("Fotot/Oil1.webp", "Oil Free Matte Moisturiser with Blue Light Protection 30ml", "14.00", "Fades Dark Spots | Reduces Hyperpigmentation| All Skin");
            displayProduct("Fotot/Sunscreen.webp", "Mineral Matte Tinted Sunscreen for All Skin Types 50 g", "11.20", "Shields skin from Broad Spectrum UVA and UVB rays");
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