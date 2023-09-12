<?php
session_start();

require_once 'admin/connect.php';


if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    $stmt = $conn->prepare("SELECT * FROM tbl_product WHERE product_id = :product_id");
    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        header('Location: user_index.php');
        exit();
    }
} else {
    header('Location: user_index.php');
    exit();
}


// ตรวจสอบการกดปุ่ม "สั่งซื้อ"
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["quantity"]) ) {
    // สร้างข้อมูลสินค้าที่จะเพิ่มลงในตะกร้า
    $productToAdd = array(
        "product_id" => $product["product_id"],
        "product_name" => $product["product_name"],
        "product_price" => $product["product_price"],
        "size" => $_POST["size"],
        "quantity" => $_POST["quantity"],
        "subtotal" => $product["product_price"] * $_POST["quantity"],
        "more" => isset($_POST["more"])?$_POST["more"]:""
    );

    // เพิ่มข้อมูลสินค้าลงในตะกร้า (ในที่นี้ใช้ Session)
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }
    array_push($_SESSION["cart"], $productToAdd);

    // แสดงข้อความสำเร็จ
    echo '<script>
        window.location.href = "productDetail.php?product_id=' . $product["product_id"] . '";
    </script>';
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        <?= $product['product_name'] ?>
    </title>
    <?php
    @include('components/head.php');
    ?>

    <style>
        body {
            background-color: #f8f9fa;
        }

        .product-details {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>


<body>
    <?php
    @include('components/navbar.php');
    @include('components/menu.php');
    ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <img src="img/<?= $product['product_img'] ?>" class="img-fluid" alt="<?= $product['product_name'] ?>">
            </div>
            <div class="col-md-6">
                <div class="product-details">
                    <h3>
                        <?= $product['product_name'] ?>
                    </h3>

                    <form action="" method="post">
                        <?php
                        if ($product['category'] == "เครื่องประดับ" || $product['category'] == "เครื่องสำอางค์") {
                        } else if ($product['category'] == "รองเท้า") { ?>
                        <div class="mb-3">
                                <label for="more" class="form-label">เลือกไซส์:</label>
                                <select name="more" id="more" class="form-select" required>
                                    <option value="">โปรดเลือกไซส์</option>
                                    <option value="ไซส์ 37">37</option>
                                    <option value="ไซส์ 38">38</option>
                                    <option value="ไซส์ 39">39</option>
                                    <option value="ไซส์ 40">40</option>
                                    <option value="ไซส์ 41">41</option>
                                    <option value="ไซส์ 42">42</option>
                                    <option value="ไซส์ 43">43</option>
                                    <option value="ไซส์ 44">44</option>
                                </select>
                            </div>

                            <?php
                        } else { ?>
                                <div class="mb-3">
                                    <label for="more" class="form-label">เลือกไซส์:</label>
                                    <select name="more" id="more" class="form-select" required>
                                        <option value="">โปรดเลือกไซส์</option>
                                        <option value="ไซส์ S">S</option>
                                        <option value="ไซส์ M">M</option>
                                        <option value="ไซส์ L">L</option>
                                        <option value="ไซส์ XL">XL</option>
                                    </select>
                                </div>
                            <?php
                        }
                        ?>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">จำนวน:</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1"
                                required>
                        </div>
                        <p class="fs-4">ราคา: <span class="fs-4">
                                <?= number_format($product['product_price'], 2) ?>
                            </span> บาท</p>
                        <br>
                        <button type="submit" class="btn btn-primary">เพิ่มลงตะกร้า</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>