<?php
function card($img_path, $title, $description, $old_price, $new_price, $product_id)
{
  ?>
<div class="col-md-3 col-sm-6 my-3">
  <form action="index.php" class="card shadow" method="POST">
    <input type="hidden" name="id" value="<?= $product_id ?>">
    <img src="<?= $img_path ?>" alt="Product_one" class="bg-img card-img-top">
    <div class="card-body">
      <h5 class="card-title fw-bold">
        <?= $title ?>
      </h5>
      <h6>
        <i class="star bi bi-star-fill"></i>
        <i class="star bi bi-star-fill"></i>
        <i class="star bi bi-star-fill"></i>
        <i class="star bi bi-star-half"></i>
        <i class="star bi bi-star"></i>
      </h6>
      <p class="fw-light card-text">
        <?= $description ?>
      </p>
      <p class="card-text"><span class="fs-6 text-decoration-line-through">$<?= $old_price ?></span><span
          class=" mx-2 fs-5 fw-bold">$<?= $new_price ?></span></p>
      <button type="submit" class="btn btn-primary my-3" name="add_product" value="add_product">Add To Card <i
          class="bi bi-cart-plus-fill"></i>
      </button>
    </div>
  </form>
</div>
<?php
}

function card_element($product_img, $product_name, $product_description, $product_new_price, $product_id)
{ ?>
<form action="shipping.php?action=remove&id=<?= $product_id ?>" method="POST" class="cart-items my-3">
  <div class="border rounded">
    <div class="row bg-white">
      <div class="col-md-3 px-0">
        <img src="<?php echo $product_img ?>" alt="product1" class="img img-fluid paid-img border border-start-0">
      </div>
      <div class=" col-md-6">
        <h5 class="pt-2">
          <?php echo ($product_name) ?>
        </h5>
        <small class="text-secondary p-2">
          <?php echo ($product_description) ?>
        </small>
        <h5 class="p-3">
          $
          <span class="productPrice">
            <?php echo ($product_new_price) ?>
          </span>
        </h5>

        <button type="submit" class="btn btn-warning m-3 py-2">Save For Later</button>
        <button type="submit" class="btn btn-danger m-3 py-2" name="remove">
          remove
        </button>
      </div>
      <div class="col-md-3 py-5">
        <i class="bi bi-dash-circle-fill remove" type=button></i>
        <input type="text" name="" value="1" class="form-control w-25 d-inline text-center product">
        <i class="bi bi-plus-circle-fill add" type=button></i>
      </div>
    </div>
  </div>

</form>

<?php
} ?>
