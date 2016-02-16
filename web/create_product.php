<?php
 
/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */
 
// usage : http://localhost/android_connect/create_product.php?price=500&name=Royaume&description=RSC%20Royaume%20139%2042 
 
// array for JSON response
$response = array();

 
// check for required fields
if (isset($_GET['name']) && isset($_GET['price']) && isset($_GET['description'])) {
 
    $name = $_GET['name'];
    $price = $_GET['price'];
    $description = $_GET['description'];
 
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
	$con = $db->connect();
    
    $con = $db->connect();
    
    // mysql inserting a new row
    $result = $con->query("INSERT INTO products(name, price, description) VALUES('$name', '$price', '$description')");
 
    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "Product successfully created.";
 
        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
 
        // echoing JSON response
        echo json_encode($response);
    }
} else {

	echo "KO";
 
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>