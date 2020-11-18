<?php

   session_start();
   unset($_SESSION['id']);
   unset($_SESSION['nome']);
   unset($_SESSION['nome']);
   unset($_SESSION['imagem']);
   
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="shortcut icon" href="favicon.ico">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	    <link rel="stylesheet" href="css/bulma.min.css">
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <script>
            function cadastar(){
            window.location.href = "cadastro.php";
            }
        </script>

    </head>

    <body style = "background-color: white;">
      
        <section class="hero is-success is-fullheight">
            <div class="hero-body">
                <div class="container has-text-centered">
                    <div class="column is-4 is-offset-4">
        
                        <center><h1 class="title has-text-black">Login De Usuário!</h1></center>
                        <?php
                        if (isset($_SESSION['msg'])) {
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }
                        ?>
                        <form name="login" method="POST" action="proc_log.php">
                                <!--EMAIL-->
                                <div class="field">
                                    <div class="control">
                                        <div style="font-size: medium;" class="title has-text-black">Email:</div><input type="email" class="input is-medium" name="email"><br>
                                    </div>
                                </div>
                                <!--SENHA-->
                                <div class="field">
                                    <div class="control">
                                        <div style="font-size: medium;" class="title has-text-black">Senha:</div><input type="password" class="input is-medium" name="senha"><br>
                                    </div>
                                </div>
                                               <input type="submit"  value="Login" class="button is-block is-link is-large is-fullwidth">
        
        
                            </form>
                            <br>
                            <button class="button is-block is-link is-large is-fullwidth" onclick="return cadastar()">Fazer cadastro</button>
        
                        </div>
        
                    </div>
                </div>
        
            </div>
        
        </section>
            
    </body>

    
</html>