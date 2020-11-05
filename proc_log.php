<?php

include_once 'conexao.php';

$email = $_POST["email"];
$senha = $_POST["senha"];

if(
    (isset($email)&&isset($senha))
    &&
    (($email!="")&&($senha!=""))
)
{
    $log_cont = "SELECT * FROM usuario WHERE email LIKE ? AND senha LIKE ?";

    $select_login = $con -> prepare($log_cont);

    $select_login->bindParam(1, $email);
    $select_login->bindParam(2, $senha);

    $select_login->execute();
    $resultado = $select_login->fetchAll();

    $logado= false;

    foreach($resultado as $item)
    {
        $logado = true;
        $nome = $item['nome'];
        $email = $item['email'];
        $imagem = $item['imagem'];
    }

    if($logado){
        echo "<center>logado com sucesso.<br></center>";
        echo "<center>Você é: ".$nome."<br></center>";
        echo "<center>Seu email é: ".$email."<br></center>";
        echo "<center>Sua imagem é: <img src='$imagem' height='50' width='50'> </center";
    }
    else
    {
        echo "Erro no acesso.";
    }
}
else
{
    echo "Campos não preenchidos.";
}

?>