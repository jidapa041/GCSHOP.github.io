<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <title>Basic PHP PDO Form add product by devbanban.com 2021</title>
        <!-- sweet alert  -->
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12"> <br>
                  <?php 
                  //ถ้ามีการส่งพารามิเตอร์ method get และ  method get ชือ act = add จะแสดงฟอร์มเพิ่มข้อมูล
                  if(isset($_GET['act']) && $_GET['act']=='add'){ ?>
                    <h3>PHP PDO ฟอร์มเพิ่มข้อมูลสินค้า </h3>
                    <form  method="post" enctype="multipart/form-data">
                      ชื่อสินค้า
                        <input type="text" name="product_name" required class="form-control" placeholder="ชื่อสินค้า ขั้นต่ำ 4 ตัว" minlength="4"> <br>
                        รายละเอียดสินค้า
                        <textarea name="product_detail" required class="form-control" placeholder="รายละเอียด"></textarea> <br>
                        ราคา
                        <input type="number" name="product_price" required class="form-control" min="0"> <br>
                         <font color="red">*อัพโหลดได้เฉพาะ .jpeg , .jpg , .png </font>
                        <input type="file" name="product_img" required   class="form-control" accept="image/jpeg, image/png, image/jpg"> <br>
                        <div class="row">
                        <div class="d-grid gap-2 col-sm-6">
                        <button type="submit" class="btn btn-primary">เพิ่มสินค้า</button>
                      </div>
                      <div class="d-grid gap-2 col-sm-6">
                        <a href="formAddProduct.php" class="btn btn-warning">ยกเลิก</a>
                      </div>
                    </div>
                        <br>
                    </form>
                  <?php } ?>
                    <h3>รายการสินค้า 
                    <a href="formAddProduct.php?act=add" class="btn btn-info btn-sm">+สินค้า</a> </h3>
                    <table class="table table-striped  table-hover table-responsive table-bordered">
                        <thead>
                            <tr>
                              
                                <th width="5%">ลำดับ</th>
                                <th width="10%">ภาพ</th>
                                <th width="25%">ชื่อสินค้า</th>
                                <th width="40%">รายละเอียด</th>
                                <th width="20%" class="text-center">ราคา</th>
                                <th width="10%">Actions</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //เรียกไฟล์เชื่อมต่อฐานข้อมูล
                            require_once 'connect.php';
                            //คิวรี่ข้อมูลมาแสดงในตาราง
                            $stmt = $conn->prepare("SELECT* FROM tbl_product");
                            $stmt->execute();
                            $result = $stmt->fetchAll();
                            foreach($result as $row) {
                            ?>
                            <tr>
                                <td><?= $row['product_id'];?></td>
                                 <td><img src="../img/<?= $row['product_img'];?>" width="70%"></td>
                                <td><?= $row['product_name'];?></td>
                                <td><?= $row['product_detail'];?></td>
                                <td align="right"><?= number_format($row['product_price'],2);?></td>
                                <td>
                                <a href="deleteProduct.php?product_id=<?= $row['product_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                                <a href="editProductForm.php?product_id=<?= $row['product_id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                </td>
                            <?php } ?>
                        </tbody>
                    </table>
                    <br>
                
                </div>
            </div>
        </div>
    </body>
</html>

<?php 

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit();



//ตรวจสอบตัวแปรที่ส่งมาจากฟอร์ม
if (isset($_POST['product_name']) && isset($_POST['product_price']) && $_POST['product_price'] >=0) {
  //ไฟล์เชื่อมต่อฐานข้อมูล
    require_once 'connect.php';
     //สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ใหม่
    $date1 = date("Ymd_His");
    //สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
    $numrand = (mt_rand());
    $product_img = (isset($_POST['product_img']) ? $_POST['product_img'] : '');
    $upload=$_FILES['product_img']['name'];

    //มีการอัพโหลดไฟล์
    if($upload !='') {
    //ตัดขื่อเอาเฉพาะนามสกุล
    $typefile = strrchr($_FILES['product_img']['name'],".");

    //สร้างเงื่อนไขตรวจสอบนามสกุลของไฟล์ที่อัพโหลดเข้ามา
    if($typefile =='.jpg' || $typefile  =='.jpg' || $typefile  =='.png'){

    //โฟลเดอร์ที่เก็บไฟล์
    $path="../img/";
    //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
    $newname = $numrand.$date1.$typefile;
    $path_copy=$path.$newname;
    //คัดลอกไฟล์ไปยังโฟลเดอร์
    move_uploaded_file($_FILES['product_img']['tmp_name'],$path_copy); 

     //ประกาศตัวแปรรับค่าจากฟอร์ม
    $product_name = $_POST['product_name'];
    $product_detail = $_POST['product_detail'];
    $product_price = $_POST['product_price'];
    
    //sql insert
    $stmt = $conn->prepare("INSERT INTO tbl_product 
    (product_name, product_detail, product_price, product_img)
    VALUES 
    (:product_name, :product_detail, :product_price, '$newname')");
    //bindParam data type
    $stmt->bindParam(':product_name', $product_name, PDO::PARAM_STR);
    $stmt->bindParam(':product_detail', $product_detail, PDO::PARAM_STR);
    $stmt->bindParam(':product_price', $product_price, PDO::PARAM_INT);
    $result = $stmt->execute();
    $conn = null; //close connect db

    //เงื่อนไขตรวจสอบการเพิ่มข้อมูล
          if($result){
                echo '<script>
                     setTimeout(function() {
                      swal({
                          title: "เพิ่มข้อมูลสำเร็จ",
                          type: "success"
                      }, function() {
                          window.location = "formAddProduct.php"; //หน้าที่ต้องการให้กระโดดไป
                      });
                    }, 1000);
                </script>';
            }else{
               echo '<script>
                     setTimeout(function() {
                      swal({
                          title: "เกิดข้อผิดพลาด",
                          type: "error"
                      }, function() {
                          window.location = "formAddProduct.php"; //หน้าที่ต้องการให้กระโดดไป
                      });
                    }, 1000);
                </script>';
            } //else ของ if result

        
        }else{ //ถ้าไฟล์ที่อัพโหลดไม่ตรงตามที่กำหนด
            echo '<script>
                         setTimeout(function() {
                          swal({
                              title: "คุณอัพโหลดไฟล์ไม่ถูกต้อง",
                              type: "error"
                          }, function() {
                              window.location = "formAddProduct.php"; //หน้าที่ต้องการให้กระโดดไป
                          });
                        }, 1000);
                    </script>';
        } //else ของเช็คนามสกุลไฟล์
   
    } // if($upload !='') {

    
    } //isset
?>