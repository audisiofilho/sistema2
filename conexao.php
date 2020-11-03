<?php 
  //credenciais de acesso ao BD
  define('HOST', 'localhost');
  define('USER', 'root');
  define('PASS', '');
  define('DBNAME', 'sistema2');
 
 $con = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';',USER, PASS);

?>