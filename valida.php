<?php
require 'conexao.php';
$email=$_POST['email'];
$senha=$_POST['senha'];
$count = $dbn->query("SELECT * FROM usuario WHERE email='$email' AND senha='$senha'");
$rows = $count->fetchAll(); // assuming $result == true
$n = count($rows);
($n==1) ? header("Location: sistema.php") : header("Location: falhalogin.html");
?>