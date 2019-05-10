<?php
require 'conexao.php';
$descricao=$_POST['descricao'];
$referencia=$_POST['referencia'];
$quantidade=$_POST['quantidade'];
$unidade=$_POST['unidade'];
$valor=$_POST['valor'];
$data=date('y-m-d');
$count=$dbn->query("INSERT INTO produtos (descricao,referencia,quantidade,unidade,valor) VALUES ('$descricao','$referencia','$quantidade','$unidade','$valor')");
$id=$dbn->lastInsertId();
$count2=$dbn->query("INSERT INTO estoque (idproduto,qtdanterior,qtdatual,op,datamov) VALUES ('$id','0','$quantidade','Cadastro','$data')");
if($count and $count2){
    header("location:sucesso.php");
}
else{
    header("location:falha.php");
}
?>