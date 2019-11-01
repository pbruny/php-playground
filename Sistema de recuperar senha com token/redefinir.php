<?php

    require 'config.php';

    if(!empty($_GET['token']) && isset($_GET['token'])) {
        $token = addslashes($_GET['token']);

        $sql = "SELECT * FROM usuarios_token WHERE hash = :token AND used = 0 AND expirado_em > NOW()";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":token", $token);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            $id = $sql['id_usuario'];

            if(!empty($_POST['senha'])) {
                $senha = addslashes($_POST['senha']);
                $sql = "UPDATE usuario SET senha = :senha WHERE id = :id";
                $sql = $pdo->prepare($sql);
                $sql->bindValue(":senha", md5($senha));
                $sql->bindValue(":id", $id);
                $sql->execute();

                $sql = "UPDATE usuarios_token SET used = 1 WHERE hash = :token";
                $sql = $pdo->prepare($sql);
                $sql->bindValue(":token", $token);
                $sql->execute();

                echo "Senha alterada com sucesso!";
            }

            ?>
            <form method="post">
                <label for="senha">Insira sua nova senha</label><br/>
                <input type="password" name="senha" id=""><br/><br/>
                <input type="submit" value="Redefinir senha">
            </form>
            <?php
        } else {
            echo "Token inválido ou utilizado";
        }

    }
