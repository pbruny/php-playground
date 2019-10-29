<?php 
  require 'contato.class.php';

  $contact = new Contato();
  $id = addslashes($_GET['id']);
  $delete = $contact->deleteContactById($id);

  if($delete) {
    header("Location: index.php");
  } else {
    echo "Contact not deleted";
    ?> <br><a href="index.php">Return home</a>
    <?php
  }
?>