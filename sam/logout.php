<?php
session_start();
session_destroy(); // Encerra a sessão
header("Location: loginmedico.php"); // Redireciona para o login
exit();
