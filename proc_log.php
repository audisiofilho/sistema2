<?php

session_start();

include_once 'conexao.php';

$email = addslashes($_POST["email"]);
$senha = addslashes($_POST["senha"]);
$senhamd5 = md5($senha);

echo "<head><title>Logado</title></head>";

if(
    (isset($email)&&isset($senha))
    &&
    (($email!="")&&($senha!=""))
)
{
    $log_cont = "SELECT * FROM usuario WHERE email LIKE ? AND senha LIKE ?";

    $select_login = $con -> prepare($log_cont);

    $select_login->bindParam(1, $email);
    $select_login->bindParam(2, $senhamd5);

    $select_login->execute();
    $resultado = $select_login->fetchAll();

    $logado= false;

    foreach($resultado as $item)
    {
        $logado = true;
        $_SESSION['id'] = $item['id'];
        $_SESSION['nome'] = $item['nome'];
        $_SESSION['email'] = $item['email'];
        $_SESSION['imagem'] = $item['imagem'];
      
    }

    if($logado){
       header('location: painel.php');
    }
    else
    {
        $_SESSION['msg'] = "<div class='notification is-danger'><p style='color:white;'>Você Não Possui Um Login, Cadastre-se e tente novamente.</p></div>";
  	header("Location: index.php");
    }
}
else
{
    $_SESSION['msg'] = "<div class='notification is-warning'><p style='color:white;'>Campos Não Preenchidos.</p></div>";
    header("Location: index.php");
}

?>