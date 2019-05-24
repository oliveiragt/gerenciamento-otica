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
$count=$dbn->query("UPDATE vendedores SET nomevendedor='$nome',sobrenome='$sobrenome' WHERE idvendedor='$id'");
if($count){
    header("location:sucesso.php");
}
else{
    header("location:falha.php");
}
?>