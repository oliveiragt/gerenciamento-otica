<?php
session_start();
require 'conexao.php';
if(isset($_SESSION['login']) == true &&  !empty($_SESSION['login']))
{   
    $nome=$_SESSION['nome'];
  }
  else{
    header('Location:falhaacesso.html');
  }
$nome=$_POST['nome'];
$sobrenome=$_POST['sobrenome'];
$email=$_POST['email'];
$senha=$_POST['senha'];
$level=$_POST['level'];
$count=$dbn->query("INSERT INTO usuario (nome,sobrenome,email,senha,nivel) VALUES ('$nome','$sobrenome','$email','$senha','$level')");
if($count){
    header("location:sucesso.php");
}
else{
    header("location:falha.php");
}
?>