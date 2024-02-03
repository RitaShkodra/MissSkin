<?php 
  require_once 'ProdController.php';
  require_once 'homeController.php';
  require_once 'database.php';
  include_once 'UserMapper.php';
  include_once 'Veprimet.php';
  

  session_start();
if((isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && $_SESSION['role'] == 0) || !(isset($_SESSION['loggedin']))){
    header("location:home.php");
    exit;
}
$db = new Database();
$link = $db->pdo;

$veprimet = new Veprimet($db->pdo);
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
    <a href="Logout.php" class="LogIn"> <label for="">Log Out</label></a>
    <a href="dashboard.php" class="Dashboard active"> <label for="">Dashboard</label></a>

    </p>
  </div>
  <div class="DSH">
    <h1> DASHBOARD</h1>
  </div>

  
   <section>
   <div class="bNews">
   <h2 class="dashTitle">Adminët</h2>
        <table>
            <thead>
                <tr>
                    <th>AdminID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th colspan="3"><a href="createAdmin.php">Krijo Adminin</a></th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                $mapper = new userMapper();
                $adminList = $mapper->getAllAdmins();

                foreach ($adminList as $mapper) {
                ?>
                    <tr>
                    <td><?php echo $mapper['userID']; ?></td>
                        <td><?php echo $mapper['username']; ?></td>
                        <td><?php echo $mapper['email']; ?></td>
                        <td><?php echo $mapper['userpassword']; ?></td>
                        <td><a href="makeUser.php?id=<?php echo $mapper['userID'];?>">Bëje User</a></td>
                        <td><a href="editAdmin.php?id=<?php echo $mapper['userID'];?>">Edito</a></td>
                        <td><a href="deleteAdmin.php?id=<?php echo $mapper['userID'];?>">Fshij</a></td>
                        
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
   </div>
   </section>
       <section>
       <div class="bNews">
       <h2 class="dashTitle">Produktet</h2>
    <table>
        <thead>
            <tr>
              <th>ProduktID</th>
              <th>Emri i produktit</th>
              <th>Foto e produktit</th>
              <th>Cmimi i produktit</th>
              <th>Pershkrimi i produktit</th>              
              <th>Lloji</th>              

              <th colspan="2" ><a href="createProduct.php">Krijo Produktin</a></th>
            </tr>
        </thead>
        <tbody>
        <?php 
          $p = new ProdController;
          $allProduktet = $p->readData();
          foreach($allProduktet as $produkti): ?>
        <tr>
        <td><?php echo $produkti['id'];?></td>
          <td><?php echo $produkti['Emri'];?></td>
          <td><?php echo $produkti['Foto'];?></td>
          <td><?php echo $produkti['Cmimi'];?></td>
          <td><?php echo $produkti['Pershkrimi'];?></td>
          <td><?php echo $produkti['Lloji'];?></td>
          <td><a href="editProduct.php?id=<?php echo $produkti['id'];?>">Edito</a></td>
          <td><a href="deleteProduct.php?id=<?php echo $produkti['id'];?>">Fshij</a></td>
        </tr>  
        <?php endforeach; ?>
      </tbody>
    </table>
       </div>
       </section>
     <section>
     <div class="bNews">
    <h2 class="dashTitle">Përdoruesit</h2>
        <table>
            <thead>
                <tr>
                    <th>UserID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th colspan="2">Përdoruesi</th>
            
                </tr>
            </thead>
            <tbody>
                <?php
                $mapper = new userMapper();
                $userList = $mapper->getAllSimpleUsers();

                foreach ($userList as $user) {
                ?>
                    <tr>
                    <td><?php echo $user['userID']; ?></td>
                        <td><?php echo $user['username']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['userpassword']; ?></td>
                        <td><a href="makeAdmin.php?id=<?php echo $user['userID'];?>">Bëje Admin</a></td>
                        <td><a href="deleteUser.php?id=<?php echo $user['userID'];?>">Fshij </a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
  
    </div>
     </section>
      <section>
        <div class="bNews">
        <h2 class="dashTitle">Veprimet</h2>
          <table>
            <thead>
              <tr>
              
                    <th>AdminID</th>
                    <th>Veprimi</th>
                    <th>Koha</th>
                    <th>Detajet</th>
              </tr>
              <tbody>
                <?php
                $veprimi = new Veprimet($db->pdo);
                $veprimet = $veprimi->getVeprimet();
                foreach ($veprimet as $v) {
                  echo '<tr>';
                  echo '<td>' . $v['userID'] . '</td>';
                  echo '<td>' . $v['Veprimi'] . '</td>';
                  echo '<td>' . $v['Koha'] . '</td>';
                  echo '<td>' . $v['Detajet'] . '</td>';
                  echo '</tr>';
              }
                
                ?>

              </tbody>
            </thead>
          

          </table>
        </div>
      </section>
   
      <section>
    <div class="bNews">
      <h2>Blog News</h2>
      <table>
        <thead>
          <tr>
            <th>Blog</th>
            <th>Date</th>
            <th>Author</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Post 1</td>
            <td>2024-01-20</td>
            <td>Jennie Kim </td>
          </tr>
          <tr>
            <td>Post 2</td>
            <td>2024-01-22</td>
            <td>Selena Gomez</td>
          </tr>
        </tbody>
      </table>
    </div>

  </section>
  <br>
  <section>
    <div class="bNews">
      <h2>Face Cream Products</h2>
      <table>
        <thead>
          <tr>
            <th>Product</th>
            <th>Date</th>
            <th>Author</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Post 1</td>
            <td>2024-01-20</td>
            <td>Jennie Kim </td>
          </tr>
          <tr>
            <td>Post 2</td>
            <td>2024-01-22</td>
            <td>Selena Gomez</td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>

  <section>
    <div class="bNews">
      <h2>Face Serum Products</h2>
      <table>
        <thead>
          <tr>
            <th>Product</th>
            <th>Date</th>
            <th>Author</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Post 1</td>
            <td>2024-01-20</td>
            <td>Jennie Kim </td>
          </tr>
          <tr>
            <td>Post 2</td>
            <td>2024-01-22</td>
            <td>Selena Gomez</td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>


  <section>
    <div class="bNews">
      <h2>Social Links</h2>
      <table>
        <thead>
          <tr>
            <th>Links</th>
            <th>Date</th>
            <th>Author</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Post 1</td>
            <td>2024-01-20</td>
            <td>Jennie Kim </td>
          </tr>
          <tr>
            <td>Post 2</td>
            <td>2024-01-22</td>
            <td>Selena Gomez</td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>


  <section>
    <div class="bNews">
      <h2>Beauty Community-About Us</h2>
      <table>
        <thead>
          <tr>
            <th>News</th>
            <th>Date</th>
            <th>Author</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Post 1</td>
            <td>2024-01-20</td>
            <td>Jennie Kim </td>
          </tr>
          <tr>
            <td>Post 2</td>
            <td>2024-01-22</td>
            <td>Selena Gomez</td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>

  <section>
    <div class="bNews">
      <h2>Body Cream Products</h2>
      <table>
        <thead>
          <tr>
            <th>Product</th>
            <th>Date</th>
            <th>Author</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Post 1</td>
            <td>2024-01-20</td>
            <td>Jennie Kim </td>
          </tr>
          <tr>
            <td>Post 2</td>
            <td>2024-01-22</td>
            <td>Selena Gomez</td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>

  <section>
    <div class="bNews">
      <h2>Hair Products</h2>
      <table>
        <thead>
          <tr>
            <th>Product</th>
            <th>Date</th>
            <th>Author</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Post 1</td>
            <td>2024-01-20</td>
            <td>Jennie Kim </td>
          </tr>
          <tr>
            <td>Post 2</td>
            <td>2024-01-22</td>
            <td>Selena Gomez</td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>






  <footer>
    <div class="footer">
      <div class="minifooter">
        <h1 id="footerTitle">MissSkin</h1>
        <p id="icon"><a href="https://www.facebook.com/" target="_blank"><img src="Fotot/facebook.png" alt=""></a>
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