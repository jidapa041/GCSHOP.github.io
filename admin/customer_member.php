<?php
require_once './connect.php';

$sql = "SELECT * FROM users";
$stmt = $conn->prepare($sql);
$stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ">
    <title>Order Table</title>
    <style>
       table {
            width: 90%;
            border-collapse: collapse;
            margin: 0 auto; 
        }
         th {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
            color: #D3D3D3;

        }

        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;

        }

        th {
            background-color: #2F4F4F;
        }
    </style>
     <?php
  @include('./adminpage.php');
  ?>
</head>
<body>
<h1 style="text-align: center">Customer Member</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Firsname</th>
                <th>Lastname</th>
                <th>Telephonenumber</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $row['lastname']; ?></td>
                    <td><?php echo $row['telephonenumber']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
