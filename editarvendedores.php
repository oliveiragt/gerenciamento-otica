<?php
require 'conexao.php';
$id=$_POST['id'];
$nome=$_POST['nome'];
$sobrenome=$_POST['sobrenome'];
$comissao=$_POST['comissao'];
$count=$dbn->query("UPDATE vendedores SET nomevendedor='$nome',sobrenome='$sobrenome',comissao='$comissao' WHERE idvendedor='$id'");
if($count){
    header("location:sucesso.php");
}
else{
    header("location:falha.php");
}
?>