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
$datanasc=$_POST['datanasc'];
$telefone=$_POST['telefone'];
$cep=$_POST['cep'];
$rua=$_POST['rua'];
$numero=$_POST['numero'];
$bairro=$_POST['bairro'];
$cidade=$_POST['cidade'];
$estado=$_POST['uf'];
$count=$dbn->query("INSERT INTO clientes (nomecliente,sobrenomecliente,datanasc,telefone,cep,rua,numero,bairro,cidade,estado) VALUES ('$nome','$sobrenome','$datanasc','$telefone','$cep','$rua','$numero','$bairro','$cidade','$estado')");
if($count){
    header("location:sucesso.php");
}
else{
    header("location:falha.php");
}
?>