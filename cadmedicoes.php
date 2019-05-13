<?php
require 'conexao.php';
date_default_timezone_set('America/Sao_Paulo');
echo "<pre>";
var_dump($_POST);
echo "</pre>";
exit;

$count=$dbn->query("INSERT INTO produtos (descricao,quantidade,unidade,valorproduto) VALUES ('$descricao','$quantidade','$unidade','$valor')");
$id=$dbn->lastInsertId();
if($count and $count2){
    header("location:sucesso.php");
}
else{
    header("location:falha.php");
}
?>