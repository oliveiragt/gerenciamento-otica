<?php
require 'conexao.php';
$nome=$_POST['nome'];
$sobrenome=$_POST['sobrenome'];
$nomefull= "$nome " . "$sobrenome";
$email=$_POST['email'];
$senha=$_POST['senha'];
$level=$_POST['level'];
$count=$dbn->query("INSERT INTO usuario (nome,email,senha,nivel) VALUES ('$nomefull','$email','$senha','$level')");
if($count){
    header("location:sucesso.php");
}
else{
    header("location:falha.php");
}
?>