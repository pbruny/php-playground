<?php

require 'config.php';

if(!empty($_GET['codigo'])){
    $codigo = addslashes($_GET['codigo']);
    $sql = "SELECT * FROM usuarios WHERE codigo = '$codigo'";
    $sql = $pdo->query($sql);
    
    if($sql->rowCount() == 0){
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: login.php");
    exit;
}

if (!empty($_POST['email'])) {
    $email = addslashes($_POST['email']);
    $senha = md5(addslashes($_POST['senha']));

    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $sql = $pdo->query($sql);

    if ($sql->rowCount() <= 0) {
        $codigo = md5(rand(0,9999).rand(0,9999));
        $sql = "INSERT INTO usuarios (email, senha, codigo) VALUES ('$email', '$senha', '$codigo')";
        $sql = $pdo->query($sql);

        unset($_SESSION['logado']);
        header("Location: index.php");
        exit;
    } else {
        echo "Usuário já existe!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar</title>
</head>

<body>
    <h1>Cadastrar</h1>

    <form action="" method="post">
        E-mail: <br>
        <input type="text" name="email">
        <br><br>
        Senha: <br>
        <input type="password" name="senha">
        <br><br>
        <input type="submit" value="Cadastrar">
    </form>
</body>

</html>