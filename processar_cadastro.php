<?php
// TODO 09 — Iniciar a sessão antes de enviar cabeçalhos HTTP.
session_start();

// TODO 10 — Carregar funções uma única vez.
require_once __DIR__ . '/includes/funcoes.php';

// TODO 11 — Aceitar somente requisições POST.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: cadastro.php');
    exit;
}

// TODO 12 — Receber os campos com segurança e tratar o nome.
// Verificação is_string evita erros se uma requisição enviar arrays inesperados.
$nomeInformado = $_POST['nome'] ?? '';
$emailInformado = $_POST['email'] ?? '';
$idadeInformada = $_POST['idade'] ?? '';

$nome = is_string($nomeInformado) ? tratarTexto($nomeInformado) : '';
$email = is_string($emailInformado) ? tratarTexto($emailInformado) : '';
$idadeTexto = is_string($idadeInformada) ? tratarTexto($idadeInformada) : '';

// O filtro retorna false quando inválido; o número inteiro 0 também é possível.
$idade = filter_var($idadeTexto, FILTER_VALIDATE_INT);

// TODO 13 — Validar na prioridade exigida: nome, e-mail, idade.
$erro = '';
if ($nome === '') {
    $erro = 'O nome do estudante é obrigatório.';
} elseif (!validarEmail($email)) {
    $erro = 'Informe um endereço de e-mail válido.';
} elseif ($idade === false || $idade <= 0) {
    $erro = 'A idade deve ser um número inteiro maior que zero.';
}

// TODO 14 — Salvar erro e campos temporários e retornar ao formulário.
if ($erro !== '') {
    $_SESSION['erro_cadastro'] = $erro;
    $_SESSION['dados_formulario'] = [
        'nome' => $nome,
        'email' => $email,
        'idade' => $idadeTexto,
    ];
    header('Location: cadastro.php');
    exit;
}

// TODO 15 — Armazenar o aluno e uma mensagem temporária de sucesso.
$_SESSION['aluno'] = [
    'nome' => $nome,
    'email' => $email,
    'idade' => $idade,
];
$_SESSION['mensagem_sucesso'] = 'Cadastro realizado com sucesso!';
unset($_SESSION['erro_cadastro'], $_SESSION['dados_formulario']);

header('Location: resultado.php');
exit;
