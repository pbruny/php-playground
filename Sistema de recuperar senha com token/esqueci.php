<?php
    require 'config.php';

    if(isset($_POST['email']) && !empty($_POST['email'])) {
        $email = addslashes($_POST['email']);
        $sql = "SELECT * FROM usuario WHERE email = :email";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount() > 0){
            $sql = $sql->fetch();
            $id = $sql['id'];
            $token = md5(time().rand(0,9999).rand(0,9999));

            $sql = "INSERT INTO usuarios_token (id_usuario, hash, expirado_em) VALUES (:id_usuario, :hash, :expirado_em)";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":id_usuario", $id);
            $sql->bindValue(":hash", $token);
            $sql->bindValue(":expirado_em", date('Y-m-d H:i', strtotime('+2 months')));
            $sql->execute();

            $link = "http://localhost/redefinir.php?token=".$token;
            $mensagem = "Para redefinir sua senha, clique no link a seguir: ";
            ?>
            <h3>Para redefinir sua senha <a href="<?php echo $link ?>">clique aqui</a></h3>
            <?php

            $assunto = "Redefinição de senha";
            $headers = 'From: localhost@localhost.com'."\r\n".'X-Mailer: PHP/'.phpversion();
            // mail($mensagem, $assunto, $headers);
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
    <title>Recuperar senha</title>
</head>
<body>
    <form action="" method="post">
        <label for="email">Email:</label><br/>
        <input type="email" name="email" id=""><br><br>
        <input type="submit" value="Recuperar senha">
    </form>
</body>
</html>