<?php
require 'conexao.php';
$id=$_POST['id'];
$descricao=$_POST['descricao'];
$unidade=$_POST['unidade'];
$valor=$_POST['valor'];
$quantidade=$_POST['quantidade'];

$count=$dbn->query("UPDATE produtos SET descricao='$descricao',unidade='$unidade',valorproduto='$valor',quantidade='$quantidade' WHERE idproduto='$id'");
if($count){
    header("location:sucesso.php");
}
else{
    header("location:falha.php");
}
?>