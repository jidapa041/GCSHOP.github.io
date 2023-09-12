<?php
  if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
  }
?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle fs-5" href="#" role="button" data-bs-toggle="dropdown" style="color: rgb(255, 255, 255);"><i class="bi bi-person-circle me-1"></i><?= isset($_SESSION['role']) ? $_SESSION['firstname'] . " " . $_SESSION['lastname'] : "บัญชีผู้ใช้" ?></a>
            <ul class="dropdown-menu">
              <?php if (!isset($_SESSION['role'])) { ?>
                <li><a class="dropdown-item" href="admin/login.php">เข้าสู่ระบบ</a></li>
                <li><a class="dropdown-item" href="admin/fromregister.php">สมัครสมาชิก</a></li>
              <?php } else {?>
                <li><a class="dropdown-item" href="admin/login.php">โปรไฟล์</a></li>
                <li><a class="dropdown-item" href="?logout=true">ออกจากระบบ</a></li>
              <?php }?>
            </ul>
          </li>
        </ul>
        <a class="mx-2 fs-1 text-white"   href="cart.php"><i class="bi bi-cart4"></i></a>
        <form class="d-flex">
          <div class="input-group ">
            <input type="text" class="form-control" placeholder="Search">
            <button class="btn btn-light" type="submit"><i class="bi bi-search"></i></button>
          </div>

        </form>
      </div>
    </div>
  </nav>