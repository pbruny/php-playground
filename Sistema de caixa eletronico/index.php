<?php 
    session_start();
    require 'config.php';

    if(empty($_SESSION['logado'])){
        header("Location: login.php");
        exit;
    } else {
        $id = addslashes($_SESSION['logado']);
        $sql = $pdo->prepare("SELECT * FROM contas WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    
        if($sql->rowCount() > 0){
            $user = $sql->fetch();
        } else {
            header("Location: login.php");
            exit;
        }
    }

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Caixa Eletrônico</title>
</head>
<body>
    <h1>Banco do Desastre Financeiro</h1>
    <p>Titular: <?php echo $user['titular']; ?></p>
    <p>Agência: <?php echo $user['agencia']; ?></p>
    <p>Conta: <?php echo $user['conta']; ?></p>
    <p>Saldo: R$ <?php echo $user['saldo']; ?></p>
    <a href="./sair.php">Sair</a>
</body>
</html>