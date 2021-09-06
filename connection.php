<?php 
    $usernameDB = "root";
    $passwordDB = "";

    try
    {
    $connection = new pdo("mysql:host=localhost;dbname=mysteriumapp", $usernameDB, $passwordDB );
    
    $connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }
    catch(pdoexception $exception){
        echo "Connection problems";
    }
?>