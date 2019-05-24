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
$id = $_GET['id'];

$count = $dbn->exec("DELETE FROM estoque, produtos
USING estoque
INNER JOIN produtos USING(idproduto)
WHERE estoque.idproduto='$id'");
if ($count){
    header("location:sucesso.php");
    }
    else {
        header("location:falha.php");
    }
?>