<?php

  session_start();

  include_once 'conexao.php';

  echo "<head><title>Cadastrado</title></head>";

  //recebendo dados do formulário.


  if(isset($_POST)){

  $nome = filter_input(INPUT_POST, 'NomeUser', FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_POST, 'EmailUser', FILTER_SANITIZE_EMAIL);
  $senha = filter_input(INPUT_POST, 'SenhaUser');
  $dir = "imagens/";
  $imagem = $_FILES['FileUser'];
  $destino = "$dir/".$imagem["name"];

  if(move_uploaded_file($imagem["tmp_name"], $destino)){
    $_SESSION['msg'] = "<div class='notification is-success'><p style='color:white;'>Imagem Enviada Com Sucesso.</p></div>";
  	header("Location: cadastro.php");

  }
  else{
    $_SESSION['msg'] = "<div class='notification is-danger'><p style='color:red;'>Erro, Imagem Não Pode ser enviada.</p></div>";
  	header("Location: cadastro.php");
  }

  


  

  //Inserir no BD.

  $cad_cont = "INSERT INTO usuario (nome, email, senha, imagem) VALUES (:nome, :email, :senha, :imagem)";

  $insert_cont = $con -> prepare ($cad_cont); 
  $insert_cont -> bindParam(':nome', $nome); 
  $insert_cont -> bindParam(':email', $email);
  $insert_cont -> bindParam(':senha', $senha);
  $insert_cont -> bindParam(':imagem',$destino);

  if ($insert_cont -> execute()) {
    $_SESSION['msg'] = "<div class='notification is-success'><p style='color:white;'>Cadastro Efetuado.</p></div>";
  	header("Location: cadastro.php");

  }else{
    $_SESSION['msg'] = "<div class='notification is-warning'><p style='color:yellow;'>Cadastro Não Efetuado.</p></div>";
    header("Location: cadastro.php");


  }

  }
  else{
    $_SESSION['msg'] = "<div class='notification is-danger'><p style='color:red;'>Erro Ao Acessar o BD.</p></div>";
  	header("Location: cadastro.php");
  }
  

?>