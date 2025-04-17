<?php
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_SESSION['panier'][$id])) {
        if ($_SESSION['panier'][$id] > 1) {
            $_SESSION['panier'][$id] -= 1;
        } else {
            unset($_SESSION['panier'][$id]);
        }
    }
}
header('Location: panier.php');
exit();
?>
