<!DOCTYPE html>
<html lang="en">

<head>
  <title>Pixie - Ecommerce HTML5 Template</title>
  <?php
  @include('components/head.php');
  ?>
</head>

<body>
  <?php
  @include('components/navbar.php');
  @include('components/menu.php');
  ?>
  <!-- Navigation -->

  <br><br>
  <!-- Page Content -->

  <!-- Single Starts Here -->
  <!-- <section class="contact_section layout_padding"> -->
    <div class="container" style="text-align: center;">
    <div class="row">

  

    
    <?php

     
      require_once 'admin/connect.php';
      $category = isset($_GET['category'])?$_GET['category']:null;
      $stmt = $category != null ?$conn->prepare("SELECT * FROM tbl_product WHERE category = :category "): $conn->prepare("SELECT * FROM tbl_product");
      $stmt->bindParam(':category', $category, PDO::PARAM_STR);
      $stmt->execute();
      $result = $stmt->fetchAll();
      foreach ($result as $row) {
  ?>
<div class="col-md-3  p-1">

  <div class=" card text-center m-1 d-flex" style="width: auto; height: auto;">
    <img src="img/<?= $row['product_img']; ?>" class="card-img-top" alt="...">
    <div class="card-body">
      <p class="card-text">
       
      <?= $row['product_name']; ?>
        <br>
        <?= $row['product_price']; ?>
      </p>
      <a href="productDetail.php?product_id=<?=$row['product_id'];?>" class="btn btn-outline-dark">ดูราละเอียด</a>
    </div>
  </div>
</div>
      <?php 
      }
       ?>
  </div>

    </div>
  <!-- </section> -->

</body>

</html>