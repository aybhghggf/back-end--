<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once 'db.php';

$produits = [];
if (isset($_SESSION['panier'])) {
    foreach ($_SESSION['panier'] as $id => $quantite) {
        $req = $pdo->prepare("SELECT * FROM produits WHERE id = ?");
        $req->execute([$id]);
        $produit = $req->fetch();
        if ($produit) {
            $produit['quantite'] = $quantite;
            $produits[] = $produit;
        }
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

                    <td><?php echo htmlspecialchars($produit['prix']); ?> MAD</td>
                    <td><?php echo $produit['quantite']; ?></td>
                    <td>
                        <a href="deletepanier.php?id=<?php echo $produit['id']; ?>" class="btn btn-sm btn-danger">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>