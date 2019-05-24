<?php 
session_start();
$_SESSION['login'] = null;
$_SESSION['senha'] = null;
session_destroy();
header('location:index.html');
?>