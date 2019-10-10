<?php

  try {
    $dbname = "mysql:dbname=projeto_registroporconvite;host=localhost";
    $dbuser = "root";
    $dbpass = "root";
    $pdo = new PDO($dbname, $dbuser, $dbpass);
    // echo 'Conectado ao banco de dados!';

  } catch (PDOException $e){
    echo $e->getMessage();
  }
?>