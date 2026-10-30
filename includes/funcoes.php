<?php
/**
 * Funções reutilizáveis do Portal do Aluno.
 */

// TODO 25 — Validação do formato do e-mail.
function validarEmail(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

// TODO 26 (bônus) — Remover espaços no início e no final do texto.
function tratarTexto(string $texto): string
{
    return trim($texto);
}

/**
 * Escapar conteúdo variável antes de exibi-lo em HTML.
 * Garante que textos como <h1>Ana</h1> não sejam interpretados como tags.
 */
function escaparHtml(string|int $valor): string
{
    return htmlspecialchars((string) $valor, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
