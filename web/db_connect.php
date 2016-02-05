<?php
 
 // http://www.w3schools.com/php/func_mysqli_query.asp
 
/**
 * A class file to connect to database
 */
class DB_CONNECT {
 
    // constructor
    function __construct() {
        // connecting to database
        $this->connect();
    }
 
    // destructor
    function __destruct() {
        // closing db connection
        $this->close();
    }
 
    /**
     * Function to connect with database
     */
    function connect() {
        // retrive database connection variables
        
        $url = parse_url(getenv("CLEARDB_DATABASE_URL")); 
        
        $server = $url["host"];
        $username = $url["user"];
        $password = $url["pass"];
        $db = substr($url["path"], 1);
         
        // Connecting to mysql database
                
        $con = new mysqli($server, $username, $password, $db);
        if (mysqli_connect_errno())
            {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
        
        // returing connection cursor
        return $con;
    }
 
    /**
     * Function to close db connection
     */
    function close() {
        // closing db connection
        
        return mysqli.close($con);
        
    }
 
}
 
?>