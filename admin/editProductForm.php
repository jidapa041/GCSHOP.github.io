<?php
if (isset($_GET['product_id']) && is_numeric($_GET['product_id'])) {
    // Retrieve the product_id from the URL parameter
    $product_id = $_GET['product_id'];

    // Include the database connection script
    require_once 'connect.php';

    // Query to retrieve the product details
    $stmt = $conn->prepare("SELECT * FROM tbl_product WHERE product_id = :product_id");
    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the product exists
    if (!$product) {
        // Redirect to an error page or handle non-existing product accordingly
    }
} else {
    // Redirect to an error page or handle invalid input accordingly
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product - Basic PHP PDO Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3 class="mb-4">Edit Product</h3>
                <form action="editProduct.php" method="post" enctype="multipart/form-data">
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
                        
                                    // คิวรีหมวดหมู่สินค้าจากฐานข้อมูล
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
                        <label for="product_name" class="form-label">Product Name</label>
                        <input type="text" name="product_name" value="<?= $product['product_name']; ?>" class="form-control" required>
                    </div>
                    <!-- <div class="mb-3">
                        <label for="product_detail" class="form-label">Product Detail</label>
                        <textarea name="product_detail" class="form-control" required><?//= $product['product_detail']; ?></textarea>
                    </div> -->
                    <div class="mb-3">
                        <label for="product_price" class="form-label">Product Price</label>
                        <input type="number" name="product_price" value="<?= $product['product_price']; ?>" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="product_img" class="form-label">Product Image</label>
                        <input type="file" name="product_img" accept="image/jpeg, image/png, image/jpg" class="form-control">
                    </div>
                    <button type="submit" name="product_id" value = "<?= $product['product_id']; ?>" class="btn btn-primary">Update Product</button>
                    <a href="formAddProduct.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-k6iZLEb6R9kGm32O0Gm1zJvlHPqc6p4j9qW4j9W/v1g3c8VXHHfmxG2ExGZfipH1" crossorigin="anonymous"></script>
</body>
</html>
