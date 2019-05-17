<?php
require 'conexao.php';
$id=$_POST['id'];
$nome=$_POST['nome'];
$sobrenome=$_POST['sobrenome'];
$count=$dbn->query("UPDATE vendedores SET nomevendedor='$nome',sobrenome='$sobrenome' WHERE idvendedor='$id'");
if($count){
    header("location:sucesso.php");
}
else{
    header("location:falha.php");
}
?>