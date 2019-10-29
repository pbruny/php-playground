<?php 

  require 'contato.class.php';

  if(isset($_POST['id']) && !empty($_POST['id'])) {
    $id = addslashes($_POST['id']);
    $name = addslashes($_POST['name']);
    $email = addslashes(($_POST['email']));

    $edit_contact = new Contato();
    $edit_contact->editContactNameById($id, $name, $email);

    header("Location: index.php");
  }
?>
