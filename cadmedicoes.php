<?php
require 'conexao.php';
date_default_timezone_set('America/Sao_Paulo');
$ano=$_POST['ano'];
$cliente=$_POST['id'];
$loeesf=$_POST['loeesf'];
$lodesf=$_POST['lodesf'];
$loecil=$_POST['loecil'];
$lodcil=$_POST['lodcil'];
$loeeixo=$_POST['loeeixo'];
$lodeixo=$_POST['lodeixo'];
$poeesf=$_POST['poeesf'];
$podesf=$_POST['podesf'];
$poecil=$_POST['poecil'];
$podcil=$_POST['podcil'];
$poeeixo=$_POST['poeeixo'];
$podeixo=$_POST['podeixo'];
$adicao=$_POST['adicao'];
$medico=$_POST['medico'];

$count=$dbn->query("INSERT INTO medicao (`anomedicao`, `idcliente`, `loeesf`, `lodesf`, `loecil`, `lodcil`, `loeeixo`, `lodeixo`, `poeesf`, `podesf`, `poecil`, `podcil`, `poeeixo`, `podeixo`, `adicao`,`medico`) VALUES ('$ano','$cliente','$loeesf','$lodesf','$loecil','$lodcil','$loeeixo','$lodeixo','$poeesf','$podesf','$poecil','$podcil','$poeeixo','$podeixo','$adicao','$medico')");

if($count){
    header("location:sucesso.php");
}
else{
    header("location:falha.php");
}
?>