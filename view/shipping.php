<?php
error_reporting(0);
session_start();
require_once('../src/inc/connection.php');
use src\inc\connection;


$connection = new Connection;

$stmt = $connection->pdo->prepare("SELECT * FROM products");
$stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Advanced Shopping Cart</title>
  <link rel="stylesheet" href="style/bootstrap.min.css">
  <link rel="stylesheet" href="style/bootstrap.min.css.map">
  <!-- mormalize file-->
  <link rel="stylesheet" href="style/mormalize.css">
  <!-- Bootstrap icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <!-- main css file -->
  <link rel="stylesheet" href="style/style.css">
</head>

<body class="bg-light">
  <?php
  require_once('navbar.php');
  require_once('card.php');
  ?>
  <div class="container-fluid">
    <div class="row px-5 mt-5">
      <div class="col-md-7">
        <div class="shopping-cart">
          <h6>My Cart</h6>

          <hr>
          <?php
          if ($stmt->rowCount()) {
            if (isset($_SESSION['card'])) {
              $total_price = 0;
              $product_id = array_column($_SESSION['card'], 'product_id');
              foreach ($stmt->fetchAll() as $value) {
                foreach ($product_id as $id) {
                  if ($value['id'] == $id) {
                    card_element(
                      $value['product_image'],
                      $value['product_name'],
                      $value['product_description'],
                      $value['product_new_price'],
                      $value['id']
                    );
                    $total_price = $total_price + (int) $value['product_new_price'];
                  }
                }
                if (isset($_POST['remove'])) {
                  if ($_GET['action'] === 'remove') {
                    foreach ($_SESSION['card'] as $key => $row) {
                      if ($row['product_id'] == $_GET['id']) {
                        unset($_SESSION['card'][$key]);
                      }
                    }
                  }
                }
              }
            } elseif (empty($_SESSION['card'])) {
              ?>
          <h3 class="text-center fw-bold text-danger">You don't have any product in your basket</h3>
          <?php
            }
          }
          ?>
        </div>
      </div>
      <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25 pb-3">
        <div class="pt-4">
          <h6>Price Details</h6>

          <hr>
          <div class="row price-details">
            <div class="col-md-6">
              <h6 class="py-2">
                <?php
                if (isset($_SESSION['card'])) {
                  $count = count($_SESSION['card']);
                  echo "Price ($count items)";
                } else {
                  echo "Price ( 0 items)";
                }
                ?>
              </h6>
              <h6>Delivery Charges</h6>
              <hr>
              <h6>Amount Payable</h6>
            </div>
            <div class="col-md-6">
              <h6 class="py-2">$ <span class="totalPrice">
                  <?= $total_price ?>
                </span></h6>
              <h6 class="text-success">Free Shipping</h6>
              <hr>
              <h6>$ <span class="totalPrice">
                  <?= $total_price ?>
                </span></h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--bootstrap js file-->
  <script src="js/bootstrap.bundle.min.js"></script>
  <!-- main js file -->
  <script src="js/main.js"></script>
</body>
