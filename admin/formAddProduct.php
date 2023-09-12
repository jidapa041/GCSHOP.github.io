<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <?php
  @include('./adminpage.php');
  ?>
</head>

<body>
    
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
            <h1  style="text-align: center">Form Add Product</h1>
                <?php if (isset($_GET['act']) && $_GET['act'] == 'add'): ?>
                    <form method="post" enctype="multipart/form-data">
                        <div class="mb-2">
                            <div class="col-sm-9">
                                <select name="category" class="form-control" required>
                                <option value="">กรุณาเลือกหมวดหมู่</option>
                                    <option value="ผู้หญิง">ผู้หญิง</option>
                                    <option value="ผู้ชาย">ผู้ชาย</option>
                                    <option value="เด็ก">เด็ก</option>
                                    <option value="รองเท้า">รองเท้า</option>
                                    <option value="เครื่องสำอางค์">เครื่องสำอางค์</option>
                                    <option value="เครื่องประดับ">เครื่องประดับ</option>
                                  
                                    <?php
                        
                                    // require_once 'connect.php';
                                    // $stmt = $conn->prepare("SELECT DISTINCT category FROM tbl_product");
                                    // $stmt->execute();
                                    // $categories = $stmt->fetchAll(PDO::FETCH_COLUMN);
                                    // foreach ($categories as $category) {
                                        ?>
                                        <!-- <option value="<?= $category ?>"><?= $category ?></option> -->
                                    <?php
                                    // }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="product_name" class="formผ-label">Product Name</label>
                            <input type="text" name="product_name" required class="form-control"
                                placeholder="Product Name (Minimum 4 characters)" minlength="4">
                        </div>
                      
                        <div class="mb-3">
                            <label for="product_price" class="form-label">Product Price</label>
                            <input type="number" name="product_price" required class="form-control" min="0">
                        </div>
                        <div class="mb-3">
                            <label for="product_img" class="form-label">Product Image</label>
                            <input type="file" name="product_img" required class="form-control" accept=".jpeg, .jpg, .png">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">Add Product</button>
                            </div>
                            <div class="col-md-6">
                                <a href="formAddProduct.php" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </form>
                <?php endif; ?>

                <h3 class="my-4">Product Listing</h3>
                <a href="formAddProduct.php?act=add" class="btn btn-info btn-sm">+ Add Product</a>

                <table class="table table-striped table-hover table-bordered mt-4">
                    <thead>
                        <tr>


                            <th>ID</th>


                            <th>Image</th>
                            <th>Type</th>

                            <th>Product Name</th>

                          

                            <th class="text-center">Product Price</th>

                            <th class="text-center">Actions</th>
                        </tr>

                    </thead>


                    <tbody>


                        <?php
                        require_once 'connect.php';
                        $stmt = $conn->prepare("SELECT * FROM tbl_product");
                        $stmt->execute();
                        $result = $stmt->fetchAll();
                        foreach ($result as $row) {
                            ?>


                            <tr>




                                <td>
                                    <?= $row['product_id']; ?>
                                </td>




                                <td><img src="../img/<?= $row['product_img']; ?>" width="70" height="70"></td>


                                <td>
                                    <?= $row['category']; ?>
                                </td>

                                <td>
                                    <?= $row['product_name']; ?>
                                </td>

                              

                                <td class="text-right">
                                    <?= number_format($row['product_price'], 2); ?>
                                </td>


                                <td class="text-center">


                                    <a href="deleteProduct.php?product_id=<?= $row['product_id']; ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>




                                    <a href="editProductForm.php?product_id=<?= $row['product_id']; ?>"
                                        class="btn btn-primary btn-sm">Edit</a>


                                </td>


                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"
        integrity="sha384-k6iZLEb6R9kGm32O0Gm1zJvlHPqc6p4j9qW4j9W/v1g3c8VXHHfmxG2ExGZfipH1"
        crossorigin="anonymous"></script>
    <!-- SweetAlert JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
</body>

</html>


<?php

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit();



//ตรวจสอบตัวแปรที่ส่งมาจากฟอร์ม
if (isset($_POST['product_name']) && isset($_POST['product_price']) && $_POST['product_price'] >= 0) {
    //ไฟล์เชื่อมต่อฐานข้อมูล
    require_once 'connect.php';
    //สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ใหม่
    $date1 = date("Ymd_His");
    //สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
    $numrand = (mt_rand());
    $product_img = (isset($_POST['product_img']) ? $_POST['product_img'] : '');
    $upload = $_FILES['product_img']['name'];

    //มีการอัพโหลดไฟล์
    if ($upload != '') {
        //ตัดขื่อเอาเฉพาะนามสกุล
        $typefile = strrchr($_FILES['product_img']['name'], ".");

        //สร้างเงื่อนไขตรวจสอบนามสกุลของไฟล์ที่อัพโหลดเข้ามา
        if ($typefile == '.jpg' || $typefile == '.jpg' || $typefile == '.png') {

            //โฟลเดอร์ที่เก็บไฟล์
            $path = "../img/";
            //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
            $newname = $numrand . $date1 . $typefile;
            $path_copy = $path . $newname;
            //คัดลอกไฟล์ไปยังโฟลเดอร์
            move_uploaded_file($_FILES['product_img']['tmp_name'], $path_copy);

            //ประกาศตัวแปรรับค่าจากฟอร์ม
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $category = $_POST['category'];

            //sql insert
            $stmt = $conn->prepare("INSERT INTO tbl_product 
    (product_name,product_price, product_img,category)
    VALUES 
    (:product_name,:product_price, '$newname' ,:category)");
            //bindParam data type
            $stmt->bindParam(':product_name', $product_name, PDO::PARAM_STR);
            $stmt->bindParam(':product_price', $product_price, PDO::PARAM_INT);
            $stmt->bindParam(':category', $category, PDO::PARAM_STR);
            $result = $stmt->execute();
            $conn = null; //close connect db

            //เงื่อนไขตรวจสอบการเพิ่มข้อมูล
            if ($result) {
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
            } else {
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


        } else { //ถ้าไฟล์ที่อัพโหลดไม่ตรงตามที่กำหนด
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