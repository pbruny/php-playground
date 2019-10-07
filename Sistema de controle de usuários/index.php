<?php 
    require 'config.php'
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Controle de Usuários</title>
    <style>
        #tabela {
            border-collapse: collapse;
            margin: auto;
        }

        #tabela td, #tabela th {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }

        #tabela tr:nth-child(even){background-color: #f2f2f2;}

        #tabela tr:hover {background-color: #ddd;}

        #tabela th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #198cff;
            color: white;
        }
    </style>    
</head>
<body>
    <a href="adicionar.php">Adicionar Usuário</a>
    <table border="0" width="80%" id="tabela">
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <?php
            $sql = "SELECT * FROM users";
            $sql = $pdo->query($sql);
            if($sql->rowCount() > 0){
                foreach($sql->fetchAll() as $usuario){
                    echo '<tr>';
                    echo '<td>'.$usuario['nome'].'</td>';
                    echo '<td>'.$usuario['email'].'</td>';
                    echo '<td><a href="editar.php?id='.$usuario['id'].'">Editar</a> - <a href="excluir.php?id='.$usuario['id'].'">Excluir</a></td>';
                    echo '</tr>';
                }
            }
        ?>
    </table>
</body>
</html>