<?php
    $host = "localhost";
    $username = "root";
    $password = "amysow";
    $database = "quiz_mysql";
    try {
        $connect = new PDO('mysql:host='.$host.'; dbname='.$database, $username, $password,
        array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
            )

        );
        
    } 
    catch (PDOException $error) {
        die ("impossible de se connecter à la base de données");
    }       

?>