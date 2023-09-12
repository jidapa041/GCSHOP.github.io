<?php session_start(); ?>
<?php
 //print_r($_POST); //ตรวจสอบมี input อะไรบ้าง และส่งอะไรมาบ้าง 
 //ถ้ามีค่าส่งมาจากฟอร์ม
 if(isset($_POST['username']) && isset($_POST['password']) ){

  //ไฟล์เชื่อมต่อฐานข้อมูล
  require_once 'connect.php';
  //ประกาศตัวแปรรับค่าจากฟอร์ม
  $username = $_POST['username'];
  $password = sha1($_POST['password']); //เก็บรหัสผ่านในรูปแบบ sha1 

  //check username  & password
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
    $stmt->bindParam(':username', $username , PDO::PARAM_STR);
    $stmt->bindParam(':password', $password , PDO::PARAM_STR);
    $stmt->execute();

    //กรอก username & password ถูกต้อง
    if($stmt->rowCount() == 1){
      //fetch เพื่อเรียกคอลัมภ์ที่ต้องการไปสร้างตัวแปร session
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      //สร้างตัวแปร session
      $_SESSION['id'] = $row['id'];
      $_SESSION['firstname'] = $row['firstname'];
      $_SESSION['lastname'] = $row['lastname'];
      $_SESSION['role'] = $row['role'];

      //เช็คว่ามีตัวแปร session อะไรบ้าง
      //print_r($_SESSION);

      echo $row['role'];

     // exit();
        switch ($row['role']) {
            case "admin": header('Location: ./customer_member.php');break;
            case "user": header('Location: ../index.php'); break;
        }
         //login ถูกต้องและกระโดดไปหน้าตามที่ต้องการ
    }else{ //ถ้า username or password ไม่ถูกต้อง

       echo '<script>
                     setTimeout(function() {
                      swal({
                          title: "เกิดข้อผิดพลาด",
                           text: "Username หรือ Password ไม่ถูกต้อง ลองใหม่อีกครั้ง",
                          type: "warning"
                      }, function() {
                          window.location = "login.php"; //หน้าที่ต้องการให้กระโดดไป
                      });
                    }, 1000);
                </script>';
            $conn = null; //close connect db
          } //else
  } //isset 
  //devbanban.com
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Login</title>
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
        .login-form {
            max-width: 500px;
            padding: 50px;
            border-radius: 15px;
            background-color: ;
            box-shadow: 0 0 30px rgba(0, 0, 0, 10);
           
        }
        .login-form h2 {
            margin-bottom: 50px;
            margin-left: 1%0px;
            font-size: 30px;
          
        
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

        .login-form button {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #696969;
            color: #FFFFFF;
            width: 50%;
            transition: background-color 0.3s ease;
           
        }

        .login-form button:hover {
            background-color: #D3D3D3;
            color: #696969;
        }

        .register-link {
            text-align: center;
            margin-top: 30px;
            font-size: 20px; 
        }

        .register-link a {
            color: #696969;
            font-size: 20px;
        }

        .register-link a:hover {
            color: #696969;
            font-size: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="login-form">
                    <img style="width: 20rem; height: 10rem;   margin-left: 50px;" src="../assets/images/brand.png" >
                    <h2 style="color: #696969; text-align: center; ">Login</h2>
                    <form action="" method="post">
                        <div class="mb-3">
                            <input type="text" name="username" class="form-control" required minlength="3"
                                placeholder="Username">
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" required minlength="3"
                                placeholder="Password">
                        </div>
                       <center> <button type="submit" class="btn btn-primary">Sing In</button>  </center>
                    </form>
                    <div class="register-link">
                        <p style="color: #696969;">คุณมีบัญชีหรือไม่ <a href="fromregister.php">Sing Up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
