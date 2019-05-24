<?php
session_start();
if(isset($_SESSION['login']) == true &&  !empty($_SESSION['login']))
{   
    $nome=$_SESSION['nome'];
  }
  else{
    header('Location:falhaacesso.html');
  }
require 'conexao.php';
$nome=$_POST['nome'];
$sobrenome=$_POST['sobrenome'];
$count=$dbn->query("INSERT INTO vendedores (nomevendedor,sobrenome) VALUES ('$nome','$sobrenome')");
if($count){
    header("location:sucesso.php");
}
else{
    header("location:falha.php");
}
?>