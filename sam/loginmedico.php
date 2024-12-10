<?php
include 'conexao.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $codigosql = "SELECT * FROM `medico` WHERE `usuario` = '$usuario' AND `senha` = '$senha'";

    try {
        $resultado = $conexao->query($codigosql);
        if ($resultado && $resultado->rowCount() > 0) {

            $_SESSION['usuario'] = $usuario;
            header("Location: cadastrarpaciente.php");
            exit();
        } else {
            echo "Usuário ou senha inválidos!";
        }
    } catch (Exception $e) {
        echo "Erro ao executar o comando: $e";
    }

    $conexao = null;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Médico</title>
</head>

<body>
    <h1>Login Médico</h1>
    <form action="" method="POST">
        <label for="usuario">Usuário:</label>
        <input type="text" id="usuario" name="usuario" required>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
        <br><br>
        <button type="submit">Entrar</button>
    </form>
</body>

</html>