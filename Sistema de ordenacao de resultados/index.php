<?php
  require 'config.php';

  if(isset($_GET['ordem']) && !empty($_GET['ordem'])){
    $ordem = addslashes($_GET['ordem']);
    $sql = "SELECT * FROM usuarios ORDER BY ".$ordem;
  } else {
    $ordem = "";
    $sql = "SELECT * FROM usuarios";
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ordenação de Resultados</title>
</head>
<body>
  <form method="get">
    <select name="ordem" onchange="this.form.submit()">
      <option></option>
      <option value="nome" <?php echo ($ordem == "nome")?"selected":"" ?>>Ordenar por nome</option>
      <option value="idade" <?php echo ($ordem == "idade")?"selected":"" ?>>Ordenar por idade</option>
    </select>
    <br>
    <br>
    <br>
  </form>

  <table border="1" width="400">
    <tr>
      <th>Nome</th>
      <th>Idade</th>
    </tr>
    <?php
      $sql = $pdo->query($sql);

      if($sql->rowCount() > 0){
        foreach($sql->fetchAll() as $usuario):
          ?>
          <tr>
            <td><?php echo $usuario['nome'] ?></td>
            <td><?php echo $usuario['idade'] ?></td>
          </tr>
          <?php
        endforeach;
      }
    ?>
  </table>
</body>
</html>