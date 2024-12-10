<?php
include 'conexao.php';
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: loginmedico.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $paciente = $_POST['paciente'];
    $medicamento = $_POST['medicamento'];
    $dataadministracao = $_POST['dataadministracao'];
    $horaadministracao = $_POST['horaadministracao'];
    $dose = $_POST['dose'];

    // Insere os dados da receita no banco
    $codigosql = "INSERT INTO `receita` (`id`, `paciente`, `medicamento`, `dataadministracao`, `horaadministracao`, `dose`) 
                  VALUES (NULL, '$paciente', '$medicamento', '$dataadministracao', '$horaadministracao', '$dose')";

    try {
        $resultado = $conexao->query($codigosql);
        if ($resultado) {
            echo "Receita cadastrada com sucesso!";
        } else {
            echo "Erro ao cadastrar a receita!";
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
    <title>Cadastrar Receita</title>
</head>

<body>
    <h1>Cadastrar Receita</h1>
    <form action="" method="POST">
        <label for="paciente">Nome do Paciente:</label>
        <input type="text" id="paciente" name="paciente" required>
        <br>
        <label for="medicamento">Nome do Medicamento:</label>
        <input type="text" id="medicamento" name="medicamento" required>
        <br>
        <label for="dataadministracao">Data da Administração:</label>
        <input type="date" id="dataadministracao" name="dataadministracao" required>
        <br>
        <label for="horaadministracao">Hora da Administração:</label>
        <input type="time" id="horaadministracao" name="horaadministracao" required>
        <br>
        <label for="dose">Dose:</label>
        <input type="text" id="dose" name="dose" required>
        <br><br>
        <button type="submit">Cadastrar Receita</button>
    </form>
    <br>
    <a href="logout.php">Sair</a>
</body>

</html>