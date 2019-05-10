<?php
require 'conexao.php';
$id=$_POST['id'];
$referencia=$_POST['referencia'];
$descricao=$_POST['descricao'];
$unidade=$_POST['unidade'];
$valor=$_POST['valor'];
$quantidade=$_POST['quantidade'];

$count=$dbn->query("UPDATE produtos SET referencia='$referencia',descricao='$descricao',unidade='$unidade',valor='$valor',quantidade='$quantidade' WHERE idproduto='$id'");
if($count){
    header("location:sucesso.php");
}
else{
    header("location:falha.php");
}
?>