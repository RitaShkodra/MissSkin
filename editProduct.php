<?php 
    require_once 'ProdController.php';

    session_start();
    if((isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && $_SESSION['role'] == 0) || !(isset($_SESSION['loggedin']))){
        header("location:home.php");
        exit;
    }

    $prod = new ProdController;
    if(isset($_GET['id'])){
        $prodId = $_GET['id'];
    } 
    
    $currentProd = $prod ->edit($prodId);

    if(isset($_POST['Submit'])){
        $prod->update($_POST,$prodId);
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
<h2><a href="dashboard.php">Kthehu ne Dashboard</a></h2>

    <div class="input">
    <h1 >Edito produktin</h1>
    <form method="POST"> 
    
        <input type="text" name="titulli" value="<?php echo $currentProd['title'];?>">
      
        <label for="pershkrimi">Pershkrimi</label> 
        <input type="file" name="foto" value="<?php echo $currentProd['imgSrc'];?>">
        
        <input type="text" name="cmimi" value="<?php echo $currentProd['price'];?>">
       
        <label for="pershkrimi">Cmimi</label>
        <input type="text" name="cmimi" value="<?php echo $currentProd['description'];?>">
      
        <label for="pershkrimi">Pershkrimi</label>
       
        <input type="Submit" name="Submit" value="Update" class ="update_button">
    </form>
</div>

</body>
</html>
<div>