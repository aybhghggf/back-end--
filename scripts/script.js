document.querySelectorAll('.btn-primary').forEach(button => {
    button.addEventListener('click', function(e) {
      if (this.innerHTML.includes('Add to Cart')) {
        e.preventDefault();
        this.innerHTML = '<i class="bi bi-check-lg"></i> Added to Cart';
        this.classList.add('btn-success');
        
        setTimeout(() => {
          this.innerHTML = '<i class="bi bi-cart-plus"></i> Add to Cart';
          this.classList.remove('btn-success');
        }, 2000);
      }
    });
  });
  
  // Product card hover effect
  document.querySelectorAll('.product-card').forEach(card => {
    card.addEventListener('mouseenter', function() {
      this.style.transform = 'translateY(-10px)';
      this.style.boxShadow = '0 10px 25px rgba(0, 0, 0, 0.15)';
      this.style.transition = 'all 0.3s ease';
    });
    
    card.addEventListener('mouseleave', function() {
      this.style.transform = 'translateY(0)';
      this.style.boxShadow = '0 4px 6px rgba(0, 0, 0, 0.1)';
    });
  });
  document.getElementById('togglePassword').addEventListener('click', function() {
    const passwordInput = document.getElementById('password');
    const icon = this.querySelector('i');
    
    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      icon.classList.remove('bi-eye');
      icon.classList.add('bi-eye-slash');
    } else {
      passwordInput.type = 'password';
      icon.classList.remove('bi-eye-slash');
      icon.classList.add('bi-eye');
    }
  });
  
  document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
    const confirmPasswordInput = document.getElementById('confirmPassword');
    const icon = this.querySelector('i');
    
    if (confirmPasswordInput.type === 'password') {
      confirmPasswordInput.type = 'text';
      icon.classList.remove('bi-eye');
      icon.classList.add('bi-eye-slash');
    } else {
      confirmPasswordInput.type = 'password';
      icon.classList.remove('bi-eye-slash');
      icon.classList.add('bi-eye');
    }
  });
  
  // Form validation
  const form = document.querySelector('form');
  const password = document.getElementById('password');
  const confirmPassword = document.getElementById('confirmPassword');
  
  form.addEventListener('submit', function(event) {
    if (password.value !== confirmPassword.value) {
      event.preventDefault();
      alert('Passwords do not match!');
    }
    
    if (password.value.length < 8) {
      event.preventDefault();
      alert('Password must be at least 8 characters long!');
    }
  });