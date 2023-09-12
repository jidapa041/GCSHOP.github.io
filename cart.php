<?php
session_start();

if (isset($_POST["clear_cart"])) {
    unset($_SESSION["cart"]);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ตะกร้าสินค้า</title>
  <?php
  @include('components/head.php');
  ?>
</head>


<body>
<?php
  @include('components/navbar.php');
  @include('components/menu.php');
?>
  <div class="container mt-5">
    <h2 class="mb-4">ตะกร้าสินค้า</h2>
    <div class="row">
      <div class="col-md-12">
        <?php
        if (!isset($_SESSION["cart"]) || count($_SESSION["cart"]) === 0) {
          echo '<p class="text-center">ไม่มีสินค้าในตะกร้า</p>';
        } else {
          echo '<table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>ชื่อสินค้า</th>
                      <th>ไซส์</th>
                      <th>จำนวน</th>
                      <th>ราคาต่อชิ้น</th>
                      <th>รวม</th>
                    </tr>
                  </thead>
                  <tbody>';
          $totalPrice = 0;
          foreach ($_SESSION["cart"] as $item) {
            $product_name = isset($item["product_name"]) ? $item["product_name"] : "N/A";
            $size = isset($item["more"]) ? $item["more"] : "N/A";
            $quantity = isset($item["quantity"]) ? $item["quantity"] : 0;
            $product_price = isset($item["product_price"]) ? $item["product_price"] : 0;
            $subtotal = isset($item["subtotal"]) ? $item["subtotal"] : 0;

            echo '<tr>
                    <td>' . $product_name . '</td>
                    <td>' . $size . '</td>
                    <td>' . $quantity . '</td>
                    <td>' . number_format($product_price, 2) . ' บาท</td>
                    <td>' . number_format($subtotal, 2) . ' บาท</td>
                  </tr>';
            $totalPrice += $subtotal;
          }
          echo '</tbody>
                </table>
                <p class="text-end fs-5">รวมทั้งหมด: ' . number_format($totalPrice, 2) . ' บาท</p>
                <div class="text-center">
                  <a href="order.php" class="btn btn-primary">สั่งซื้อสินค้า</a>
                </div>';
        }
        ?>
      </div>
      <div class="text-center mt-4">
    <form method="post" action="">
        <button type="submit" name="clear_cart" class="btn btn-danger">เคลียร์ตะกร้า</button>
    </form>
</div>

    </div>
  </div>
</body>
</html>
