<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['id_user'])) {
    header('Location: login.php');
    exit();
}

if (empty($_SESSION['panier'])) {
    header('Location: panier.php');
    exit();
}

$user_id = $_SESSION['id_user'];

$total = 0;
foreach ($_SESSION['panier'] as $id => $quantite) {
    $req = $pdo->prepare("SELECT prix FROM produits WHERE id = ?");
    $req->execute([$id]);
    $produit = $req->fetch();
    if ($produit) {
        $total += $produit['prix'] * $quantite;
    }
}

$req = $pdo->prepare("INSERT INTO commandes (user_id, total, statut) VALUES (?, ?, 'en attente')");
$req->execute([$user_id, $total]);

$commande_id = $pdo->lastInsertId();

foreach ($_SESSION['panier'] as $id => $quantite) {
    $req = $pdo->prepare("SELECT * FROM produits WHERE id = ?");
    $req->execute([$id]);
    $produit = $req->fetch();
    
    if ($produit) {
        $req_detail = $pdo->prepare("INSERT INTO ligne_commandes (commande_id, produit_id, quantite, prix_unitaire) VALUES (?, ?, ?, ?)");
        $req_detail->execute([$commande_id, $produit['id'], $quantite, $produit['prix']]);
    }
}

unset($_SESSION['panier']);

header('Location:commande.php?order_id='. $commande_id);
exit();
?>
