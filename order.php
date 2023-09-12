<?php
session_start();

require('./noti.php');

$name = "";
$telephone = "";
$address_1 = "";
$address_2 = "";
$address_3 = "";
$address_4 = "";
$address_5 = "";

if (isset($_SESSION['role'])) {
    require_once 'admin/connect.php';
    $sql = "SELECT * FROM users WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $_SESSION['id'], PDO::PARAM_STR);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $name = $_SESSION['firstname'] . " " . $_SESSION['lastname'];
    $telephone = $row['telephonenumber'];

    $sql = "SELECT * FROM orders WHERE customer_name = :cus_name ORDER BY order_id LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':cus_name', $name, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $addresses = explode(" ", $row['customer_address']);


        $address_1 = $addresses[0];
        $address_2 = $addresses[1];
        $address_3 = $addresses[2];
        $address_4 = $addresses[3];
        $address_5 = $addresses[4];
    }
}

if (isset($_POST["place_order"])) {
    // รับข้อมูลจากฟอร์ม
    $name = $_POST["name"];
    $address = $_POST["address"];
    $subdistrict = $_POST["subdistrict"];
    $district = $_POST["district"];
    $province = $_POST["province"];
    $postal_code = $_POST["postal_code"];
    $phone = $_POST["phone"];
    $line_id = $_POST["line_id"];

    // สร้างรายการสั่งซื้อ (เพิ่มข้อมูลที่เป็นค่าอื่นๆ จากตะกร้าได้ตามต้องการ)
    $order = [
        "name" => $name,
        "address" => $address,
        "subdistrict" => $subdistrict,
        "district" => $district,
        "province" => $province,
        "postal_code" => $postal_code,
        "phone" => $phone,
        "line_id" => $line_id,
        "products" => $_SESSION["cart"],
        "totalPrice" => $totalPrice
    ];

    // เพิ่มรายการสั่งซื้อลงในอาร์เรย์รายการสั่งซื้อทั้งหมด (ใช้ตัวแปร $_SESSION หรือฐานข้อมูลเพื่อเก็บรายการสั่งซื้อ)
    $_SESSION["orders"][] = $order;



    // ไปยังหน้าขอบคุณสำหรับการสั่งซื้อ
    header("Location: payment.php");
    exit();
}
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">กรอกข้อมูลที่อยู่สำหรับการจัดส่งสินค้า</h2>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">

                            <div class="mb-3">
                                <label for="name" class="form-label">ชื่อ</label>
                                <input type="text" name="name" class="form-control" required value="<?= $name ?>">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">ที่อยู่</label>
                                <input type="text" name="address" class="form-control" required
                                    value="<?= $address_1 ?>">
                            </div>
                            <div class="row g-3">
                                <div class="col-md">
                                    <label for="subdistrict" class="form-label">ตำบล</label>
                                    <input type="text" name="subdistrict" class="form-control" required
                                        value="<?= $address_2 ?>">
                                </div>
                                <div class="col-md">
                                    <label for="district" class="form-label">อำเภอ</label>
                                    <input type="text" name="district" class="form-control" required
                                        value="<?= $address_3 ?>">
                                </div>
                                <div class="col-md">
                                    <label for="province" class="form-label">จังหวัด</label>
                                    <input type="text" name="province" class="form-control" required
                                        value="<?= $address_4 ?>">
                                </div>
                                <div class="col-md">
                                    <label for="postal_code" class="form-label">รหัสไปรษณีย์</label>
                                    <input type="text" name="postal_code" class="form-control" required
                                        value="<?= $address_5 ?>">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">เบอร์โทร</label>
                                <input type="tel" name="phone" class="form-control" required value="<?= $telephone ?>">
                            </div>
                            <div class="text-center">
                                <button type="submit" name="place_order" class="btn btn-success">สั่งซื้อสินค้า</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>