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
        $query = $this->db->pdo->query('SELECT * FROM produkti');

        return $query->fetchAll();
    }

    public function insert($request)
    {
        $request['img'] = './Fotot/' . $request['img'];
        $query = $this->db->pdo->prepare('INSERT INTO produkti (h1, p, label) 
            VALUES(:h1, :p, :label)');
        $query->bindParam(':h1', $request['h1']);
        $query->bindParam(':img', $request['img']);
        $query->bindParam(':p', $request['p']);
        $query->bindParam(':label', $request['label']);
        $query->execute();

        return header('Location: dashboard.php');
    }

    public function edit($id)
    {
        $query = $this->db->pdo->prepare('SELECT * FROM produkti WHERE id = :id');
        $query->bindParam(':id', $id);
        $query->execute();

        return $query->fetch();
    }

    public function update($request, $id)
    {
        $request['img'] = './images/' . $request['img'];
        $query = $this->db->pdo->prepare('UPDATE produkti SET h1 = :h1, img = :img, p = :p, label = :label WHERE id = :id');
        $query->bindParam(':h1', $request['h1']);
        $query->bindParam(':img', $request['img']);
        $query->bindParam(':p', $request['p']);
        $query->bindParam(':label', $request['label']);
        $query->bindParam(':id', $id);
        $query->execute();

        return header('Location: dashboard.php');
    }

    public function delete($id)
    {
        $query = $this->db->pdo->prepare('DELETE FROM produkti WHERE id = :id');
        $query->bindParam(':id', $id);
        $query->execute();

        return header('Location: dashboard.php');
    }
    function displayBodyC($imgSrc, $title, $price, $description) {
        echo '<div class="body_product">';
        echo '<img src="' . $imgSrc . '" alt="">';
        echo '<h1>' . $title . '</h1>';
        echo '<p>€' . $price . '</p>';
        echo '<label for="">' . $description . '</label>';
        echo '</div>';
    }
    function displayBody($imgSrc, $title, $price, $description) {
        echo '<div class="bproduct">';
        echo '<img src="' . $imgSrc . '" alt="">';
        echo '<h1>' . $title . '</h1>';
        echo '<p>€' . $price . '</p>';
        echo '<label for="">' . $description . '</label>';
        echo '</div>';
    }
    function displayProduct($imgSrc, $title, $price, $description) {
        echo '<div class="product">';
        echo '<img src="' . $imgSrc . '" alt="">';
        echo '<h1>' . $title . '</h1>';
        echo '<p>€' . $price . '</p>';
        echo '<label for="">' . $description . '</label>';
        echo '</div>';
    }
    function displaySerum($imgSrc, $title, $price, $description) {
        echo '<div class="serum_product">';
        echo '<img src="' . $imgSrc . '" alt="">';
        echo '<h1>' . $title . '</h1>';
        echo '<p>€' . $price . '</p>';
        echo '<label for="">' . $description . '</label>';
        echo '</div>';
    }
}
?>