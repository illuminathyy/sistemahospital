<?php
$servidor = 'localhost';
$banco = 'bdhospital';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
?>