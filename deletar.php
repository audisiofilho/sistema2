<?php
    session_start();
    include_once 'conexao.php';
    if(!isset($_SESSION['id'])){
        echo "faça login";
        echo "<a href='index.php'>faça seu login</a>";
        
    }
    else{

        $stmt = $con->prepare("DELETE FROM usuario WHERE id = ?");
        
        $valor = $_SESSION['id'];
        $stmt->bindParam(1,$valor);

        $stmt->execute();

        $_SESSION['msg'] = "<div class='notification is-danger'><p style='color:white;'>Perfil Deletado!</p></div>";
        header("Location: index.php");
        

    }


?>