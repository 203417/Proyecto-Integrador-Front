<?php

$server = 'localhost';
$username = 'mroot';
$password = '1234';
$database = 'pruebas';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}

?>
