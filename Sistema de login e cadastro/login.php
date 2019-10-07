<?php
    session_start();
    if(isset($_POST['email']) && empty($_POST['email']) == false) {
        $email = addslashes($_POST['email']);
        $password = md5(addslashes($_POST['password']));


        $dsn = "mysql:dbname=blog;host=localhost";
        $dbuser = "root";
        $dbpassword = "root";

        try{
            $db = new PDO($dsn, $dbuser, $dbpassword);

            $sql = $db->query("SELECT * FROM users WHERE email = '$email' AND senha = '$password'");

            if($sql->rowCount() > 0){
                $data = $sql->fetch();

                $_SESSION['id'] = $data['id'];
                header("Location: index.php");
            }

        } catch (PODException $e){
            echo "falhou".$e->getMessage();
        }
    }
?>


<html>
    <head>
        <!-- <meta charset="UTF-8"> -->
        <title>Login no Blog do Blogoso</title>
    </head>

    <body>

        <h1>Faça seu login!</h1>

        <form method="POST">
        
            <label for="login-input">E-mail:</label>
            <br><br>
            <input type="text" id="login-input" name="email" placeholder="e-mail">
            <br><br>
            <label for="password-input">Senha:</label>
            <br><br>
            <input type="password" id="password-input" name="password" placeholder="******">
            <br><br>
            <input type="submit" value="Entrar">
            <a href="./cadastro.php">Cadastre-se agora!</a>

        </form>
    </body>
</html>