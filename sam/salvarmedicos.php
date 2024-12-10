<?php
include 'conexao.php';

$nome = $_GET['nome'];
$especialidade = $_GET['especialidade'];
$crm = $_GET['crm'];
$usuario = $_GET['usuario'];
$senha = $_GET['senha'];

$codigosql = "INSERT INTO `medico` (`id`, `nome`, `especialidade`, `crm`, `usuario`, `senha`) VALUES (NULL, '$nome', '$especialidade', '$crm', '$usuario', '$senha')";

try {
    $resultado = $conexao->query($codigosql);
    if($resultado) {
	echo "Comando executado!";
    } else {
	echo "Erro ao executar o comando!";
    }
} catch (Exception $e) {
    echo "Erro $e";
}

$conexao = null;
?>

