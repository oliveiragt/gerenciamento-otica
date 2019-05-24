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
$id=$_POST['id'];
$nome=$_POST['nome'];
$sobrenome=$_POST['sobrenome'];
$email=$_POST['email'];
$senha=$_POST['senha'];
$level=$_POST['level'];
$count=$dbn->query("UPDATE usuario SET nome='$nome',sobrenome='$sobrenome',email='$email',senha='$senha',nivel='$level' WHERE idusuario='$id'");
if($count){
    header("location:sucesso.php");
}
else{
    header("location:falha.php");
}
?>