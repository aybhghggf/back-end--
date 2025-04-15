<?php 
require_once 'db.php';
require_once 'functions.php';
if(isset($_POST['categorie'])&& isset($_POST['minprice'])&&isset($_POST['maxprice'])){
  $categoriefil = $_POST['categorie'];
  $prixmin= $_POST['minprice'];
  $prixmax = $_POST['maxprice'];
}else{
  $categoriefil = "";
  $prixmin = "";
  $prixmax = "";
}
$categories= getcategorie();
$produits= getproduits( $categoriefil, $prixmin, $prixmax );
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Anton&family=Arvo:ital,wght@0,400;0,700;1,400;1,700&family=Balsamiq+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Bebas+Neue&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Karla:ital,wght@0,200..800;1,200..800&family=Lilita+One&family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Oswald:wght@700&family=Playpen+Sans:wght@100..800&family=Playwrite+AU+SA:wght@100..400&family=Playwrite+BE+WAL+Guides&family=Playwrite+DE+VA+Guides&family=Playwrite+VN:wght@100..400&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Space+Grotesk:wght@300..700&family=Tenali+Ramakrishna&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./style/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our smartphones</title>
</head>
<body>
    <?php include_once 'nav.php' ?>
    <section>
  <div class="container-fluid">
    <div class="row">
      <!-- Filter Sidebar -->
      <div class="col-md-3 mb-4">
        <form action="product.php" method="post">
          <div class="card p-3">
            <h5>Filter</h5>

            <!-- Category Select -->
            <div class="mb-3">
              <label for="categorySelect" class="form-label">Category</label>
              <select id="categorySelect" class="form-select" name="categorie">
                <option value="">All Categories</option>
                <?php foreach ($categories as $categorie) : ?>
                  <option value="<?php echo $categorie['id'] ?>"> <?php echo $categorie['nom']; ?> </option>
                <?php endforeach ?>
              </select>
            </div>

            <!-- Price Range -->
            <div class="mb-3">
              <label for="minprice" class="form-label">Min Price</label>
              <input type="number" id="minprice" name="minprice" class="form-control" placeholder="?">
            </div>

            <div class="mb-3">
              <label for="maxprice" class="form-label">Max Price</label>
              <input type="number" id="maxprice" name="maxprice" class="form-control" placeholder="?">
            </div>

            <!-- Filter Button -->
            <button class="btn btn-primary w-100" type="submit">Apply Filter</button>
          </div>
        </form>
      </div>

      <!-- Product Cards Section -->
      <div class="col-md-9">
        <div class="row g-4">
          <?php foreach ($produits as $produit) : ?>
            <div class="col-sm-6 col-lg-3">
              <div class="card h-100 shadow-sm border-0 product-card">
                <div class="badge bg-primary position-absolute top-0 end-0 m-2">En stock</div>
                <img src="images/<?php echo $produit['image'] ?>" class="card-img-top" alt="Phone">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $produit['nom']; ?></h5>
                  <p class="text-muted">Apple</p>
                  <div class="d-flex justify-content-between align-items-center mb-2">
                    <h4 class="mb-0"><?php echo $produit['prix']; ?>€</h4>
                    <div class="text-warning">
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-fill"></i>
                      <i class="bi bi-star-half"></i>
                    </div>
                  </div>
                  <form action="">
                    <button type="submit" class="btn btn-primary w-100">
                      <i class="bi bi-cart-plus"></i> Add to Cart
                    </button>
                  </form>
                </div>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
</section>

 
</body>
</html>