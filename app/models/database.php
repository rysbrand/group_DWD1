<?php
    //database is not actually created yet
    $dsn = 'mysql:host=localhost;dbname=dwd_unit2_database';
    $username = 'root';
    $password = '';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>

<!-- we will have to change username and password here, its blank right now-->