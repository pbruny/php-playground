<?php

  try {
    $dbname = "mysql:dbname=projeto_tags;host=localhost";
    $dbuser = "root";
    $dbpass = "root";
    $pdo = new PDO($dbname, $dbuser, $dbpass);

  } catch (PDOException $e){
    echo $e->getMessage();
  }
?>