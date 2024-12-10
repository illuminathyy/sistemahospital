<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $coren = $_POST['coren'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "INSERT INTO enfermeiro (nome, coren, usuario, senha) VALUES (:nome, :coren, :usuario, :senha)";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':coren', $coren);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':senha', $senha);

    if ($stmt->execute()) {
        echo "Enfermeiro cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o enfermeiro.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Enfermeiro</title>
</head>

<body>
    <h1>Cadastrar Enfermeiro</h1>
    <form action="" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required><br>

        <label for="coren">COREN:</label>
        <input type="text" name="coren" id="coren" required><br>

        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario" id="usuario" required><br>

        <label for="senha">Senha:</label>
        <input type="text" name="senha" id="senha" required><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>

</html>