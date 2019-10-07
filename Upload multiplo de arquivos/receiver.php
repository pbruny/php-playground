<?php
  $arquivo = $_FILES['arquivo'];

  if(isset($arquivo['tmp_name']) && !empty($arquivo['tmp_name'])){
    if(count($arquivo['tmp_name']) > 0){
      for($i = 0; $i < count($arquivo['tmp_name']); $i++){
        $file_name = md5(time().rand(0,99)).'.png';
        move_uploaded_file($arquivo['tmp_name'][$i], 'files/'.$file_name);
      }
    }

    echo 'Arquivos enviados com sucesso!';
  } else {
    header("Location: index.php");
  }
?>