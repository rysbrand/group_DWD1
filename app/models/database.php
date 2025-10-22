<?php
    
    $dsn = 'mysql:host=localhost;dbname=dwd_unit2_database';
    $username = 'root';
    $password = '';
    //$password = 'thing'; // This will change based off what your password is. I changed my password so it is different for me. Rylee S

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>