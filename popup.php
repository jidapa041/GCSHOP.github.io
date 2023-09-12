
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Popup Advertisement</title>
<style>
  body {
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-color: rgba(0, 0, 0, 0.9);
  }
  .popup {
    background-color: #fff;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    text-align: center;
    position: relative;
  }
  .popup-close {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
  }
</style>
</head>
<body>
<div class="popup">
  <span class="popup-close" onclick="closePopup()">&times;</span>
  <h2>กรุณาอ่านก่อนสั่งซื้อสินค้า!!!</h2>
  <img style="width: 15rem; height: 15rem;   margin-left: 20px;" src="./assets/images/line.jpg" >
  <p>กรุณาแอดไลน์เข้ากลุ่มไลน์ของทางร้าน 
    <br>เพื่อตรวจสอบหมายเลขคำสั่งซื้อแลสถานะการจัดส่งสินค้าของท่าน!</p>
  <button onclick="closePopup()">ปิด</button>
</div>
<script>
  function closePopup() {
    // ซ่อนป๊อบอัพ
    document.querySelector('.popup').style.display = 'none';
    // ตั้งค่าเปลี่ยนเส้นทาง URL ของหน้าเว็บที่คุณต้องการไป
    window.location.href = 'index.php';
  }
</script>

</body>
</html>
