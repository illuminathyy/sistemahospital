<?php
session_start();
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Consulta para verificar se o usuário existe e pegar a senha
    $sql = "SELECT * FROM enfermeiro WHERE usuario = :usuario";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->execute();
    $enfermeiro = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se o usuário existe e a senha está correta
    if ($enfermeiro && $senha == $enfermeiro['senha']) {
        $_SESSION['usuario'] = $enfermeiro['usuario'];
        $_SESSION['tipo'] = 'enfermeiro';
        header("Location: receitaspendentes.php");
        exit();
    } else {
        echo "<p>Usuário ou senha inválidos!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Enfermeiro</title>
</head>

<body>
    <h1>Login de Enfermeiro</h1>
    <form action="" method="POST">
        <label for="usuario">Usuário:</label>
        <input type="text" id="usuario" name="usuario" required><br>

        <label for="senha">Senha:</label>
        <input type="text" id="senha" name="senha" required><br><br>

        <input type="submit" value="Entrar">
    </form>
</body>

</html>