<?php 

require_once 'db.php';

//----------------------------------------//
function getproduits(){
        global $pdo;
        $req=" SELECT * FROM produits ";
        $stmt = $pdo->prepare($req);
        $stmt->execute();
        $produits = $stmt->fetchAll();
        return $produits;
}

?>