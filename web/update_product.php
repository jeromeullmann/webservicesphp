<?php
 
/*
 * Following code will update a product information
 * A product is identified by product id (pid)
 */
 
// usage : http://localhost/tp2/update_product.php?pid=8&price=600&name=Royaume&description=RSC%20Royaume%2013942 
 
// array for JSON response
$response = array();
 
// check for required fields
if (isset($_GET['pid']) && isset($_GET['name']) && isset($_GET['price']) && isset($_GET['description'])) {
 
    $pid = $_GET['pid'];
    $name = $_GET['name'];
    $price = $_GET['price'];
    $description = $_GET['description'];
 
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
    
    $con = $db->connect();
 
    // mysql update row with matched pid
    $result = $con->query("UPDATE products SET name = '$name', price = '$price', description = '$description' WHERE pid = $pid");
 
    // check if row inserted or not
    if ($result) {
        // successfully updated
        $response["success"] = 1;
        $response["message"] = "Product successfully updated.";
 
        // echoing JSON response
        echo json_encode($response);
    } else {
 
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>