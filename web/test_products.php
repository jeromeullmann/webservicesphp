<?php

/* DATABASE_URL => mysql://[username]:[password]@[host]/[database name]?reconnect=true */
/* Local : mysql://root@localhost/products */

$notfind = True;

$env = getenv('CLEARDB_DATABASE_URL');
if ($env == "") {
    echo "execution en local";
    
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "products";
    
} else {
    
    $url = parse_url($env);
    
    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"], 1);
    
}

$mysqli = new mysqli($server, $username, $password, $db);
    
if (mysqli_connect_errno()) {
      printf("Échec de la connexion : %s\n", mysqli_connect_error());
      exit();
}

if ($result = $mysqli->query("SELECT * FROM products")) {
      $row_cnt = $result->num_rows;
      printf("Le jeu de résultats a %d lignes.\n", $row_cnt);
      $result->close();
}
$mysqli->close();
?>

