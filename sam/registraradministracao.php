<?php
session_start();
include 'conexao.php';

if (!isset($_SESSION['usuario']) || $_SESSION['tipo'] !== 'enfermeiro') {
    header("Location: loginenfermeiros.php");
    exit();
}

$id_receita = $_GET['id'] ?? null;

$sql = "SELECT * FROM receita WHERE id = :id";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':id', $id_receita);
$stmt->execute();
$receita = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $paciente = $_POST['paciente'];
    $medicamento = $_POST['medicamento'];
    $dataadministracao = $_POST['dataadministracao'];
    $horaadministracao = $_POST['horaadministracao'];
    $dose = $_POST['dose'];
    $data_hora_registro = date('Y-m-d H:i:s');

    $sql = "INSERT INTO administracao (paciente, medicamento, dataadministracao, horaadministracao, dose, data_hora_registro) 
            VALUES (:paciente, :medicamento, :dataadministracao, :horaadministracao, :dose, :data_hora_registro)";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([
        ':paciente' => $paciente,
        ':medicamento' => $medicamento,
        ':dataadministracao' => $dataadministracao,
        ':horaadministracao' => $horaadministracao,
        ':dose' => $dose,
        ':data_hora_registro' => $data_hora_registro
    ]);

    $sql = "UPDATE receita SET status = 'administrado' WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $id_receita);
    $stmt->execute();

    echo "<p>Administração registrada com sucesso!</p>";
    echo "<a href='receitaspendentes.php'>Voltar às Receitas Pendentes</a>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Administração</title>
</head>

<body>
    <h1>Registrar Administração</h1>
    <form action="" method="POST">
        <label for="paciente">Nome do Paciente:</label>
        <input type="text" id="paciente" name="paciente" value="<?= $paciente; ?>" required><br>

        <label for="medicamento">Nome do Medicamento:</label>
        <input type="text" id="medicamento" name="medicamento" value="<?= $medicamento; ?>" required><br>

        <label for="dataadministracao">Data da Administração:</label>
        <input type="date" id="dataadministracao" name="dataadministracao" value="<?= $dataadministracao; ?>" required><br>

        <label for="horaadministracao">Hora da Administração:</label>
        <input type="time" id="horaadministracao" name="horaadministracao" value="<?= $horaadministracao; ?>" required><br>

        <label for="dose">Dose:</label>
        <input type="text" id="dose" name="dose" value="<?= $dose; ?>" required><br>

        <br><input type="submit" value="Registrar Administração">
    </form>
</body>

</html>