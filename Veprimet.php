<?php 
require_once 'database.php';

class Veprimet {
    private $link;



    public function __construct($link) {
        $this->link = $link;
    }
    public function logAction($veprimi, $userId, $koha, $detajet) {

        $stmt = $this->link->prepare('INSERT INTO veprimet (Veprimi, userID, Koha, Detajet) VALUES (?, ?, ?, ?)');
        $stmt->execute([$veprimi, $userId, $koha, $detajet]);
    }



public function getVeprimet() {
    try {
        $query = "SELECT * FROM veprimet ORDER BY koha DESC";
        $stmt = $this->link->prepare($query);
        $stmt->execute();

        $logs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $logs;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
}











?>