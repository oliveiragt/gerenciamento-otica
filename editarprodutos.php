<?php
require 'conexao.php';
$id=$_POST['id'];
$descricao=$_POST['descricao'];
$unidade=$_POST['unidade'];
$valor=$_POST['valor'];

$count=$dbn->query("UPDATE produtos SET descricao='$descricao',unidade='$unidade',valorproduto='$valor' WHERE idproduto='$id'");
if($count){
    header("location:sucesso.php");
}
else{
    header("location:falha.php");
}
?>