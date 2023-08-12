<?php
session_start();

require_once('classes/usuario.php');
require_once('conexao/conexao.php');

$databese = new conexao();
$db = $databese->getconnection();
$usuario = new usuario($db);

if(isset($_POST['logar'])){
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if($usuario->logar($email, $senha)){
        $_SESSION['email'] = $email;

        header("Location: deshbord.php");
        exit();
    }else{
        print "<script>alert('login invalido)</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento</title>
</head>
<body>
    

<form method="POST">
    <label for="email">e-mail</label>
    <input type="email" name="email" placeholder="coloque se email">
    <label for="senha">senha</label>
    <input type="password" name="senha" placeholder="coloque sua senha">

    <button type="submit" name="logar">logar</button>
</form>
<a href="cadastrar.php">clique aqui para criar uma conta</a>
</body>
</html>