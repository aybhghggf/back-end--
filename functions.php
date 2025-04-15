<?php 

require_once 'db.php';

//----------------------------------------//
function getproduits($categoriefil = null, $primin = null, $prixmax = null) {
        global $pdo;
        $params = [];
        $conditions = [];
    
        // Si la catégorie est fournie
        if (!empty($categoriefil)) {
            $conditions[] = "categorie_id = :categorie";
            $params[':categorie'] = $categoriefil;
        }
        if (!empty($primin)) {
            $conditions[] = "prix >= :prixmin";
            $params[':prixmin'] = $primin;
        }
        if (!empty($prixmax)) {
            $conditions[] = "prix <= :prixmax";
            $params[':prixmax'] = $prixmax;
        }
        $req = "SELECT * FROM produits";
        if (count($conditions) > 0) {
            $req .= " WHERE " . implode(" AND ", $conditions);
        }
    
        $stmt = $pdo->prepare($req);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }
    
function getcategorie(){
        global $pdo;
        $req= " SELECT * FROM categories ";
        $stmt = $pdo->prepare($req);
        $stmt->execute();
        $categorie = $stmt->fetchAll();
        return $categorie;
}
?>