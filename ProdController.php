<?php

require_once 'database.php';

class ProdController
{
    private $db;

    public function __construct()
    {
        $this->db = new Database(); 
    }

    public function readData()
    {
        $query = $this->db->pdo->query('SELECT * FROM product');

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
   

    public function insert($request)
    {
        $uploadedFile = $_FILES['img']['tmp_name'];
    $targetFilePath = './Fotot/' . basename($_FILES['img']['name']);
    $productType = $_POST['productType'];

        $query = $this->db->pdo->prepare('INSERT INTO product (Emri, Foto, Cmimi, Pershkrimi, Lloji) VALUES(:Emri, :Foto, :Cmimi, :Pershkrimi, :Lloji)');
        if(move_uploaded_file($uploadedFile, $targetFilePath)){
            $query->bindParam(':Emri', $request['titulli']);
        $query->bindParam(':Foto', $targetFilePath);
        $query->bindParam(':Cmimi', $request['cmimi']);
        $query->bindParam(':Pershkrimi', $request['pershkrimi']);
        $query->bindParam(':Lloji', $productType);
        $query->execute();

        }
    
    
        $this->productType($request['img'], $request['titulli'], $request['cmimi'], $request['pershkrimi'], $productType);

    
        return header('Location: dashboard.php');
       

    }
    private function productType($img, $titulli, $cmimi, $pershkrimi, $productType)
    {
        switch ($productType) {
            case 'face':
                $this->displayProduct($img, $titulli, $cmimi, $pershkrimi);
                break;
            case 'serum':
                $this->displaySerum($img, $titulli, $cmimi, $pershkrimi);
                break;
            case 'bodycream':
                $this->displayBodyC($img, $titulli, $cmimi, $pershkrimi);
                break;
            case 'body':
                $this->displayBody($img, $titulli, $cmimi, $pershkrimi);
                break;
            case 'hair':
                $this->displayHair($img, $titulli, $cmimi, $pershkrimi);
                break;
            }
        }

        public function readDataByType($productType)
{
    $query = $this->db->pdo->prepare('SELECT * FROM product WHERE Lloji = :productType');
    $query->bindParam(':productType', $productType, PDO::PARAM_STR);
    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
}

    public function edit($id)
    {
        $query = $this->db->pdo->prepare('SELECT * FROM product WHERE id = :id');
        $query->bindParam(':id', $id);
        $query->execute();

        return $query->fetch();
    }

    public function update($request, $id)
    {
     
        if (!empty($_FILES['img']['tmp_name'])) {
           
            $uploadedFile = $_FILES['img']['tmp_name'];
            $targetFilePath = './Fotot/' . basename($_FILES['img']['name']);
    
            if (move_uploaded_file($uploadedFile, $targetFilePath)) {
                $request['img'] = $targetFilePath;
            } else {
              
            }
        }
    
        
        $query = $this->db->pdo->prepare('UPDATE product SET Emri = :Emri, Foto = :Foto, Cmimi = :Cmimi, Pershkrimi = :Pershkrimi WHERE id = :id');
        $query->bindParam(':Emri', $request['titulli']);
        $query->bindParam(':Foto', $request['img']);
        $query->bindParam(':Cmimi', $request['cmimi']);
        $query->bindParam(':Pershkrimi', $request['pershkrimi']);
        $query->bindParam(':id', $id);
        $query->execute();
    
        return header('Location: dashboard.php');
    }

    public function delete($id)
    {
        $query = $this->db->pdo->prepare('DELETE FROM product WHERE id = :id');
        $query->bindParam(':id', $id);
        $query->execute();

        return header('Location: dashboard.php');
    }
    function displayBodyC($img, $titulli, $cmimi, $pershkrimi) {
        echo '<div class="body_product">';
        echo '<img src="' . $img . '" alt="">';
        echo '<h1>' . $titulli . '</h1>';
        echo '<p>€' . $cmimi . '</p>';
        echo '<label for="">' . $pershkrimi . '</label>';
        echo '</div>';
    }
    function displayBody($img, $titulli, $cmimi, $pershkrimi) {
        echo '<div class="bproduct">';
        echo '<img src="' . $img . '" alt="">';
        echo '<h1>' . $titulli . '</h1>';
        echo '<p>€' . $cmimi . '</p>';
        echo '<label for="">' . $pershkrimi . '</label>';
        echo '</div>';
    }
    function displayProduct($img, $titulli, $cmimi, $pershkrimi) {
        echo '<div class="product">';
        echo '<img src="' . $img . '" alt="">';
        echo '<h1>' . $titulli . '</h1>';
        echo '<p>€' . $cmimi . '</p>';
        echo '<label for="">' . $pershkrimi . '</label>';
        echo '</div>';
    }
    function displaySerum($img, $titulli, $cmimi, $pershkrimi) {
        echo '<div class="serum_product">';
        echo '<img src="' . $img . '" alt="">';
        echo '<h1>' . $titulli . '</h1>';
        echo '<p>€' . $cmimi . '</p>';
        echo '<label for="">' . $pershkrimi . '</label>';
        echo '</div>';
    }
    function displayHair($img, $titulli, $cmimi, $pershkrimi){
        echo '<div class="produkt">';
        echo '<img src="' . $img . '" alt="">';
        echo '<h1>' . $titulli . '</h1>';
        echo '<p>€' . $cmimi . '</p>';
        echo '<label for="">' . $pershkrimi . '</label>';
        echo '</div>';
    }
}
?>