<?php
require 'conexao.php';
$descricao=$_POST['descricao'];
$referencia=$_POST['referencia'];
$quantidade=$_POST['quantidade'];
$unidade=$_POST['unidade'];
$valor=$_POST['valor'];
$count=$dbn->query("INSERT INTO produtos (descricao,referencia,quantidade,unidade,valor) VALUES ('$descricao','$referencia','$quantidade','$unidade','$valor')");
if($count){
    header("location:sucesso.php");
}
else{
    header("location:falha.php");
}
?>