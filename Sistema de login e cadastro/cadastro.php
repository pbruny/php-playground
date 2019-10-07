<?php 

if(isset($_POST['email']) && empty($_POST['email']) == false) {
    $email = addslashes($_POST['email']);
    $password = md5(addslashes($_POST['password']));


    $dsn = "mysql:dbname=blog;host=localhost";
    $dbuser = "root";
    $dbpassword = "root";

    try{
        $db = new PDO($dsn, $dbuser, $dbpassword);

        $sql = ("INSERT INTO `users`(`email`, `senha`) VALUES (:email, :password)");
        $sql = $db->prepare($sql);

        $sql->bindValue(':email', $email);
        $sql->bindValue(':password', $password);
        $sql->execute();

        if($sql->rowCount() > 0){
            echo "User inserted!";
            header("Location: login.php");
        }

    } catch (PODException $e){
        echo "falhou".$e->getMessage();
    }
}

?>

<html>
    <head>
        <!-- <meta charset="UTF-8"> -->
        <title>Cadastro no Blog do Blogoso</title>
    </head>

    <body>

        <h1>Faça seu cadastro!</h1>

        <form method="POST">
        
            <label for="login-input">E-mail:</label>
            <br><br>
            <input type="text" id="login-input" name="email" placeholder="e-mail">
            <br><br>
            <label for="password-input">Senha:</label>
            <br><br>
            <input type="password" id="password-input" name="password" placeholder="******">
            <br><br>
            <input type="submit" value="Cadastrar">

        </form>
    </body>
</html>