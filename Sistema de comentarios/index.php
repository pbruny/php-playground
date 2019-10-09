<?php
  require 'config.php';

  if(isset($_POST['nome']) && !empty($_POST['nome'])){
    
    $nome = addslashes($_POST['nome']);
    $msg = addslashes($_POST['mensagem']);

    $sql = $pdo->prepare("INSERT INTO mensagens SET nome = :nome, msg = :msg, data_msg = NOW()");
    $sql->bindValue(":nome", $nome);
    $sql->bindValue(":msg", $msg);
    $sql->execute();
  }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Comentários</title>
</head>

<body>
  <fieldset>
    <form method="post">
      Nome: <br>
      <input type="text" name="nome">
      <br><br>
      Mensagem: <br>
      <textarea name="mensagem"></textarea><br><br>

      <input type="submit" value="Enviar mensagem">
  </fieldset>
  </form>
  <br>
  <br>
  <br>

  <?php
    $sql = "SELECT * FROM mensagens ORDER BY data_msg DESC";
    $sql = $pdo->query($sql);
  
    if($sql->rowCount() > 0){
      foreach($sql->fetchAll() as $mensagem):
      ?>  
        <strong><?php echo $mensagem['nome']; ?></strong><br>
        <?php echo $mensagem['msg']; ?>
        <hr>
  
      <?php
      endforeach;
    } else {
      echo "Não há mensagens!";
    }
  ?>


</body>

</html>