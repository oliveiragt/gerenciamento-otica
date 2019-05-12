<?php
require 'conexao.php';
date_default_timezone_set('America/Sao_Paulo');
$descricao=$_POST['descricao'];
$quantidade=$_POST['quantidade'];
$unidade=$_POST['unidade'];
$valor=$_POST['valor'];
$data=date('d/m/Y H:i');

$count=$dbn->query("INSERT INTO produtos (descricao,quantidade,unidade,valorproduto) VALUES ('$descricao','$quantidade','$unidade','$valor')");
$id=$dbn->lastInsertId();
$count2=$dbn->query("INSERT INTO estoque (idproduto,qtdanterior,qtdatual,op,datamov) VALUES ('$id','0','$quantidade','Cadastro','$data')");
if($count and $count2){
    header("location:sucesso.php");
}
else{
    header("location:falha.php");
}
?>