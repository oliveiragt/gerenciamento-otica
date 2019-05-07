<?php
require 'conexao.php';
$vendedor=$_POST['vendedor'];
$produto=$_POST['produto'];
$quantidade=$_POST['quantidade'];
$valor=$_POST['valor'];
$produtoaux=$_POST['produtoaux'];
$quantidadeaux=$_POST['qtdaux'];
var_dump($_POST);exit;
$count=$dbn->query("INSERT INTO usuario (nome,sobrenome,email,senha,nivel) VALUES ('$nome','$sobrenome','$email','$senha','$level')");
if($count){
    header("location:sucesso.php");
}
else{
    header("location:falha.php");
}
?>