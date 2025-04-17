<?php 
require_once 'db.php';

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_GET['mg']) && $_GET['mg'] == 'suc') {
    echo '<script>alert("Votre compte a été créé");</script>';
}

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $req = "SELECT * FROM `users` WHERE `email` = ? AND `password` = ?";
    $stmt = $pdo->prepare($req);
    $stmt->execute([$email, $password]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['user'] = $user['fullname'];
        $_SESSION['email_user'] = $user['email'];
        $_SESSION['id_user'] = $user['id'];
        header('Location:index.php?mes=connecte');
        exit;
    } else {
        header('Location: login.php?error=1');
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login in</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="./style/style.css">
</head>
<body style="font-family: 'Poppins', sans-serif; background-color: #f9f9f9;">

  <?php include_once 'nav.php' ?>

  <!-- Login Form Container -->
  <div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="col-md-6 col-lg-5 shadow p-5 bg-white rounded-4">
      <h2 class="mb-4 text-center">Log in</h2>
      <form action="login.php" method="POST">

        <!-- Email -->
        <div class="form-floating mb-4">
          <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
          <label for="email"><i class="bi bi-envelope me-2"></i>Email Address</label>
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

        <!-- Submit Button -->
        <div class="d-grid">
          <button type="submit" class="btn btn-primary btn-lg btn-sign-up">
            <i class="bi bi-person-plus me-2"></i>Create Account
          </button>
        </div>
      </form>

      <!-- Login Link -->
      <div class="text-center mt-4">
        <p class="mb-0"> Don't have an account? 
          <a href="login.php" class="text-primary fw-bold">Login here</a>
        </p>
      </div>
    </div>
  </div>

  <?php include_once 'footer.php' ?>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  <script src="./scripts/script.js"></script>
</body>
</html>
