<?php 

  require 'contato.class.php';

  if(isset($_GET['id'])) {
    $id = addslashes($_GET['id']);
    $edit_contact = new Contato();
    $contact = $edit_contact->getContactById($id);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Edit contact</title>
</head>
<body>
  <h1>Edit contact</h1>

  

  <form action="edit_submit.php" method="post">
    <label for="email">Name:</label><br>
    <input type="text" name="name" value="<?php echo $contact['name']; ?>"><br><br>
    <label for="email">Email:</label><br>
    <input type="text" name="email" value="<?php echo $contact['email']; ?>"><br><br>
    <input type="hidden" name="id" value="<?php echo $contact['id']; ?>">
    <input type="submit" value="Edit contact">
    <a href="index.php">Get back</a>

  </form>
</body>
</html>