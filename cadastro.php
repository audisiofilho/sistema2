<?php
   session_start();
?>
<!DOCTYPE html>
<html>
<head>
      <meta charset = "utf-8"/>
	  <title>Cadastro</title>
	  <link rel="shortcut icon" href="favicon.ico">
	  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	  <link rel="stylesheet" href="css/bulma.min.css">
      <link rel="stylesheet" type="text/css" href="css/login.css">

	  <script type="text/javascript">
	    function logar(){
			window.location.href = "index.php";
		}

		function validar() {
			var nome = cadastro.NomeUser.value;
			var email = cadastro.EmailUser.value;
			var senha = cadastro.SenhaUser.value;
			var repeat = cadastro.RepeatSenhaUser.value;
			
			

			if(nome == ""){
				alert('Preencha o campo de Nome de Usuário.')
				cadastro.NomeUser.focus();
				return false;
				console.log(validar());
		    }
			
			if(email == ""){
				alert('Preencha o campo de Email.')
				cadastro.EmailUser.focus();
				return false;
			}
			

			if (senha == "" || senha.length <= 7) {
				alert('Preencha o campo de senha com no minimo 8 caracteres.')
				cadastro.SenhaUser.focus();
				return false;
			}

			if (repeat == "" || repeat.length <= 7) {
				alert('Preencha o campo de repetir senha com no minimo 8 caracteres.')
				cadastro.RepeatSenhaUser.focus();
				return false;
			}

			if (senha != repeat) {
				alert('Senhas Diferentes.');
				cadastro.SenhaUser.focus();
				return false;
			}
		}



	</script>
 
</head>

<body style = "background-color: white;">
      
<section class="hero is-success is-fullheight">
	<div class="hero-body">
		<div class="container has-text-centered">
			<div class="column is-4 is-offset-4">

				<center><h1 class="title has-text-black">Cadastrar Usuário!</h1></center>
				<?php
				if (isset($_SESSION['msg'])) {
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
				?>

                <?php
				if (isset($_SESSION['msg2'])) {
					echo $_SESSION['msg2'];
					unset($_SESSION['msg2']);
				}
				?>

				<div class="box">
					<form name="cadastro" method="POST" action="proc_cad.php" enctype="multipart/form-data">
						<!--NOME-->
						<div class="field">
							<div class="control">
								<div  style="font-size: medium;" class="title has-text-black">Nome de Usuário:</div><input type="text" class="input is-medium" name="NomeUser" ><br>
							</div>
						</div>
						<!--IMAGEM-->
						<div class="field">
							<div class="control">
								<div style="font-size: medium;" class="title has-text-black">Selecionar Imagem:</div><input type="file" class="input is-medium" name="FileUser" accept="image/*"><br>
							</div>
						</div>
						<!--EMAIL-->
						<div class="field">
							<div class="control">
								<div style="font-size: medium;" class="title has-text-black">Email:</div><input type="email" placeholder="Ex.: Pedro@email.com" class="input is-medium" name="EmailUser"><br>
							</div>
						</div>
						<!--SENHA-->
						<div class="field">
							<div class="control">
								<div style="font-size: medium;" class="title has-text-black">Senha:</div><input type="password" class="input is-medium" placeholder="••••••••" maxlength="8" name="SenhaUser"><br>
							</div>
						</div>
						<!--REPETIR SENHA-->
						<div class="field">
							<div class="control">
								<div style="font-size: medium;" class="title has-text-black">Repetir Senha:</div><input type="password" class="input is-medium" placeholder="••••••••" maxlength="8" name="RepeatSenhaUser"><br>
							</div>
						</div>
						               <input type="submit"  value="Cadastrar" onclick="return validar()" class="button is-block is-link is-large is-fullwidth">


					</form>
					<br>
					<button class="button is-block is-link is-large is-fullwidth" onclick="logar()">Fazer login</button>

				</div>

			</div>
		</div>

	</div>

</section>
    
</body>
</html>