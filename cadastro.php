<html>
<head>
      <meta charset = "utf-8"/>
      <title>cadastro</title>

      <script type="text/javascript">
		
		function validar() {
			var senha = formCont.SenhaUser.value;
			var repsenha = formCont.RepeatSenhaUser.value;

			if (senha == "" || senha.length <= 7) {
				alert('Preencha o campo de senha com no minimo 8 caracteres.')
				formCont.SenhaUser.focus();
				return false;
			}

			if (repsenha == "" || repsenha.length <= 7) {
				alert('Preencha o campo de repetir senha com no minimo 8 caracteres.')
				formCont.RepeatSenhaUser.focus();
				return false;
			}

			if (senha != repsenha) {
				alert('Senhas Diferentes.');
				formCont.SenhaUser.focus();
				return false;
			}
		}



	</script>
 
</head>

<body>
      
<center>
		   <h1>Cadastrar Usuário!</h1>
		<form name="cadastro" method="POST" action="proc_cad.php" enctype="multipart/form-data">
			Nome de Usuário:<br><input type="text" name="NomeUser" ><br><br>
            Selecionar Imagem:<br><input type="file" name="FileUser" accept="image/*"><br><br>
			Email:<br><input type="text" placeholder="Ex.: Pedro@email.com" name="EmailUser"><br><br>
			Senha:<br><input type="password" placeholder="••••••••" maxlength="8" name="SenhaUser"><br><br>
			Repetir Senha:<br><input type="password" placeholder="••••••••" maxlength="8" name="RepeatSenhaUser"><br><br>

			<input type="submit" onclick="return validar()" value="Cadastrar">

			
		</form>
	</center>
    
</body>
</html>