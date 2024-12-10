<?php
include 'conexao.php';
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: loginmedico.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $leito = $_POST['leito'];

    $codigosql = "INSERT INTO `paciente` (`id`, `nome`, `leito`) VALUES (NULL, '$nome', '$leito')";

    try {
        $resultado = $conexao->query($codigosql);
        if ($resultado) {
            echo "Paciente cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar o paciente!";
        }
    } catch (Exception $e) {
        echo "Erro: $e";
    }

    $conexao = null;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pacientes</title>
</head>

<body>
    <h1>Cadastro de Pacientes</h1>
    <form action="" method="POST">
        <label for="nome">Nome do Paciente:</label>
        <input type="text" id="nome" name="nome" required>
        <br>
        <label for="leito">Leito:</label>
        <input type="text" id="leito" name="leito" required>
        <br><br>
        <button type="submit">Cadastrar Paciente</button>
    </form>
    <br>
    <a href="logout.php">Sair</a>
</body>

</html>