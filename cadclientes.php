<?php
require 'conexao.php';
$nome=$_POST['nome'];
$sobrenome=$_POST['sobrenome'];
$endereco=$_POST['endereco'];
$datanasc=$_POST['datanasc'];
$telefone=$_POST['telefone'];
$count=$dbn->query("INSERT INTO clientes (nomecliente,sobrenomecliente,endereco,datanasc,telefone) VALUES ('$nome','$sobrenome','$endereco','$datanasc','$telefone')");
if($count){
    header("location:sucesso.php");
}
else{
    header("location:falha.php");
}
?>