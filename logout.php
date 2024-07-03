<?php
// Inicia a sessão
session_start();

// Limpa todos os dados da sessão
$_SESSION = array();

// Destroi a sessão
session_destroy();

// Redireciona o usuário para a página de login
header("Location: login.php");
exit;
?>
