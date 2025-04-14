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