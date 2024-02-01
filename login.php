<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    header("Location: home.php");
        exit;
}
// session_start();
// if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
//     header("location: home.php");
//     exit;
// }
// include "LoginLogic.php";


// session_start();

// if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
//     header("location: home.php");
//     exit;
// }

// include "simpleUser.php";
// include "UserMapper.php";
// include "LoginLogic.php";

// // $userMapper = new UserMapper(); // Krijoni instancën e UserMapper
// $formData = $_POST;
// $loginHandler = new LoginLogic($formData);

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $username = $_POST['username'];
//     $password = $_POST['password'];

//     if ($loginHandler->loginUser($username, $password)) {
//         header("Location: home.php");
//         exit;
//     } else {
//         $error = "Invalid username or password.";
//     }
// }



// Include necessary files
include "LoginLogic.php";
include_once 'UserMapper.php';

$loginLogic = new LoginLogic($_POST);
$error = isset($error) ? $error : '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($loginLogic->loginUser($username, $password)) {
        header("Location: home.php");
        exit;
    } else {
        $error = "Incorrect username or password";
    }
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
           <a href="hairbody.php"> <label for="">Hair-Body</label></a>   
            <a href="home.php" class="MissSkin"><label for="">MissSkin</label></a>
           <a href="login.php" class="LogIn active"> <label for="" >Log In</label></a>
           <?php 
           if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
                // Display the Dashboard link only for users with role 1 (admin)
                echo '<a href="dashboard.php" class="Dashboard active">Dashboard</a>';
            }
           ?>

        </p>
    </div>
 

    <div class="faqja">
        <div class="img w-40">
            <img src="Fotot/LogIn-Foto.webp" alt="" >
        </div>
    <div class="input w-40" id="">
        <h1>Login</h1>
        <div class="error-message">
        <?php echo $error; ?>
        </div>

        <form class="login_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="form" onsubmit="return validateLogin()">
    <div class="text_form">
        <input autocomplete="off" type="text" name="username" placeholder="username" id="user" required>
        <input autocomplete="current-password" type="password" name="password" placeholder="password" id="pass" required>
        <p><input type="submit" name="login-btn" value="SIGN IN" class="login_button"></p>
        <div class="signup_link">
            Don't have an account? <b><a href="register.php">Sign up!</b></a>
        </div>
    </div>
</form>
        
        

   
     </div>
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