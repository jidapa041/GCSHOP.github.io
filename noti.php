<?php
    function sendLineNotify ($message = "แจ้งเตือนรายการสั่งซื้อ")
    {
        $token = "Z2Bwu6Q6jkJNHD80B9hx4HNAbedhSTslUSYY9TyxnG7"; // ใส่ Token ที่สร้างไว้

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://notify-api.line.me/api/notify");
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "message=" . $message);
        $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $token . '',);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);

        if (curl_error($ch)) {
            echo 'error:' . curl_error($ch);
        } else {
            $res = json_decode($result, true);
            echo "status : " . $res['status'];
            echo "message : " . $res['message'];
        }
        curl_close($ch);
    }
?>