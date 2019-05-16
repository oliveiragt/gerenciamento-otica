<?php
require 'conexao.php';
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