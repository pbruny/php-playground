<?php 
    session_start();
    require 'config.php';

    if(isset($_POST['agencia']) && !empty($_POST['agencia'])){
        $agencia = addslashes($_POST['agencia']);
        $conta = addslashes($_POST['conta']);
        $senha = md5(addslashes($_POST['senha']));
        
        $sql = $pdo->prepare("SELECT * FROM contas WHERE agencia = :agencia AND conta = :conta AND senha = :senha");
        $sql->bindValue(":agencia", $agencia);
        $sql->bindValue(":conta", $conta);
        $sql->bindValue(":senha", $senha);
        $sql->execute();

        if($sql->rowCount() > 0){
            $user = $sql->fetch();
            
            $_SESSION['logado'] = addslashes($user['id']);
            header("Location: index.php");
            exit;
        } else {
            header("Location: login.php");
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Entre no Banco do Desatre Financeiro</title>
</head>
<body>
    <h1>Olá cliente, faça o seu login ou crie já sua conta!</h1>

    <form method="post">
        <label for="agencia">Agencia: </label><br>
        <input type="number" name="agencia"><br><br>
        <label for="conta">Conta: </label><br>
        <input type="number" name="conta"><br><br>
        <label for="senha">Senha: </label><br>
        <input type="password" name="senha"><br><br>
        <input type="submit" value="Entrar">
        <a href="./cadastrar.php">Entre já para o Banco do Desastre Financeiro</a>
    </form>
</body>
</html>