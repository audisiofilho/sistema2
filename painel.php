<?php
session_start();
echo "<title>Logado</title>";
echo "<link rel='shortcut icon' href='favicon.ico'>";

if(isset($_SESSION['nome'])&&isset($_SESSION['email'])&&isset($_SESSION['imagem']))
{
    echo "<center><table border='1'";
        echo "<tr><td>ID</td><td>Nome</td><td>Email</td><td>Imagem</td><td>Editar</td><td>Deletar</td><td>Sair</td></tr>";
        echo "<tr><td>".$_SESSION['id']."</td><td>".$_SESSION['nome']."</td><td>".$_SESSION['email']."</td><td><img src='{$_SESSION['imagem']}' height='50' width='50'></td><td>Editar</td><td><a href='deletar.php'>Deletar</a></td><td><a href ='index.php'>sair</a></td></tr>";
        
        echo "logado com sucesso.<br>";
      
        
    echo "</center></table>";
}
else{
    echo "você não fez o login, tente novamente.";
}
?>