<?php
  require 'contato.class.php';

  if(isset($_POST['email']) && !empty($_POST['email'])){
    $new_contact = new Contato();
    $email = addslashes($_POST['email']);
    $name = addslashes($_POST['name']);

    $new_contact->addContact($email, $name);

    header("Location: index.php");
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Add new contact</title>
</head>
<body>
  <h1>Add new contact</h1>
  <form method="post">
    <label for="email">Email:</label><br>
    <input type="email" name="email"><br>
    <label for="name">Name:</label><br>
    <input type="text" name="name"><br><br>
    <input type="submit" value="Add contact">
    <a href="index.php">Get back</a>


  </form>
</body>
</html>