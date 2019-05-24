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
$observacao=$_POST['observacao'];

$count=$dbn->query("UPDATE vendas SET obs='$observacao' WHERE idvenda='$id'");
if($count){
    header("location:sucesso.php");
}
else{
    header("location:falha.php");
}
?>