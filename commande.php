<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['id_user'];

$req = $pdo->prepare("SELECT * FROM commandes WHERE user_id = ? ORDER BY date_commande DESC");
$req->execute([$user_id]);
$commandes = $req->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vos Commandes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include_once 'nav.php'; ?>

<div class="container mt-5">
    <h2 class="mb-4 text-center">Mes Commandes</h2>

    <?php if (count($commandes) > 0): ?>
        <?php foreach ($commandes as $commande): ?>
            <div class="card mb-4">
                <div class="card-header">
                    <strong>Commande #<?= $commande['id'] ?></strong> |
                    Date: <?= $commande['date_commande'] ?> |
                    Statut: <?= $commande['statut'] ?> |
                    Total: <?= number_format($commande['total'], 2) ?> MAD
                </div>
                <div class="card-body">
                    <table class="table text-center">
                        <thead class="table-light">
                            <tr>
                                <th>Produit</th>
                                <th>Quantité</th>
                                <th>Prix Unitaire</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $req_lignes = $pdo->prepare("
                                SELECT lc.*, p.nom, p.image 
                                FROM ligne_commandes lc 
                                JOIN produits p ON lc.produit_id = p.id 
                                WHERE lc.commande_id = ?
                            ");
                            $req_lignes->execute([$commande['id']]);
                            $lignes = $req_lignes->fetchAll();
                            foreach ($lignes as $ligne): ?>
                                <tr>
                                    <td>
                                        <?= htmlspecialchars($ligne['nom']) ?>
                                        <img src="images/<?= htmlspecialchars($ligne['image']) ?>" alt="<?= htmlspecialchars($ligne['nom']) ?>" style="width: 50px; height: 50px; object-fit: cover; margin-left: 10px;">
                                    </td>
                                    <td><?= $ligne['quantite'] ?></td>
                                    <td><?= number_format($ligne['prix_unitaire'], 2) ?> MAD</td>
                                    <td><?= number_format($ligne['prix_unitaire'] * $ligne['quantite'], 2) ?> MAD</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="alert alert-info text-center">Vous n'avez encore passé aucune commande.</div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
