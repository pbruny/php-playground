<?php
  require 'config.php';

  if(!empty($_GET['id'])) {
    $id = addslashes($_GET['id']);
    $sql = "UPDATE users SET active = '0' WHERE id = :id";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(":id", $id);
    $sql->execute();
    header("Location: index.php");
  }

  header("Location: index.php");