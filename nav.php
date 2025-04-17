<?php 
if(!isset($_SESSION)){
  session_start();
}
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

$totalitems = array_sum($_SESSION['panier']);
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Anton&family=Arvo:ital,wght@0,400;0,700;1,400;1,700&family=Balsamiq+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Bebas+Neue&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Karla:ital,wght@0,200..800;1,200..800&family=Lilita+One&family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Oswald:wght@700&family=Playpen+Sans:wght@100..800&family=Playwrite+AU+SA:wght@100..400&family=Playwrite+BE+WAL+Guides&family=Playwrite+DE+VA+Guides&family=Playwrite+VN:wght@100..400&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Space+Grotesk:wght@300..700&family=Tenali+Ramakrishna&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./style/style.css">
<header class="d-flex align-items-center justify-content-between py-3 mb-4">
  <div class="container">
    <div class="row w-100 d-flex align-items-center">
      <!-- Logo Section -->
      <div class="col-md-3 d-flex align-items-center mb-2 mb-md-0">
        <a href="index.php" class="d-inline-flex link-body-emphasis text-decoration-none">
          <img src="./images/full-shoping-cart-svgrepo-com.svg" alt="Logo" class="bi" width="40" height="32" role="img">
          <span class="fs-4 ms-2 fw-bold text-primary">TechStore</span>
        </a>
      </div>

      <!-- Navigation Links -->
      <div class="col-md-6 d-flex justify-content-center">
        <ul class="nav d-flex mb-2 justify-content-center mb-md-0">
          <li><a href="index.php" class="nav-link px-2 fs-6">Home</a></li>
          <li><a href="product.php" class="nav-link px-2 fs-6">Smartphones</a></li>
          <li><a href="commande.php" class="nav-link px-2 fs-6">commandes</a></li>
        </ul>
      </div>

      <!-- Cart and Auth Buttons -->
      <div class="col-md-3 d-flex justify-content-end">
        <!-- Cart Icon with Badge -->
        <a class="nav-link position-relative d-flex align-items-center me-3" href="panier.php">
          <i class="bi bi-cart" style="font-size: 1.3rem;"></i>
          <span class="badge bg-danger position-absolute top-0 start-100 translate-middle p-2 rounded-circle" style="font-size: 0.75rem;"><?php echo $totalitems ?></span> <!-- Change '3' dynamically -->
        </a>

        <!-- Login and Sign up buttons -->
         <?php 
          if(isset($_SESSION['user'])):
         ?>
         
          <a href="logout.php" class="btn btn-outline-danger me-2 fs-6">
            <i class="bi bi-person"></i> Log out
          </a>
            <?php else: ?>
        <a href="login.php" class="btn btn-outline-primary me-2 fs-6"><i class="bi bi-person"></i> Login</a>
        <a href="sign.php" class="btn btn-primary fs-6"><i class="bi bi-person-plus"></i> Sign up</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</header>
