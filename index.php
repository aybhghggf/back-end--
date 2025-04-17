<?php
require_once 'db.php';
require_once 'functions.php';
$produits = getproduits();
if (isset($_GET['mes']) && $_GET['mes'] == 'connecte') {
    echo '
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        ✅ Vous êtes connecté avec succès !
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}


?>


<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Site eCommerce</title>
  <!-- Lien vers Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Anton&family=Arvo:ital,wght@0,400;0,700;1,400;1,700&family=Balsamiq+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Bebas+Neue&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Karla:ital,wght@0,200..800;1,200..800&family=Lilita+One&family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Oswald:wght@700&family=Playpen+Sans:wght@100..800&family=Playwrite+AU+SA:wght@100..400&family=Playwrite+BE+WAL+Guides&family=Playwrite+DE+VA+Guides&family=Playwrite+VN:wght@100..400&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Space+Grotesk:wght@300..700&family=Tenali+Ramakrishna&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./style/style.css">
</head>

<body>

  <?php include_once 'nav.php' ?>

  <!-- Hero Section -->
  <div class="container-fluid" id="sec1">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 text-center text-lg-start mb-5 mb-lg-0">
          <h1 class="fw-bold text-body-emphasis" id="tit1">Explore the Best Smartphones from Leading Brands</h1>
          <p class="lead mb-4">Welcome to our online store, your go-to destination for the latest smartphones from top brands like Apple, Samsung, Xiaomi, and Oppo. We offer a wide selection of mobile phones, each carefully chosen to provide the best features, performance, and value for money.</p>
          <div class="d-grid gap-2 d-sm-flex justify-content-sm-start mb-5">
          </div>
        </div>
        <div class="col-lg-6">
          <img src="./images/ChatGPT Image 14 avr. 2025, 20_03_55.png" class="img-fluid rounded-4 shadow-lg" alt="Smartphones" loading="lazy">
        </div>
      </div>
    </div>
  </div>

  <!-- Featured Products -->
  <div class="container py-5">
    <h2 class="text-center mb-5 position-relative">Featured Smartphones
      <span class="position-absolute start-50 translate-middle-x" style="bottom: -15px; width: 80px; height: 3px; background: linear-gradient(90deg, var(--primary-color), var(--accent-color)); border-radius: 2px;"></span>
    </h2>
    <div class="row g-4">
      <?php foreach ($produits as $produit) : ?>
        <!-- Product 1 -->
        <div class="col-md-6 col-lg-3">
          <div class="card h-100 shadow-sm border-0 product-card">
            <div class="badge bg-primary position-absolute top-0 end-0 m-3">En stock</div>
            <img src="images/<?php echo $produit['image'] ?>" class="card-img-top" alt="Phone ">
            <div class="card-body">
              <h5 class="card-title"><?php echo $produit['nom']; ?></h5>
              <p class="text-muted">Apple</p>
              <div class="d-flex justify-content-between align-items-center mb-2">
                <h4 class="mb-0"> <?php echo $produit['prix']; ?>€</h4>
                <div class="text-warning">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-half"></i>
                </div>
              </div>

            </div>
          </div>
        </div>
      <?php endforeach ?>
      <div class="text-center mt-5">
        <a href="product.php" class="btn btn-outline-primary btn-lg">View All Products</a>
      </div>
    </div>

    <!-- Testimonials Section -->
    <div class="bg-light">
      <div class="container py-5">
        <h2 class="text-center mb-5">What Our Customers Say</h2>
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="testimonial-card p-4 p-md-5">
                    <i class="bi bi-quote fs-1 text-primary position-absolute top-0 start-0 mt-3 ms-3 opacity-25"></i>
                    <div class="text-center mb-4">
                      <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Avatar" class="avatar mb-3">
                      <h5 class="mb-1">Emma Thompson</h5>
                      <p class="text-muted mb-0">Marketing Manager</p>
                    </div>
                    <p class="lead text-center mb-0">"Ce produit a complètement transformé notre manière de travailler.
                      Il est intuitif, puissant, et c'est un réel plaisir de l'utiliser chaque jour.
                      Je ne peux plus imaginer gérer notre entreprise sans lui."</p>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="testimonial-card p-4 p-md-5">
                    <i class="bi bi-quote fs-1 text-primary position-absolute top-0 start-0 mt-3 ms-3 opacity-25"></i>
                    <div class="text-center mb-4">
                      <img src="https://randomuser.me/api/portraits/men/47.jpg" alt="Avatar" class="avatar mb-3">
                      <h5 class="mb-1">Michael Chen</h5>
                      <p class="text-muted mb-0">Software Engineer</p>
                    </div>
                    <p class="lead text-center mb-0">"Le service client est tout simplement exceptionnel.
                      À chaque fois que j'ai eu une question ou un souci, l'équipe a réagi rapidement et a toujours fait plus que nécessaire pour m'aider."</p>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="testimonial-card p-4 p-md-5">
                    <i class="bi bi-quote fs-1 text-primary position-absolute top-0 start-0 mt-3 ms-3 opacity-25"></i>
                    <div class="text-center mb-4">
                      <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Avatar" class="avatar mb-3">
                      <h5 class="mb-1">Sophia Rodriguez</h5>
                      <p class="text-muted mb-0">Small Business Owner</p>
                    </div>
                    <p class="lead text-center mb-0">"En tant que propriétaire d'une petite entreprise, j'étais hésitant à investir dans un nouveau logiciel, mais celui-ci a largement rentabilisé son coût. C'est un véritable changement pour l'efficacité de mon entreprise."</p>
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Features Section -->
    <div class="container py-5">
      <h2 class="text-center mb-5 position-relative">Why Choose Us
        <span class="position-absolute start-50 translate-middle-x" style="bottom: -15px; width: 80px; height: 3px; background: linear-gradient(90deg, var(--primary-color), var(--accent-color)); border-radius: 2px;"></span>
      </h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm text-center p-4">
            <div class="mb-4">
              <i class="bi bi-truck text-primary" style="font-size: 3rem;"></i>
            </div>
            <h4>Free Shipping</h4>
            <p class="text-muted">Free shipping on all orders over €100. Fast delivery across Europe.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm text-center p-4">
            <div class="mb-4">
              <i class="bi bi-shield-check text-primary" style="font-size: 3rem;"></i>
            </div>
            <h4>2-Year Warranty</h4>
            <p class="text-muted">All our smartphones come with a full 2-year warranty for your peace of mind.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm text-center p-4">
            <div class="mb-4">
              <i class="bi bi-headset text-primary" style="font-size: 3rem;"></i>
            </div>
            <h4>24/7 Support</h4>
            <p class="text-muted">Our customer service team is available around the clock to help you with any questions.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Newsletter -->
    <div class="bg-primary text-white py-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8 text-center">
            <h3 class="mb-4">Subscribe to Our Newsletter</h3>
            <p class="mb-4">Stay updated with the latest smartphone releases, exclusive deals, and tech news.</p>
            <form class="row g-3 justify-content-center">
              <div class="col-md-8">
                <input type="email" class="form-control form-control-lg" placeholder="Your email address">
              </div>
              <div class="col-md-auto">
                <button type="submit" class="btn btn-light btn-lg px-4">Subscribe</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5 container-fluid">
      <div class="">
        <div class="row g-4">
          <div class="col-lg-4">
            <h5 class="mb-3">About TechStore</h5>
            <p class="text-white-50">We are dedicated to bringing you the best smartphones and accessories with exceptional customer service and competitive prices.</p>
            <div class="mt-3">
              <a href="#" class="text-white me-3"><i class="bi bi-facebook fs-5"></i></a>
              <a href="#" class="text-white me-3"><i class="bi bi-instagram fs-5"></i></a>
              <a href="#" class="text-white me-3"><i class="bi bi-twitter-x fs-5"></i></a>
              <a href="#" class="text-white"><i class="bi bi-youtube fs-5"></i></a>
            </div>
          </div>
          <div class="col-lg-2">
            <h5 class="mb-3">Quick Links</h5>
            <ul class="list-unstyled">
              <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Home</a></li>
              <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Shop</a></li>
              <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">About Us</a></li>
              <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Contact</a></li>
              <li><a href="#" class="text-white-50 text-decoration-none">Blog</a></li>
            </ul>
          </div>
          <div class="col-lg-3">
            <h5 class="mb-3">Customer Service</h5>
            <ul class="list-unstyled">
              <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Orders & Returns</a></li>
              <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Shipping Information</a></li>
              <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Warranty Policy</a></li>
              <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">FAQs</a></li>
              <li><a href="#" class="text-white-50 text-decoration-none">Privacy Policy</a></li>
            </ul>
          </div>
          <div class="col-lg-3">
            <h5 class="mb-3">Contact Us</h5>
            <ul class="list-unstyled text-white-50">
              <li class="mb-2"><i class="bi bi-geo-alt me-2"></i> 123 Tech Street, Paris, France</li>
              <li class="mb-2"><i class="bi bi-telephone me-2"></i> +33 1 23 45 67 89</li>
              <li class="mb-2"><i class="bi bi-envelope me-2"></i> info@techstore.com</li>
              <li><i class="bi bi-clock me-2"></i> Mon-Fri: 9:00 AM - 6:00 PM</li>
            </ul>
          </div>
        </div>
        <hr class="mt-4 mb-3">
        <div class="row">
          <div class="col-md-6 text-center text-md-start">
            <p class="mb-0">&copy; 2025 TechStore. Tous droits réservés.</p>
          </div>
          <div class="col-md-6 text-center text-md-end mt-3 mt-md-0">
            <img src="/api/placeholder/250/30" alt="Payment Methods" class="img-fluid" style="max-height: 30px;">
          </div>
        </div>
      </div>
    </footer>

    <!-- Lien vers les scripts Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="./scripts/script.js"></script>

    <!-- Custom JavaScript -->