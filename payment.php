<?php
require('./noti.php');
session_start();

if (isset($_POST['upload_receipt'])) {
    // ตรวจสอบว่าไฟล์ถูกอัพโหลดหรือไม่

}


// ... โค้ดตรวจสอบสินค้าในตะกร้า ...
if (isset($_GET['confirm_order'])) {
$name_file = "";
    // ตรวจสอบว่าตะกร้าไม่ว่าง
    if (!empty($_SESSION['cart'])) {
        // เชื่อมต่อฐานข้อมูล
        require_once 'admin/connect.php';

        // สร้างบันทึกในตาราง orders
        $totalPrice = 0;
        foreach ($_SESSION['cart'] as $product) {
            $totalPrice += $product['subtotal'];
        }

        $upload_dir = 'uploads/'; // โฟลเดอร์ที่จะเก็บรูปหลักฐานการชำระเงิน
        $file_name = "statement".date("Y-m-d").date("h-i-sa").$_FILES['payment_proof']['name'];
        $name_file = $file_name;
        $file_tmp = $_FILES['payment_proof']['tmp_name'];
        $file_path = $upload_dir . $file_name;

        if (move_uploaded_file($file_tmp, $file_path)) {
            // รูปหลักฐานการชำระเงินถูกอัพโหลดสำเร็จ
            echo "อัพโหลดรูปหลักฐานการชำระเงินสำเร็จ";
        } else {
            echo "เกิดข้อผิดพลาดในการอัพโหลดรูปหลักฐานการชำระเงิน";
        }


        // ดึงข้อมูลรายการสั่งซื้อทั้งหมดจาก $_SESSION["orders"]
        if (isset($_SESSION["orders"])) {
            foreach ($_SESSION["orders"] as $order) {
                $name = $order["name"];
                $address = $order["address"];
                $subdistrict = $order["subdistrict"];
                $district = $order["district"];
                $province = $order["province"];
                $postal_code = $order["postal_code"];
                $phone = $order["phone"];
                $line_id = $order["line_id"];
                $products = $order["products"]; // อาเรย์ของสินค้าที่อยู่ในรายการสั่งซื้อ

                // ทำสิ่งที่คุณต้องการกับข้อมูลแต่ละรายการสั่งซื้อที่ถูกดึงออกมา
                // ตัวอย่างเช่น แสดงผลหรือประมวลผลข้อมูล
            }
        }


        $customer_name = $name;
        $customer_address = $address . ' ' . $subdistrict . ' ' . $district . ' ' . $province . ' ' . $postal_code;
        $customer_phone = $phone;

        $order_status = "รอการชำระเงิน"; // สถานะเริ่มต้น

        $sql = "INSERT INTO orders (customer_name, customer_address, customer_phone, total_price, order_status, payment_img) 
                VALUES (:customer_name, :customer_address, :customer_phone, :total_price, :order_status, :payment_img)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':customer_name', $customer_name, PDO::PARAM_STR);
        $stmt->bindParam(':customer_address', $customer_address, PDO::PARAM_STR);
        $stmt->bindParam(':customer_phone', $customer_phone, PDO::PARAM_STR);
        $stmt->bindParam(':total_price', $totalPrice, PDO::PARAM_INT);
        $stmt->bindParam(':order_status', $order_status, PDO::PARAM_STR);
        $stmt->bindParam(':payment_img', $name_file, PDO::PARAM_STR);

        if ($stmt->execute()) {
            // สร้างบันทึกในตาราง order_items
            $order_id = $conn->lastInsertId();

            foreach ($_SESSION['cart'] as $product) {
                $product_id = $product['product_id'];
                $quantity = $product['quantity'];
                $more = $product['more'];

                $sql = "INSERT INTO order_items (order_id, product_id, quantity,order_more) 
                        VALUES (:order_id, :product_id, :quantity,:order_more)";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
                $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
                $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
                $stmt->bindParam(':order_more', $more, PDO::PARAM_STR);
                $stmt->execute();
            }

            // ทำการเคลียร์ตะกร้าหลังการสั่งซื้อ

            unset($_SESSION["cart"]);
            unset($_SESSION["orders"]);

            sendLineNotify("หมายเลขคำสั่งซื้อ : $order_id ");
            sendLineNotify("ชื่อผู้สั่งซื้อ: $name        ");




            echo '<script>
            alert("คำสั่งซื้อสำเร็จ");
            window.location.href = "about.php";
                </script>';
        } else {
            echo "เกิดข้อผิดพลาดในการสั่งซื้อ";
        }

        $conn = null; // ปิดการเชื่อมต่อฐานข้อมูล
    } else {
        echo "ตะกร้าสินค้าว่างเปล่า";
    }
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
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h2 class="mb-0">Pay Ment</h2>
                    </div>
                    <div class="card-body">
                        <form action="?confirm_order=yes" method="post" enctype="multipart/form-data">
                            <!-- แสดงคิวอาร์โค้ด -->
                            <div class="text-center">
                                <img src="./assets/images/qrcode.jpg" alt="QR Code" width="200">
                            </div>
                            <!-- ช่องอัพโหลดรูปหลักฐานการชำระเงิน -->
                            <div class="mb-3">
                                <label for="payment_proof" class="form-label">อัพโหลดหลักฐานการชำระเงิน</label>
                                <input type="file" class="form-control" name="payment_proof" required>
                            </div>

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h2 class="mb-0">Order List</h2>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>สินค้า</th>
                                    <th>ราคา</th>
                                    <th>จำนวน</th>
                                    <th>ยอดรวม</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $totalPrice = 0;
                                foreach ($_SESSION['cart'] as $product): ?>
                                    <tr>
                                        <td>
                                            <?php echo $product['product_name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $product['product_price']; ?>
                                        </td>
                                        <td>
                                            <?php echo $product['quantity']; ?>
                                        </td>
                                        <td>
                                            <?php echo $product['subtotal']; ?>
                                        </td>
                                    </tr>
                                    <?php
                                    $totalPrice += $product['subtotal'];
                                endforeach;
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3">ยอดรวมทั้งหมด</td>
                                    <td>
                                        <?php echo number_format($totalPrice, 2); ?>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <!-- <a href="?confirm_order=yes" name="confirm_order" class="btn btn-primary">ยืนยันการสั่งซื้อ</a> -->
                        <button type="submit" name="upload_receipt" class="btn btn-primary">ยืนยันการสั่งซื้อ</button>
                        </form>
                    </div>
                    <style>
                        .btn-primary {
                            background-color: #2F4F4F;
                            border: none;
                            width: 100%;
                            transition: background-color 0.3s ease;
                        }

                        .btn-hover-effect {
                            position: relative;
                            overflow: hidden;
                        }

                        .btn-hover-effect:before {
                            content: "";
                            position: absolute;
                            left: 0;
                            top: 0;
                            width: 100%;
                            height: 0;
                            background-color: rgba(255, 255, 255, 0.3);
                            opacity: 0;
                            transition: height 0.3s, opacity 0.3s;
                        }

                        .btn-hover-effect:hover:before {
                            height: 100%;
                            opacity: 1;
                        }

                        .btn-primary:hover {
                            background-color: #778899;
                        }
                    </style>
                </div>
            </div>


</body>

</html>