<?php

$dsn = 'mysql:dbname=loja_virtual;host=localhost;charset=utf8';
$user = 'root';
$password = '';

try{
  $conn = new PDO($dsn, $user, $password);
}catch (PDOException $e){
  die('DB Error: ' . $e->getMessage());
}

?>