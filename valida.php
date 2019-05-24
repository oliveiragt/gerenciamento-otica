<?php
require 'conexao.php';
$email=$_POST['email'];
$senha=$_POST['senha'];
$count = $dbn->query("SELECT * FROM usuario WHERE email='$email' AND senha='$senha'");
$rows = $count->fetchAll(); 
$n = count($rows);
if($n==1){ 
session_start();
$_SESSION['login']="1";
 $nome=$dbn->query("SELECT * FROM usuario WHERE email='$email'");
foreach($nome as $resultado){
    $_SESSION['nome']=$resultado['nome'] . " " . $resultado['sobrenome'];
}
header("Location: sistema.php"); 
}
else{ 
    header("Location: falhalogin.html");
}
?>