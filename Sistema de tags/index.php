<?php
  require 'config.php';

  $sql = "SELECT caracteristicas FROM usuarios";
  $sql = $pdo->query($sql);

  if($sql->rowCount() > 0){
    $lista = $sql->fetchAll();

    $caracteristicas = array();

    foreach($lista as $caracteristica_usuario){
      $palavras = explode(",", $caracteristica_usuario['caracteristicas']);
      foreach($palavras as $palavra){
        $palavra = trim($palavra);

        if(isset($caracteristicas[$palavra])){
          $caracteristicas[$palavra]++;
        } else {
          $caracteristicas[$palavra] = 1;
        }
      }
    }
    
    $palavras = array_keys($caracteristicas);
    $contagens = array_values($caracteristicas);

    $maior = max($contagens);
    $tamanhos = array(11, 14, 20, 30);

    for($i = 0; $i < count($palavras); $i++){
      $n = $contagens[$i] / $maior;

      $h = ceil($n * count($tamanhos));

      echo "<p style='font-size:".$tamanhos[$h-1]."px'>".$palavras[$i]."</p>";

    }



  }
  

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sistema de Tags</title>
</head>
<body>
  
</body>
</html>