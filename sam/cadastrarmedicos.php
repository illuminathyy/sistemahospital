<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $especialidade = $_POST['especialidade'] ?? '';
    $crm = $_POST['crm'] ?? '';
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (!empty($nome) && !empty($especialidade) && !empty($crm) && !empty($usuario) && !empty($senha)) {
        $codigosql = "INSERT INTO `medico` (`id`, `nome`, `especialidade`, `crm`, `usuario`, `senha`) 
                      VALUES (NULL, '$nome', '$especialidade', '$crm', '$usuario', '$senha')";

        try {
            $resultado = $conexao->query($codigosql);
            if ($resultado) {
                echo "<p>Comando executado! Médico cadastrado com sucesso.</p>";
            } else {
                echo "<p>Erro ao executar o comando!</p>";
            }
        } catch (Exception $e) {
            echo "<p>Erro: " . $e->getMessage() . "</p>";
        }

        $conexao = null;
    } else {
        echo "<p>Por favor, preencha todos os campos.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Médicos</title>
</head>

<body>
    <h1>Cadastro de Médicos</h1>
    <form action="" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required><br>

        <label for="especialidade">Especialidade:</label>
        <input type="text" name="especialidade" id="especialidade" required><br>

        <label for="crm">CRM:</label>
        <input type="text" name="crm" id="crm" required><br>

        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario" id="usuario" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required><br><br>

        <input type="submit" value="Salvar">
    </form>
</body>

</html>