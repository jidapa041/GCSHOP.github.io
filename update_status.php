<?php
// update_status.php
require('./noti.php');
session_start();
require_once 'admin/connect.php';

if (isset($_POST['mark_paid']) && isset($_POST['order_id'])) {
    $order_id = $_POST['order_id'];
    $name = $_POST['customer_name'];

    // ปรับปรุงสถานะการสั่งซื้อเป็น 'ชำระเงินแล้ว'
    $sql = "UPDATE orders SET order_status = 'ชำระเงินแล้ว' WHERE order_id = :order_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':order_id', $order_id, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        header('Location: ./admin/customer_payment.php');
        sendLineNotify("หมายเลขคำสั่งซื้อ : $order_id  ชำระเงินเรียบร้อยแล้ว");
        sendLineNotify("ชื่อผู้สั่งซื้อ: $name        ");
    } else {
        echo "เกิดข้อผิดพลาดในการอัปเดตสถานะการสั่งซื้อ";
    }
} else {
    echo "ไม่พบรหัสคำสั่งซื้อ";
}
?>
