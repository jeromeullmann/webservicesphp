
<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL")); 
        
$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);
        
echo "db_connect : récupération CLEARDB_DATABASE_URL";

$mysqli = new mysqli($server, $username, $password, $db);

/* Vérification de la connexion */
if (mysqli_connect_errno()) {
    printf("Échec de la connexion : %s\n", mysqli_connect_error());
    exit();
}

if ($result = $mysqli->query("SELECT * FROM products")) {

    /* Détermine le nombre de lignes du jeu de résultats */
    $row_cnt = $result->num_rows;

    printf("Le jeu de résultats a %d lignes.\n", $row_cnt);

    /* Ferme le jeu de résultats */
    $result->close();
}

/* Ferme la connexion */
$mysqli->close();
?>
