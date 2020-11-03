<?php

  session_start();

  include_once 'conexao.php';

  //recebendo dados do formulário.

  if(isset($_POST)){

  $nome = filter_input(INPUT_POST, 'NomeUser', FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_POST, 'EmailUser', FILTER_SANITIZE_EMAIL);
  $senha = filter_input(INPUT_POST, 'SenhaUser');
  $dir = "imagens/";
  $imagem = $_FILES['FileUser'];
  $destino = "$dir/".$imagem["name"];

  if(move_uploaded_file($imagem["tmp_name"], $destino)){
      echo "Arquivo Enviado Com Sucesso";
  }
  else{
      echo "Erro, Arquivo não pode ser enviado";
  }

  


  

  //Inserir no BD.

  $cad_cont = "INSERT INTO usuario (nome, email, senha, imagem) VALUES (:nome, :email, :senha, :imagem)";

  $insert_cont = $con -> prepare ($cad_cont); 
  $insert_cont -> bindParam(':nome', $nome); 
  $insert_cont -> bindParam(':email', $email);
  $insert_cont -> bindParam(':senha', $senha);
  $insert_cont -> bindParam(':imagem',$destino);

  if ($insert_cont -> execute()) {
  		echo "<br>Cadastro efutuado com sucesso.";

  }else{
  		echo "<br>Cadastro não efutuado.";

  }

  }
  else{
  	echo "<br>Não foi possivel acessar o BD";
  }

?>