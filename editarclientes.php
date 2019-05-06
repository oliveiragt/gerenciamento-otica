<?php
require 'conexao.php';
$id=$_POST['id'];
$nome=$_POST['nome'];
$sobrenome=$_POST['sobrenome'];
$endereco=$_POST['endereco'];
$datanasc=$_POST['datanasc'];
$telefone=$_POST['telefone'];
$count=$dbn->query("UPDATE clientes SET nome='$nome',sobrenome='$sobrenome',endereco='$endereco',datanasc='$datanasc',telefone='$telefone' WHERE idcliente='$id'");
if($count){
    header("location:sucesso.php");
}
else{
    header("location:falha.php");
}
?>