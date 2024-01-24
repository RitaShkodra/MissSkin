
<?php
include_once 'admin.php';
include_once 'simpleUser.php';
include "ProdController.php"; 
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
?>
 </div>
     <div class="bodycream">
        <h1>BODY CREAM </h1>
        </div>
        <hr>
        <div class="bodyC">
        
        <?php
        displayProduct("Fotot/body1.webp", "Body Cream Pigmentation Glow", "16.99", "Reduces Hyperpigmentation and pimples");
        displayProduct("Fotot/body2.webp", "Body Cream 12% Niacinamide", "19.70", "Evens out Rough Texture | Energizes Skin");
        displayProduct("Fotot/body3.webp", "Body Cream with Vitamin C", "12.55", "Reduces Pigmentation | Vitamin C");
        displayProduct("Fotot/body4.webp", "Body Cream and Extra Glow", "22.50", "Prevents Breakouts & Whiteheads");
        
        ?>
    </div>

    <div class="bproducts">
      
        <?php
        displayProduct("Fotot/bathbomb1.webp", "Celestial Serenity Bath Bomb", "6.99", "Pampers Skin | Lightweight & Refreshing");
        displayProduct("Fotot/bodyLoofa1.webp", "Lustrous Luxe Velvet-Touch Exfoliating Glove", "4.75", "Exfoliating Ingredients | Gentle Cleansing");
        displayProduct("Fotot/BodyScrub1.webp", "Velvet Glow Renewal Elixir Exfoliating Body Scrub", "10.99", "Exfoliate Skin | Nourish | Renew & Hydrate");
        displayProduct("Fotot/BodySpray1.webp", "Enchanting Orchid Bloom Hydrating Mist", "12.50", "Energizing Botanical Extracts | Moisturize");
        
        ?>
    </div>

    <hr>

    <div class="hair">
        <h1>HAIR PRODUCTS</h1>
    </div>
    <hr>

    <div class="produktet">
       
        <?php
        displayProduct("Fotot/HairMask1.webp", "Strawberry Hair Mask", "8.50", "Relaxation and Self-Care | Adding Volume | Reducing Frizz");
        displayProduct("Fotot/HairMask2.webp", "Dark Berry Hair Mask", "8.50", "Relaxation and Self-Care | Adding Volume | Reducing Frizz");
        displayProduct("Fotot/HairMask3.webp", "Banana Hair Mask", "10.99", "Relaxation and Self-Care | Adding Volume | Reducing Frizz");
        displayProduct("Fotot/hairproduct-4.png", "Orange Hair Mask", "10.99", "Relaxation and Self-Care | Adding Volume | Reducing Frizz");
        displayProduct("Fotot/hairWasher1.png", "MissSkin Hair Shampoo", "14.00", "Optimal pH Balance | Reduces Hyperpigmentation | All Skin");
        displayProduct("Fotot/HairProduct6.png", "MissSkin Hair Oil", "11.20", "Improved Scalp Health | Prevention of Hair Loss | Shine");
        
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