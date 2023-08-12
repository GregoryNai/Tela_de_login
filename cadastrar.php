<?php
    require_once('classes/usuario.php');
    require_once('conexao/conexao.php');

    $database = new conexao();
    $db = $database ->getconnection();
    $usuario = new usuario($db);

    if(isset($_POST['cadastrar'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $confsenha = $_POST['confsenha'];

        if($usuario->cadastrar($nome,$email,$senha,$confsenha)){
            echo "cadastro realizado com sucesso!";
        }else{
            echo "erro ao cadastrar";
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type= "text" name="nome" placeholder ="imforme seu nome">
        <label for="email">E-mail</label>
        <input type= "email" name="email" placeholder ="imforme seu email">
        <label for="senha">senha</label>
        <input type= "passaword" name="senha" placeholder ="imforme sua senha">
        <label for=""> confirmae senha </label>
        <input type= "passaword" name="confsenha" placeholder ="confirme sua senha">

        <button type="submit" name="cadastrar">cadastrar</button>

</form>
<a href ="index.php"> voltar para tela de login</a>
</body>
</html>