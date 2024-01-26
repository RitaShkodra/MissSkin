<?php 
    require_once 'UserMapper.php';
    require_once 'RegisterLogic.php';

    session_start();
    if((isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && $_SESSION['role'] == 0) || !(isset($_SESSION['loggedin']))){
        header("location: home.php");
        exit;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="crud.css">
    <title>Krijo Admin</title>
</head>
<body>
    <div class="nav">
        <p>
            <div class="navicon">&#9776;</div>
            <a href="home.php"> <label for="">Home</label></a>
            <a href="face.php" ><label for="">Face</label></a>
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
        <h1>Krijo Admin</h1>
        <form method="POST" action="registerLogic.php"> 
            <p><label for="fullname">Full Name:</label><input type="text" id="fullname" name="fullname" placeholder="Full Name" required></p>
            <p><label for="username">Username:</label><input type="text" id="username" name="username" placeholder="Username" required></p>
            <p><label for="email">Email:</label><input type="email" id="email" name="email" placeholder="Email" required></p>
            <p><label for="password">Password:</label><input type="password" id="password" name="password" placeholder="Password" required></p>
            <p><input type="submit" name="create_acc" value="Save" class="update_button"></p>
        </form>
    </div>
</body>
</html>
