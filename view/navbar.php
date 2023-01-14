<?php
session_start();
?>
<nav class="navbar bg-dark ">
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <h2 class="fw-bold text-light d-flex justify-content-center align-item-center"><i class="bi bi-basket2 mx-2"></i>
        Shopping Cart</h2>
    </a>
    <a class="navbar-brand" href="shipping.php">
      <h4 class="text-light d-flex justify-content-center align-item-center"><i class="bi bi-cart-fill mx-2"></i> Cart
        <span class="text-warning mx-3 bg-light px-3 rounded-5">
          <?php
          if (isset($_SESSION['card']) && !empty($_SESSION['card'])) {
            echo count($_SESSION['card']);
          } else {
            echo 0;
          }
          ?>
        </span>
      </h4>
    </a>
  </div>
</nav>