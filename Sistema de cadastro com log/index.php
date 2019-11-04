<?php
  require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Users Table</title>
</head>
<body>
  <table border="1" width="768">
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Actions</th>
    </tr>
    <?php 
      $sql = "SELECT * FROM users WHERE active = 1";
      $sql = $pdo->query($sql);

      if($sql->rowCount() > 0) {
        $sql = $sql->fetchAll();
        foreach($sql as $user):
          ?>
            <tr>
              <td><?php echo $user['name']; ?></td>
              <td><?php echo $user['email']; ?></td>
              <td><a href="delete.php?id=<?php echo $user['id']; ?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>
      <?php
      }
    ?>
    <hr>
  </table>
</body>
</html>