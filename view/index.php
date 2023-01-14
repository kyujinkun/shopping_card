<?php
error_reporting(0);
session_start();
require_once('../src/inc/connection.php');
use src\inc\connection;

$connection = new Connection;

$stmt = $connection->pdo->prepare("SELECT * FROM products");
$stmt->execute();


if (isset($_POST['id'], $_POST['add_product']) && !empty($_POST['add_product'])) {
  if (isset($_SESSION['card'])) {
    $array_column = array_column($_SESSION['card'], 'product_id');
    if (in_array($_POST['id'], $array_column)) {
      $_SESSION['already_exist'] = 'This Product is already added in the cart..!';
    } else {
      $count = count($_SESSION['card']);
      $id = array('product_id' => $_POST['id']);
      $_SESSION['card'][$count] = $id;

    }
  } else {
    $id = array('product_id' => $_POST['id']);
    $_SESSION['card'][0] = $id;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart</title>
  <!-- Bootstrap css file-->
  <link rel="stylesheet" href="style/bootstrap.min.css">
  <link rel="stylesheet" href="style/bootstrap.min.css.map">
  <!-- mormalize file-->
  <link rel="stylesheet" href="style/mormalize.css">
  <!-- Bootstrap icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <!-- main css file -->
  <link rel="stylesheet" href="style/style.css">
</head>

<body>
  <!-- navbar -->
  <?php
  require_once('navbar.php');
  ?>
  <!-- card -->
  <div class="container">
    <div class="row text-center py-5">
      <?php
      require_once('card.php');
      if ($stmt->rowCount()) {
        foreach ($stmt->fetchAll() as $value) {
          card(
            $value['product_image'],
            $value['product_name'],
            $value['product_description'],
            $value['product_old_price'],
            $value['product_new_price'],
            $value['id']
          );
        }
      }
      if (isset($_SESSION['already_exist']) && !empty($_SESSION['already_exist'])) {
        ?>
      <div class="text-danger">
        <?= $_SESSION['already_exist'] ?>
      </div>
      <?php
      }
      unset($_SESSION['already_exist']);
      // unset($_SESSION['card']);
      
      ?>
    </div>
  </div>
  <!-- bootstrap js file-->
  <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>