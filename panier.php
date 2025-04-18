<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once 'db.php';

if (isset($_GET['mes']) && $_GET['mes'] == 'connecté') {
    echo '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        ✅ Vous êtes connecté avec succès !
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
} 

$produits = [];
$total = 0; // Initialize total

if (isset($_SESSION['panier'])) {
    foreach ($_SESSION['panier'] as $id => $quantite) {
        $req = $pdo->prepare("SELECT * FROM produits WHERE id = ?");
        $req->execute([$id]);
        $produit = $req->fetch();
        if ($produit) {
            $produit['quantite'] = $quantite;
            $produits[] = $produit;
            // Add product price * quantity to total
            $total += $produit['prix'] * $quantite;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./style/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
</head>

<body>
    <?php include_once 'nav.php'; ?>

    <h2 class="text-center mb-5">Votre Panier:</h2>
    <table class="table table-bordered text-center">
        <thead class="table-dark">
            <tr>
                <th>Produit</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produits as $produit): ?>
                <tr>
                    <td>
                        <?= htmlspecialchars($produit['nom']) ?>
                        <img src="images/<?= htmlspecialchars($produit['image']) ?>" alt="<?= htmlspecialchars($produit['nom']) ?>" style="width: 50px; height: 50px; object-fit: cover; margin-left: 10px;">
                    </td>
                    <td><?= htmlspecialchars($produit['prix']) ?> MAD</td>
                    <td><?= $produit['quantite'] ?></td>
                    <td>
                        <a href="deletepanier.php?id=<?= $produit['id']; ?>" class="btn btn-sm btn-danger">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php } else {
        echo '<h2 class="text-center mb-5">Votre panier est vide.</h2>';
    } ?>
    
    <?php if ($produits): ?>
        <div class="text-end mt-4">
            <h4>Total Panier: <?= $total ?> DH</h4>
            <a href="valider_commande.php" class="btn btn-success mt-3">Valider Commande</a>
        </div>
    <?php endif; ?>
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="./scripts/script.js"></script>

</html>
