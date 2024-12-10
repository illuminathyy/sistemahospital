<?php
session_start();
include 'conexao.php';

if (!isset($_SESSION['usuario']) || $_SESSION['tipo'] !== 'enfermeiro') {
    header("Location: loginenfermeiro.php");
    exit();
}

$sql = "SELECT id, dataadministracao, horaadministracao, leito FROM receita";
$result = $conexao->query($sql);
$receitas = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receitas Pendentes</title>
</head>

<body>
    <h1>Receitas Pendentes</h1>
    <table border="1">
        <tr>
            <th>Data</th>
            <th>Hora</th>
            <th>Leito</th>
        </tr>
        <?php foreach ($receitas as $receita): ?>
            <tr>
                <td><?= $receita['dataadministracao']; ?></td>
                <td><?= $receita['horaadministracao']; ?></td>
                <td><?= $receita['leito']; ?></td>
                <td><a href="registraradministracao.php?id=<?= $receita['id']; ?>">Registrar Administração</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="logout.php">Sair</a>
</body>

</html>