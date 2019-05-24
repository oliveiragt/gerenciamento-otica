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
$descricao=$_POST['descricao'];
$valor=$_POST['valor'];

$count=$dbn->query("UPDATE produtos SET descricao='$descricao',valorproduto='$valor' WHERE idproduto='$id'");
if($count){
    header("location:sucesso.php");
}
else{
    header("location:falha.php");
}
?>