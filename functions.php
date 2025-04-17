<?php 

require_once 'db.php';

//----------------------------------------//
function getproduits($categoriefil = null, $primin = null, $prixmax = null) {
        global $pdo;
        $params = [];
        $conditions = [];
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
function getbyid($id=null){
        $params=[];
        global $pdo;
        $req = " SELECT * FROM produits WHERE id = :id ";
        $params = [':id' => $id];
        $stmt= $pdo->prepare($req);
        $stmt->execute($params);
        $produit = $stmt->fetch();
        return $produit;

}
function signup($fullName=null,$email=null,$phone=null,$password=null){
    global $pdo;
    $req="INSERT INTO users (fullname,email,phone,password) VALUES (?,?,?,?)";
    $stmt = $pdo->prepare($req);
    $stmt->execute([$fullName,$email,$phone,$password]);
}
?>