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
$endereco=$_POST['endereco'];
$datanasc=$_POST['datanasc'];
$telefone=$_POST['telefone'];
$cep=$_POST['cep'];
$rua=$_POST['rua'];
$numero=$_POST['numero'];
$bairro=$_POST['bairro'];
$cidade=$_POST['cidade'];
$estado=$_POST['uf'];
$count=$dbn->query("UPDATE clientes SET nomecliente='$nome',sobrenomecliente='$sobrenome',endereco='$endereco',datanasc='$datanasc',telefone='$telefone',cep='$cep',rua='$rua',numero='$numero',bairro='$bairro',cidade='$cidade',estado='$estado' WHERE idcliente='$id'");
if($count){
    header("location:sucesso.php");
}
else{
    header("location:falha.php");
}
?>