<?php
require 'conexao.php';
$nome=$_POST['nome'];
$sobrenome=$_POST['sobrenome'];
$count=$dbn->query("INSERT INTO vendedores (nomevendedor,sobrenome) VALUES ('$nome','$sobrenome')");
if($count){
    header("location:sucesso.php");
}
else{
    header("location:falha.php");
}
?>