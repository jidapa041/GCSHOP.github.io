<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Sing Up</title>
    <style>
        body {
            background-image: url("../assets/images/bg10.png");
            display: flex;
            min-height: 100vh;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .register-form {
            max-width: 500px;
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 10);
        }
        
           
        .container h2 {
            margin-bottom: 50px;
            margin-left: 1%0px;
            font-size: 30px;
            font-style: #3e2723;
        }
        .container input[type="text"],
        .container input[type="password"] {
            padding: 8px;
            /* ปรับขนาด padding เพื่อทำให้ช่องกรอกเล็กลง */
            border: 1px solid #ddd;
            /* ปรับขนาดเส้นขอบเพื่อให้ดูเล็กลง */
            border-radius: 5px;
            margin-bottom: 10px;
            /* ลดระยะห่างของช่องกรอก */
            width: 100%;
            font-size: 18px;
            /* ปรับขนาดตัวอักษรในช่องกรอก */
        }

        .container input[type="text"]:focus,
        .container input[type="password"]:focus {
            border-color: #007bff;
        }


        .container button {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #696969;
            color: #FFFFFF;
            width: 50%;
            transition: background-color 0.3s ease;
        }
        

        .container button:hover {
            background-color: #D3D3D3;
            color: #696969;
        }

        .login-link {
            text-align: center;
            margin-top: 30px;
            font-size: 20px; 
        }
        .login-link a {
            color: #696969;
            font-size: 20px;
        }

        .login-link a:hover {
            color: #696969;
            font-size: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
            <div class="register-form">
            <img style="width: 20rem; height: 10rem;   margin-left: 40px;" src="../assets/images/brand.png" >
                <h2 style="color: #696969; text-align: center; ">Sing Up</h2>
                <form action="" method="post">
                    <div class="mb-3">
                        <input type="text" name="name" class="form-control" required minlength="3" placeholder="ชื่อ">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="surname" class="form-control" required minlength="3"
                            placeholder="นามสกุล">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="telephone" class="form-control" required minlength="10" maxlength="10"
                            placeholder="เบอร์โทร">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="username" class="form-control" required minlength="3"
                            placeholder="username">
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" required minlength="3"
                            placeholder="password">
                    </div>
                    <input type="hidden" name="role" value="user">
                    <center><button type="submit" class="btn btn-primary">สมัครสมาชิก</button></center>
                </form>
                <div class="login-link">
                    <p style="color: #696969">คุณมีบัญชีแล้วใช่ไหม <a href="login.php">Login</a></p>
                </div>
            </div>
</body>

</html>

<?php
//print_r($_POST); //ตรวจสอบมี input อะไรบ้าง และส่งอะไรมาบ้าง 
//ถ้ามีค่าส่งมาจากฟอร์ม
if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['username']) && isset($_POST['password'])) {
    // sweet alert 
    echo '
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    //ไฟล์เชื่อมต่อฐานข้อมูล
    require_once 'connect.php';
    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $password = sha1($_POST['password']); //เก็บรหัสผ่านในรูปแบบ sha1 
    $role = $_POST['role'];
    $telephone = $_POST['telephone'];

    //check duplicat
    $stmt = $conn->prepare("SELECT id FROM tbl_member WHERE username = :username");
    //$stmt->bindParam(':username', $username , PDO::PARAM_STR);
    $stmt->execute(array(':username' => $username));
    //ถ้า username ซ้ำ ให้เด้งกลับไปหน้าสมัครสมาชิก ปล.ข้อความใน sweetalert ปรับแต่งได้ตามความเหมาะสม
    if ($stmt->rowCount() > 0) {
        echo '<script>
                     setTimeout(function() {
                      swal({
                          title: "Username ซ้ำ !! ",  
                          text: "กรุณาสมัครใหม่อีกครั้ง",
                          type: "warning"
                      }, function() {
                          window.location = "formRegister.php"; //หน้าที่ต้องการให้กระโดดไป
                      });
                    }, 1000);
              </script>';
    } else { //ถ้า username ไม่ซ้ำ เก็บข้อมูลลงตาราง
        //sql insert
        $stmt = $conn->prepare("INSERT INTO users (username, password, firstname, lastname, telephonenumber, role)
            VALUES (:username, :password, :first_name, :last_name, :telephone, :role)");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':first_name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':last_name', $surname, PDO::PARAM_STR);
        $stmt->bindParam(':telephone', $telephone, PDO::PARAM_STR);
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);
        $result = $stmt->execute();
        if ($result) {
            echo '<script>
                     setTimeout(function() {
                      swal({
                          title: "สมัครสมาชิกสำเร็จ",
                          text: "กรุณารอระบบ Login ใน Workshop ต่อไป",
                          type: "success"
                      }, function() {
                          window.location = "login.php"; //หน้าที่ต้องการให้กระโดดไป
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
                          window.location = "formRegister.php"; //หน้าที่ต้องการให้กระโดดไป
                      });
                    }, 1000);
                </script>';
        }
        $conn = null; //close connect db
    } //else chk dup
} //isset 
//devbanban.com
?>