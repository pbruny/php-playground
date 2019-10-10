<?php
require 'config.php';
session_start();

if (isset($_POST['email']) && empty($_POST['email']) == false) {
    $email = addslashes($_POST['email']);
    $password = md5($_POST['senha']);

    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$password'";
    $sql = $pdo->query($sql);

    if ($sql->rowCount() > 0) {
        $data = $sql->fetch();

        $_SESSION['logado'] = $data['id'];
        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro por convite</title>
</head>

<body>
    <h1>Entrar</h1>

    <form method="post">
        E-mail: <br>
        <input type="text" name="email">
        <br><br>
        Senha: <br>
        <input type="password" name="senha">
        <br><br>
        <input type="submit" value="Entrar">
        <a href="./cadastrar.php">Cadastrar</a>
    </form>
</body>

</html>