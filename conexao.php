<?php
$dsn = 'mysql:dbname=otica;host=127.0.0.1';
$user = 'root';
$password = 'adm170818';
try {
    $dbn = new PDO($dsn,$user,$password);
}
catch(PDOException $e){
    echo "Connection failed: ". $e->getMessage();
}
?>