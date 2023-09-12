<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

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

  <!-- Navigation --> <!-- Carousel -->
  <div id="demo" class="carousel slide" data-bs-ride="carousel">

    <!-- Indicators/dots -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>

      <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="4"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="5"></button>
    </div>

    <!-- The slideshow/carousel -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="./assets/images/banner.png" alt="" class="d-block w-100">
      </div>
      <div class="carousel-item ">
        <img src="./assets/images/banner1.png" alt="" class="d-block w-100">
      </div>
      <div class="carousel-item">
        <img src="./assets/images/banner2.png" alt="" class="d-block w-100">
      </div>
      <div class="carousel-item">
        <img src="./assets/images/banner3.png" alt="" class="d-block w-100">
      </div>
      <div class="carousel-item">
        <img src="./assets/images/banner4.png" alt="" class="d-block w-100">
      </div>
    </div>

    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
  <br><br>

  <!-- contact section -->
  <section class="contact_section layout_padding">
    <div class="container-fluid d-flex justify-content-center" style="text-align: center;">
      <table>
        <tr>
          <td>
            <div class="card text-center m-1" style="width: 18rem; height: 23rem; overflow: hidden;">
              <img src="./assets/images/women.jpg" class="card-img-top"
                style="object-fit: cover; width: 100%; height: 100%;" alt="...">
            </div>

    </div>
    </td>
    <td>
    <div class="card text-center m-1" style="width: 18rem; height: 23rem; overflow: hidden;">
              <img src="./assets/images/men5.jpg" class="card-img-top"
                style="object-fit: cover; width: 100%; height: 100%;" alt="...">
            </div>
      </div>
    </td>
    <td>
    <div class="card text-center m-1" style="width: 18rem; height: 23rem; overflow: hidden;">
              <img src="./assets/images/kid2.png" class="card-img-top"
                style="object-fit: cover; width: 100%; height: 100%;" alt="...">
            </div>
     
    </td>
    <td>
    <div class="card text-center m-1" style="width: 18rem; height: 23rem; overflow: hidden;">
              <img src="./assets/images/women2.jpg" class="card-img-top"
                style="object-fit: cover; width: 100%; height: 100%;" alt="...">
            </div>
    
    </td>
    <td>
    <div class="card text-center m-1" style="width: 18rem; height: 23rem; overflow: hidden;">
              <img src="./assets/images/men3.jpg" class="card-img-top"
                style="object-fit: cover; width: 100%; height: 100%;" alt="...">
            </div>
    
    </td>
    </tr>

    <tr>
      <td>
      <div class="card text-center m-1" style="width: 18rem; height: 23rem; overflow: hidden;">
              <img src="./assets/images/kid4.png" class="card-img-top"
                style="object-fit: cover; width: 100%; height: 100%;" alt="...">
            </div>
    
      </td>
      <td>
      <div class="card text-center m-1" style="width: 18rem; height: 23rem; overflow: hidden;">
              <img src="./assets/images/women3.jpg" class="card-img-top"
                style="object-fit: cover; width: 100%; height: 100%;" alt="...">
            </div>
    
      </td>
      <td>
      <div class="card text-center m-1" style="width: 18rem; height: 23rem; overflow: hidden;">
              <img src="./assets/images/men4.jpg" class="card-img-top"
                style="object-fit: cover; width: 100%; height: 100%;" alt="...">
            </div>
    
      </td>
      <td>
      <div class="card text-center m-1" style="width: 18rem; height: 23rem; overflow: hidden;">
              <img src="./assets/images/kid5.png" class="card-img-top"
                style="object-fit: cover; width: 100%; height: 100%;" alt="...">
            </div>
    
      </td>
      <td>
      <div class="card text-center m-1" style="width: 18rem; height: 23rem; overflow: hidden;">
              <img src="./assets/images/women4.jpg" class="card-img-top"
                style="object-fit: cover; width: 100%; height: 100%;" alt="...">
            </div>
    
      </td>
    </tr>

    <tr>
      <td>
      <div class="card text-center m-1" style="width: 18rem; height: 23rem; overflow: hidden;">
              <img src="./assets/images/men12.jpg" class="card-img-top"
                style="object-fit: cover; width: 100%; height: 100%;" alt="...">
            </div>
      </td>
      <td>
      <div class="card text-center m-1" style="width: 18rem; height: 23rem; overflow: hidden;">
              <img src="./assets/images/kid3.png" class="card-img-top"
                style="object-fit: cover; width: 100%; height: 100%;" alt="...">
            </div>
    
      </td>
      <td>
      <div class="card text-center m-1" style="width: 18rem; height: 23rem; overflow: hidden;">
              <img src="./assets/images/women5.jpg" class="card-img-top"
                style="object-fit: cover; width: 100%; height: 100%;" alt="...">
            </div>
    
      </td>
      <td>
      <div class="card text-center m-1" style="width: 18rem; height: 23rem; overflow: hidden;">
              <img src="./assets/images/men17.jpg" class="card-img-top"
                style="object-fit: cover; width: 100%; height: 100%;" alt="...">
            </div>
    
      </td>
      <td>
      <div class="card text-center m-1" style="width: 18rem; height: 23rem; overflow: hidden;">
              <img src="./assets/images/kid6.png" class="card-img-top"
                style="object-fit: cover; width: 100%; height: 100%;" alt="...">
            </div>
    
      </td>
    </tr>
    </table>
    </div>
  </section>

  <!-- end contact section -->

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./assets/images/lower.png" alt="">
    </div>
  </div>

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
      </div>
    </div>
  </div>
</body>

</html>