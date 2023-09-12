<?php
require_once './connect.php';

$sql = "SELECT * FROM orders";
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
            background-color: #2F4F4F
;

        }
    </style>
         <?php
  @include('./adminpage.php');
  ?>
</head>

<body>
    <h1 style="text-align: center">Customer Payment</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Total Amount</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td>
                        <?php echo $row['order_id']; ?>
                    </td>
                    <td>
                        <?php echo $row['customer_name']; ?>
                    </td>
                    <td>
                        <?php echo $row['customer_address']; ?>
                    </td>
                    <td>
                        <?php echo $row['customer_phone']; ?>
                    </td>
                    <td>
                        <?php echo $row['total_price']; ?>
                    </td>
                    <td>
                        <?php if ($row['order_status'] === 'รอการชำระเงิน'): ?>
                            <form method="post" action="../update_status.php">
                                <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                                <input type="hidden" name="customer_name" value="<?php echo $row['customer_name']; ?>">
                                <button type="submit" name="mark_paid">ชำระเงินแล้ว</button>
                            </form>
                        <?php else: ?>
                            <?php echo $row['order_status']; ?>
                        <?php endif; ?>
                     
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>

</html>