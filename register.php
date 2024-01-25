<?php
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    header("location: home.php");
    exit;
}
include 'RegisterLogic.php';

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="home.css">
</head>
<?php 
$emptyErr = $emailValidErr = $emailExistsErr = $usernameValidErr =$UsernameExistsErr = $passwordValid=$success=$email=$username="";

if (isset($_POST['register-btn'])) {
    $register = new RegisterLogic($_POST);
    $email=$register->getEmail();
    $username=$register->getUsername();
    $EmptyFields=$register->emptyFields();
    $EmailisValid = $register->validateEmail();
    $UsernameisValid = $register->validateUsername();
    $PasswordisValid = $register->validatePassword();
    $EmailExists=$register->emailExists();
    $UsernameExists=$register->usernameExists();
    if(!$EmptyFields && $EmailisValid && $UsernameisValid && $PasswordisValid && !$EmailExists && !$UsernameExists){
        $register->insertData();
        $success = "Jeni regjistruar me sukses!";
  
        header("location:login.php");
    } else if($EmptyFields){
        $emptyErr = "Ju lutem plotesoni te gjitha fushat!";
        
    }
    else if(!$EmailisValid){
        $emailValidErr = "Email është jovalid!";
   
}
else if($EmailExists){
    $emailExistsErr = "Ky email ekziston!";

}
else if($UsernameExists){
    $UsernameExistsErr = "Username ekziston!";
 
}
else if(!$UsernameisValid){
    $usernameValidErr = "Username nuk mund të përmbajë hapësira as karaktere speciale!";
   
}else if(!$PasswordisValid){
    $passwordValid= "Password duhet të ketë së paku 8 karaktere dhe të përmbajë shkronja të vogla, të mëdha, numra dhe karaktere speciale!";
  
}
}

?>

<body>
    <div class="nav">
        <p>
        <div class="navicon">&#9776;</div>
        <a href="home.php"> <label for="">Home</label></a>
        <a href="face.php"><label for="">Face</label></a>
        <a href="hairbody.php"> <label for="">Hair-Body</label></a>
        <a href="home.php" class="MissSkin"><label for="">MissSkin</label></a>
        <a href="login.php" class="LogIn active"> <label for="">Log In</label></a>

        </p>
    </div>
    <div class="errors">
    <span><?php echo $emailValidErr;?></span>
    <span> <?php echo $emailExistsErr;?></span>
    <span> <?php echo $usernameValidErr;?></span>
    <span><?php echo $UsernameExistsErr;?></span>
    <span> <?php echo $passwordValid;?></span>
    </div>
    <div class="registerbox">
        <div class="img w-40">
            <img src="Fotot/LogIn-Foto.webp" alt="">
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onsubmit="return validateRegister()">
            <div class="inputr w-40">
                <h1>Create Account</h1>
                <p><input autocomplete="off" type="text" name="register-emailaddress" id="email" placeholder="email" required value="<?php echo $email;?>"></p>
                <p><input autocomplete="off" type="text" name="register-username" id="user" placeholder="username" required value="<?php echo $username;?>"></p>
                <p><input type="password" name="register-password" id="password" placeholder="password" required></p>
                <p>Sign up for the latest MissSkin updates, special offers, and more. Unsubscribe at any time.</p>
                <p><input type="submit" name="register-btn" value="CREATE ACCOUNT" class="register_button"></p>
            </div>
        </form>
    </div>
    <footer>
        <div class="footer">
            <div class="minifooter">
                <h1 id="footerTitle">MissSkin</h1>
                <p id="icon"><a href="https://www.facebook.com/" target="_blank"><img src="Fotot/facebook.png"
                            alt=""></a>
                    <a href="https://www.Instagram.com" target="_blank"><img src="Fotot/instagram.png" alt=""></a>
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