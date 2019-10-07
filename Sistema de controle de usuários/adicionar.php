<?php 
    require 'config.php';
    if(isset($_POST['nome']) && empty($_POST['nome'] == false)){
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $senha = md5(addslashes($_POST['senha']));

        $sql = "INSERT INTO users SET nome = '$nome', email = '$email', senha = '$senha'";
        $pdo->query($sql);

        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adicionar Usuário</title>
</head>
<body>
    <form method="POST">
        Nome: <br>
        <input type="text" name="nome"><br><br>
        Email: <br>
        <input type="email" name="email"><br><br>
        Senha: <br>
        <input type="password" name="senha"><br><br>
        <input type="submit" value="Adicionar">
    </form>
</body>
</html>