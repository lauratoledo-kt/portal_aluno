<?php
// TODO 21 — Recuperar a sessão atual.
session_start();

// TODO 22 — Apagar todas as variáveis da sessão.
$_SESSION = [];

// Remover o cookie da sessão, se utilizado pelo servidor.
if (ini_get('session.use_cookies')) {
    $parametros = session_get_cookie_params();
    setcookie(session_name(), '', [
        'expires' => time() - 42000,
        'path' => $parametros['path'],
        'domain' => $parametros['domain'],
        'secure' => $parametros['secure'],
        'httponly' => $parametros['httponly'],
        'samesite' => $parametros['samesite'] ?? 'Lax',
    ]);
}

// TODO 23 — Destruir a sessão no servidor.
session_destroy();

// TODO 24 — Retornar ao início e encerrar o script.
header('Location: index.php');
exit;
