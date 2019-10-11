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
    <hr>
    <br><br>
    <h3>Movimentação/Extrato</h3>
    <br>
    <a href="./operacao.php">Caixa Eletrônico - BDF</a><br><br>
    <table width="400" border="1">
        <tr>
            <th>Data</th>
            <th>Valor</th>
        </tr>
            <?php 
                $sql = $pdo->prepare("SELECT * FROM historico WHERE id_conta = :id");
                $sql->bindValue(":id", $id);
                $sql->execute();

                if($sql->rowCount() > 0){
                    foreach($sql->fetchAll() as $item){
                        ?>
                        <tr>
                            <td><?php echo date('d/m/Y H:i', strtotime($item['data_operacao'])); ?></td>
                            <td>
                                <?php
                                    if($item['tipo'] == 0): ?>
                                        <span style="color: green;">R$ <?php echo $item['valor']; ?></span>
                                    <?php else: ?>
                                        <span style="color: red;">- R$ <?php echo $item['valor']; ?></span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php
                    }
                }
            ?>
        
    </table>
</body>
</html>