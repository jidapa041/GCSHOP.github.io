<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_name'],  $_POST['product_price'], $_POST['product_id'])) {
    // Retrieve and validate input data
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
 
    $product_price = $_POST['product_price'];
    $category = $_POST['category'];

    // Include the database connection script
    require_once 'connect.php';

    // Check if a new image was uploaded
    if ($_FILES['product_img']['error'] === UPLOAD_ERR_OK) {
        $newname = uploadImage();
        // Update the product with the new image filename
        $stmt = $conn->prepare("UPDATE tbl_product SET category = :category , product_name = :product_name,  product_price = :product_price, product_img = :product_img WHERE product_id = :product_id");
        $stmt->bindParam(':product_img', $newname, PDO::PARAM_STR);
    } else {
        // Update the product without changing the image filename
        $stmt = $conn->prepare("UPDATE tbl_product SET category = :category , product_name = :product_name, product_price = :product_price WHERE product_id = :product_id");
    }

    // Execute the update query
    $stmt->bindParam(':category', $category, PDO::PARAM_STR);
    $stmt->bindParam(':product_name', $product_name, PDO::PARAM_STR);
    // $stmt->bindParam(':product_detail', $product_detail, PDO::PARAM_STR);
    $stmt->bindParam(':product_price', $product_price, PDO::PARAM_INT);
    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
    $stmt->execute();

    // Redirect back to the product listing page with a success message
    header("Location: formAddProduct.php?update_success=1");
    exit();
} else {
    echo "";
    // Redirect to an error page or handle invalid input accordingly
}

function uploadImage()
{
    // Check if the upload directory exists
    $uploadDir = "../img/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    // Generate a unique filename for the uploaded image
    $date1 = date("Ymd_His");
    $numrand = mt_rand();
    $typefile = strrchr($_FILES['product_img']['name'], ".");
    $newname = $numrand . $date1 . $typefile;

    // Move the uploaded image to the upload directory
    $targetFile = $uploadDir . $newname;
    if (move_uploaded_file($_FILES['product_img']['tmp_name'], $targetFile)) {
        return $newname;
    } else {
        // Handle the image upload error (e.g., display an error message)
        return false;
    }
}
?>
