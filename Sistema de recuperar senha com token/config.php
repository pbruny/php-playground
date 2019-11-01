<?php

  try {
    $dbname = "mysql:dbname=projeto_esquecer_senha;host=localhost";
    $dbuser = "root";
    $dbpass = "root";
    $pdo = new PDO($dbname, $dbuser, $dbpass);
  } catch (PDOException $e){
    echo $e->getMessage();
  }
?>