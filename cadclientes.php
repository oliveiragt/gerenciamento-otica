<?php
require 'conexao.php';
$nome=$_POST['nome'];
$sobrenome=$_POST['sobrenome'];
$endereco=$_POST['endereco'];
$datanasc=$_POST['datanasc'];
$telefone=$_POST['telefone'];
$cep=$_POST['cep'];
$rua=$_POST['rua'];
$numero=$_POST['numero'];
$bairro=$_POST['bairro'];
$cidade=$_POST['cidade'];
$estado=$_POST['uf'];
$count=$dbn->query("INSERT INTO clientes (nomecliente,sobrenomecliente,endereco,datanasc,telefone,cep,rua,numero,bairro,cidade,estado) VALUES ('$nome','$sobrenome','$endereco','$datanasc','$telefone','$cep','$rua','$numero','$bairro','$cidade','$estado')");
if($count){
    header("location:sucesso.php");
}
else{
    header("location:falha.php");
}
?>