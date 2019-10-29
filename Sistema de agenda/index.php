<?php

  require('contato.class.php');

  $contato = new Contato();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Contact List</title>
</head>
<body>
  <h1>Contacts</h1>
  <a href="add.php">Add Contact</a><br>
  <br>
  <br>

  <table border="1">
    <tr>
      <th>ID</th>
      <th>NAME</th>
      <th>EMAIL</th>
      <th>OPTIONS</th>
    </tr>

    <?php 
      $list = $contato->getAllContacts();
      foreach($list as $contact):
      ?>
        <tr>
          <td><?php echo $contact['id'] ?></td>
          <td><?php echo $contact['name'] ?></td>
          <td><?php echo $contact['email'] ?></td>
          <td><a href="edit.php?id=<?php echo $contact['id']; ?>">Edit</a> | <a href="delete.php?id=<?php echo $contact['id']; ?>">Delete</a></td>
        </tr>
      <?php endforeach; ?>
  </table>
</body>
</html>