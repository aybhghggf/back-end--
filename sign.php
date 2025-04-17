<?php
require_once 'db.php';
require_once 'functions.php';
if(!isset($_SESSION)){
    session_start();
}
if(isset($_GET['mg']) && $_GET['mg'] == 'err'){
    //alert dimiss
    echo "<script>alert('Error!');</script>";

}
if(isset($_POST['fullName'])&& isset($_POST['email']) &&isset($_POST['phone'])&&isset($_POST['password'])){
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    signup( $fullName, $email, $phone, $password );
    header('location:login.php?mg=suc');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up - TechStore</title>
  <link rel="stylesheet" href="./style/style.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat+Alternates:wght@400;500;600;700&display=swap" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="./style/style.css">
  
  </style>
</head>
<body>

<?php
include_once 'nav.php' ;
?>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="form-container">
        <div class="form-header">
          <h1 class="text-white fw-bold mb-2">Create Your Account</h1>
          <p class="text-white-50 mb-0">Join TechStore for exclusive deals and a seamless shopping experience</p>
        </div>
        
        <div class="form-body">
          <form action="sign.php" method="POST">
            <!-- Full Name -->
            <div class="form-floating mb-4">
              <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Full Name" required>
              <label for="fullName"><i class="bi bi-person me-2"></i>Full Name</label>
            </div>
            
            <!-- Email -->
            <div class="form-floating mb-4">
              <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
              <label for="email"><i class="bi bi-envelope me-2"></i>Email Address</label>
            </div>
            
            <!-- Phone Number -->
            <div class="form-floating mb-4">
              <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone Number" required>
              <label for="phone"><i class="bi bi-telephone me-2"></i>Phone Number</label>
            </div>
            
            <!-- Password -->
            <div class="mb-4">
              <div class="input-group">
                <div class="input-group-text"><i class="bi bi-lock"></i></div>
                <input type="password" class="form-control password-input" id="password" name="password" placeholder="Password" required>
                <span class="password-toggle" id="togglePassword">
                  <i class="bi bi-eye"></i>
                </span>
              </div>
              <div class="form-text mt-2">Password must be at least 8 characters with numbers and special characters.</div>
            </div>
            
            <!-- Confirm Password -->
            <div class="mb-4">
              <div class="input-group">
                <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                <input type="password" class="form-control password-input" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
                <span class="password-toggle" id="toggleConfirmPassword">
                  <i class="bi bi-eye"></i>
                </span>
              </div>
            </div>
            
            
            <!-- Submit Button -->
            <div class="d-grid">
              <button type="submit" class="btn btn-primary btn-lg btn-sign-up">
                <i class="bi bi-person-plus me-2"></i>Create Account
              </button>
            </div>
          </form>

          
          <!-- Login Link -->
          <div class="text-center mt-4">
            <p class="mb-0">Already have an account? <a href="login.php" class="text-primary fw-bold">Login here</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php 
include_once 'footer.php';
?>

<!-- Bootstrap & Custom JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="./scripts/script.js"></script>
</body>
</html>