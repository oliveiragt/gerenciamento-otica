<?php
$dsn = 'mysql:dbname=otica;host=127.0.0.1';
$user = 'root';
$password = '';
try {
    $dbn = new PDO($dsn,$user,$password);
    $dbn->exec('SET CHARACTER SET utf8'); // acerta a acentuação vinda do banco de dados

}
catch(PDOException $e){
    echo "Connection failed: ". $e->getMessage();
}
?>