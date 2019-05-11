<?php
require 'conexao.php';
$nome=$_POST['nome'];
$sobrenome=$_POST['sobrenome'];
$comissao=$_POST['comissao'];
$count=$dbn->query("INSERT INTO vendedores (nomevendedor,sobrenome,comissao) VALUES ('$nome','$sobrenome','$comissao')");
if($count){
    header("location:sucesso.php");
}
else{
    header("location:falha.php");
}
?>