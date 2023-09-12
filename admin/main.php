<?php
session_start();
echo '
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
//เช็คว่ามีตัวแปร session อะไรบ้าง
//print_r($_SESSION);
//exit();
//สร้างเงื่อนไขตรวจสอบสิทธิ์การเข้าใช้งานจาก session
if(empty($_SESSION['id']) && empty($_SESSION['firstname']) && empty($_SESSION['lastname'])){
            echo '<script>
                setTimeout(function() {
                swal({
                title: "คุณไม่มีสิทธิ์ใช้งานหน้านี้",
                type: "error"
                }, function() {
                window.location = "login.php"; //หน้าที่ต้องการให้กระโดดไป
                });
                }, 1000);
                </script>';
            exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <title>Basic Login PHP PDO by devbanban.com 2021</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12"> <br>
                    <h3>Backend</h3>
                </div>
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                            สมาชิกลูกค้า
                        </a>
                        <a href="" class="list-group-item list-group-item-action">เพิ่มข้อมูลสินค้า</a>
                        <a href="../test_backend.php" class="list-group-item list-group-item-action">การชำระเงิน</a>
                        <a href="./logout.php" class="list-group-item list-group-item-danger">ออกจากระบบ</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <h1 class="text-center">Main Content</h1>
                    <h5 class="text-center">สวัสดีคุณ <?= $_SESSION['firstname'].' '.$_SESSION['lastname'];?></h5>
                </div>
            </div>
        </div>
        <center>Basic Login PHP PDO by devbanban.com 2021</center>
    </body>
</html>
