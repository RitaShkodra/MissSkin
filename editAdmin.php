

<?php 
require_once 'UserMapper.php';
include_once 'admin.php';
include_once 'RegisterLogic.php';

session_start();
if((isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && $_SESSION['role'] == 0) || !(isset($_SESSION['loggedin']))){
    header("location: home.php");
    exit;
}

$mapper = new UserMapper();
if(isset($_GET['id'])){
    $adminId = $_GET['id'];
}

$currentAdmin = $mapper->getUserByID($adminId);
$admin = new Admin($currentAdmin['email'], $currentAdmin['username'], $currentAdmin['userpassword'], $currentAdmin['role']);

 if(isset($_POST['Submit'])){
     $admin->setEmail($_POST['register-emailaddress']);
     $admin->setUsername($_POST['register-username']);
    $admin->setPassword($_POST['register-password']);
     $mapper->edit($admin,$adminId);
  header("Location:dashboard.php");
    exit();
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="crud.css">
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
<div class="kthehuD">
<h2 ><a href="dashboard.php"> DASHBOARD</a></h2>
</div>
<div class="input createP">
    <h1>Edito adminin</h1>
<form method="POST"> 
   
        <p><label for="register-emailaddress">Email</label></p>
        <p><input type="text" name="register-emailaddress" value="<?php echo $admin->getEmail(); ?>"></p>
        

   
    
        <p><label for="register-username">Username</label></p>
        <p> <input type="text" name="register-username" value="<?php echo $admin->getUsername(); ?>"></p>
        
        <p><label for="password">Password</label></p>
        <p><input type="password" name="register-password" value="<?php echo $admin->getPassword(); ?>"></p>

    <p><input type="submit" name="Submit" value="Ruaj" class="update_button"></p>
</form>
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
</div>
</div>
</body>
</html>



