<?php
 
/*
 * Following code will list all the products
 */

// include db connect class
require_once __DIR__ . '/db_connect.php';
 
// connecting to db
$db = new DB_CONNECT();
 
echo "init db : creation tables";

$sql = "CREATE TABLE IF NOT EXISTS PRODUCTS (
pid INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100) NOT NULL,
price DECIMAL(10,2) NOT NULL,
description TEXT,
created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
updated_at timestamp NULL DEFAULT NULL
)";

if ($db->query($sql) === TRUE) {
    echo "Table Products created successfully";
} else {
    echo "Error creating table: " . $db->error;
}

$db->close();

?>