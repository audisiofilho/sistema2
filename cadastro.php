<?php
   session_start();
?>
<!DOCTYPE html>
<html>
<head>
      <meta charset = "utf-8"/>
	  <title>cadastro</title>
	  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	  <link rel="stylesheet" href="css/bulma.min.css">
      <link rel="stylesheet" type="text/css" href="css/login.css">

	  <script type="text/javascript">
	    function logar(){
			window.location.href = "login.html";
		}

		function validar() {
			var senha = cadastro.SenhaUser.value;
			var repeat = cadastro.RepeatSenhaUser.value;

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
								<div style="font-size: medium;" class="title has-text-black">Email:</div><input type="text" placeholder="Ex.: Pedro@email.com" class="input is-medium" name="EmailUser"><br>
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
					<button class="button is-block is-link is-large is-fullwidth" onclick="return logar()">Fazer login</button>

				</div>

			</div>
		</div>

	</div>

</section>
    
</body>
</html>