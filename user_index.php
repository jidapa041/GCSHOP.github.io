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
  <!-- Featured Starts Here -->
  <!-- contact section -->
  <section class="contact_section layout_padding">
    <div class="container-fluid d-flex justify-content-center" style="text-align: center;">
      <table>
        <tr>
          <td>
            <div class="card text-center m-1" style="width: 18rem; height: 23rem;">
              <img src="./assets/images/derss1.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">
                  เตียงผู้สูงอายุ และ
                  <br>
                  อุปกรณ์สำหรับเตียง
                </p>
              </div>
            </div>
          </td>
          <td>
            <div class="card text-center m-1 d-flex" style="width: 18rem; height: 23rem;">
              <img src="./assets/images/derss2.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">
                  ที่นอน ป้องกันแผลกดทับ
                </p>
              </div>
            </div>
          </td>
          <td>
            <div class="card text-center m-1 d-flex" style="width: 18rem; height: 23rem;">
              <img src="./assets/images/derss3.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">
                  เครื่องผลิตออกซิเจน
                </p>
              </div>
            </div>
          </td>
          <td>
            <div class="card text-center m-1 d-flex" style="width: 18rem; height: 23rem;">
              <img src="images/wheelchairs.png" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">
                  รถเข็น ผู้ป่วยและผู้ช่วย
                </p>
              </div>
            </div>
          </td>
          <td>
            <div class="card text-center m-1 d-flex" style="width: 18rem; height: 23rem;">
              <img src="images/oxygen.png" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">
                  ถังออกซิเจน
                </p>
              </div>
            </div>
          </td>
        </tr>

        <tr>
          <td>
            <div class="card text-center m-1 d-flex" style="width: 18rem; height: 23rem;">
              <img src="images/img6.png" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">
                  เครื่องดูเสมหะ
                </p>
              </div>
            </div>
          </td>
          <td>
            <div class="card text-center m-1 d-flex" style="width: 18rem; height: 23rem;">
              <img src="images/Citizen.png" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">
                  เครื่องวัดความดัน
                </p>
              </div>
            </div>
          </td>
          <td>
            <div class="card text-center m-1 d-flex" style="width: 18rem; height: 23rem;">
              <img src="images/NB500.webp" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">
                  เครื่องพ่นละอองยา
                </p>
              </div>
            </div>
          </td>
          <td>
            <div class="card text-center m-1 d-flex" style="width: 18rem; height: 23rem;">
              <img src="images/fingertip.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">
                  เครื่องวัดออกซิเจนปลายนิ้ว
              </div>
            </div>
          </td>
          <td>
            <div class="card text-center m-1 d-flex" style="width: 18rem; height: 23rem;">
              <img src="images/infraredther.png" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">
                  เครื่องวัดอุณหภูมิร่างกาย
              </div>
            </div>
          </td>
        </tr>

        <tr>
          <td>
            <div class="card text-center m-1 d-flex" style="width: 18rem; height: 23rem;">
              <img src="..." class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">
                  เครื่องวัดระดับน้ำตาลในเลือด
                </p>
              </div>
            </div>
          </td>
          <td>
            <div class="card text-center m-1 d-flex" style="width: 18rem; height: 23rem;">
              <img src="..." class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">
                  เครื่องติดตามสัญญาณชีพ
                  <br>
                  Patient Monitor
                </p>
              </div>
            </div>
          </td>
          <td>
            <div class="card text-center m-1 d-flex" style="width: 18rem; height: 23rem;">
              <img src="..." class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">
                  Infusion Pump / Enteral
                  <br>
                  Feeding Pump
                </p>
              </div>
            </div>
          </td>
          <td>
            <div class="card text-center m-1 d-flex" style="width: 18rem; height: 23rem;">
              <img src="..." class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">
                  เครื่องกระตุกหัวใจไฟฟ้า AED
                </p>
              </div>
            </div>
          </td>
          <td>
            <div class="card text-center m-1 d-flex" style="width: 18rem; height: 23rem;">
              <img src="..." class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">
                  เครื่องช่วยหายใจแรงดันบวก
                  <br>
                  CPAP, BiPAP
                </p>
              </div>
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
  <!-- Subscribe Form Starts Here -->

  <!-- Subscribe Form Ends Here -->



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
              <li><a href="#">Home</a></li>
              <li><a href="#">Help</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">How It Works ?</a></li>
              <li><a href="#">Contact Us</a></li>
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
            <p>Copyright &copy; 2019 Company Name

              - Design: <a rel="nofollow" href="https://www.facebook.com/tooplate">Tooplate</a></p>
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

  <script>
    $(document).ready(function () {
      $('.multiple-items').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        autoplay: true
      });
    });
  </script>


</body>

</html>