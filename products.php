<?php
  @session_start();
?>
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

 
  <div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
      <div class="col-lg-4 col-md-6 pb-1">
        <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">

          <a href="single-product.php?category=ผู้หญิง" class="cat-img position-relative overflow-hidden mb-3">
            <img class="img-fluid" src="./assets/images/women.png" alt="">
          </a>
          <h3 style="text-align: center;" class="font-weight-semi-bold m-0">Women</h3>
        </div>
      </div>
     
      <div class="col-lg-4 col-md-6 pb-1">
        <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">

          <a href="single-product.php?category=ผู้ชาย" class="cat-img position-relative overflow-hidden mb-3">
            <img class="img-fluid" src="./assets/images/men.png" alt="">
          </a>
          <h3 style="text-align: center;" class="font-weight-semi-bold m-0">Men</h3>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 pb-1">
        <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">

          <a href="single-product.php?category=เด็ก" class="cat-img position-relative overflow-hidden mb-3">
            <img class="img-fluid" src="./assets/images/kid.jpg" alt="">
          </a>
          <h3 style="text-align: center;" class="font-weight-semi-bold m-0">Kids</h3>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 pb-1">
        <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">

          <a href="single-product.php?category=รองเท้า" class="cat-img position-relative overflow-hidden mb-3">
            <img class="img-fluid" src="./assets/images/shoes.png" alt="">
          </a>
          <h3 style="text-align: center;" class="font-weight-semi-bold m-0">Shoes</h3>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 pb-1">
        <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
          <a href="single-product.php?category=เครื่องสำอางค์" class="cat-img position-relative overflow-hidden mb-3">
            <img class="img-fluid" src="./assets/images/beauty.png" alt="">
          </a>
          <h3 style="text-align: center;" class="font-weight-semi-bold m-0">Beauty</h3>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 pb-1">
        <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">

          <a href="single-product.php?category=เครื่องประดับ" class="cat-img position-relative overflow-hidden mb-3">
            <img class="img-fluid" src="./assets/images/mekaup.jpg" alt="">
          </a>
          <h3 style="text-align: center;" class="font-weight-semi-bold m-0">Decorations</h3>
        </div>
      </div>
    </div>
  </div>
  </div>

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./assets/images/lower.png" alt="">
    </div>
  </div>

  <!-- Footer Starts Here -->
  <div class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="logo">
            <img src="assets/images/header-logo.png" alt="">
          </div>
        </div>
        <div class="col-md-12">
          <div class="footer-menu">
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="contact.php">Contact Us</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-12">
          <div class="social-icons">
            <ul>
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#"><i class="fa fa-rss"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer Ends Here -->


  <!-- Sub Footer Starts Here -->
  <div class="sub-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="copyright-text">
            <font size = 3px>วันทำการ GC SHOP วันจันทร์-เสาร์ เวลา 10:00-18:00</font>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Sub Footer Ends Here -->


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <!-- Additional Scripts -->
  <script src="assets/js/custom.js"></script>
  <script src="assets/js/owl.js"></script>
  <script src="assets/js/isotope.js"></script>


  <script language="text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t) {                   //declaring the array outside of the
      if (!cleared[t.id]) {                      // function makes it static and global
        cleared[t.id] = 1;  // you could use true and false, but that's more typing
        t.value = '';         // with more chance of typos
        t.style.color = '#fff';
      }
    }
  </script>


</body>

</html>