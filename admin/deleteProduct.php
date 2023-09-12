<?php
if (isset($_GET['product_id']) && is_numeric($_GET['product_id'])) {
    // Retrieve the product_id from the URL parameter
    $product_id = $_GET['product_id'];
    // Include the database connection script
    
    require_once 'connect.php';

    // Query to retrieve the product_img filename
        $stmt = $conn->prepare("SELECT product_img FROM tbl_product WHERE product_id = :product_id");
        
    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // Delete the product from the database  
    $stmt = $conn->prepare("DELETE FROM tbl_product WHERE product_id = :product_id");
    $stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT); 
    $stmt->execute();

    // Delete the associated image file from the server
    if ($row && file_exists("../img/" . $row['product_img'])) {
        unlink("../img/" . $row['product_img']);
    }  


// Redirect back to the product listing page
header("Location: formAddProduct.php");
exit();
}

else {
    
   
// Redirect to an error page or handle invalid input accordingly
}
?>

``