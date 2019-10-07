<?php
    $dsn = "mysql:dbname=blog;host=localhost";
    $dbuser = "root";
    $dbpass = "root";

    try {
        $pdo = new PDO($dsn, $dbuser, $dbpass);
    } catch(PDOException $e) {
        echo "Falhou a conexão com o banco".$e->getMessage();
    }
?>