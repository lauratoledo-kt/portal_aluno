<?php
// TODO 04 — Recuperar a sessão antes do HTML.
session_start();

// TODO 05 — Ler e remover a mensagem de erro (mensagem flash).
$erro = $_SESSION['erro_cadastro'] ?? '';
unset($_SESSION['erro_cadastro']);

// TODO 06 — Recuperar e remover os campos digitados anteriormente.
$dadosAntigos = $_SESSION['dados_formulario'] ?? [];
unset($_SESSION['dados_formulario']);

$nome = $dadosAntigos['nome'] ?? '';
$email = $dadosAntigos['email'] ?? '';
$idade = $dadosAntigos['idade'] ?? '';

$tituloPagina = 'Cadastro';
// TODO 07 — Cabeçalho compartilhado.
require __DIR__ . '/includes/cabecalho.php';
?>
<section class="cartao">
    <span class="etiqueta">Cadastro de estudante</span>
    <h1>Seus dados</h1>
    <p>Preencha os campos para criar um cadastro temporário no portal.</p>

    <?php if ($erro !== ''): ?>
        <div class="alerta" role="alert"><?= escaparHtml($erro) ?></div>
    <?php endif; ?>

    <!-- novalidate permite demonstrar as validações obrigatórias feitas pelo PHP no servidor. -->
    <form action="processar_cadastro.php" method="post" novalidate>
        <div class="grupo">
            <label for="nome">Nome completo</label>
            <input id="nome" name="nome" type="text" value="<?= escaparHtml($nome) ?>" autocomplete="name" placeholder="Ex.: Ana Souza">
        </div>
        <div class="grupo">
            <label for="email">E-mail</label>
            <input id="email" name="email" type="email" value="<?= escaparHtml($email) ?>" autocomplete="email" placeholder="Ex.: ana@senac.br">
        </div>
        <div class="grupo">
            <label for="idade">Idade</label>
            <input id="idade" name="idade" type="text" inputmode="numeric" value="<?= escaparHtml($idade) ?>" placeholder="Ex.: 22">
        </div>
        <div class="acoes">
            <button class="botao" type="submit">Finalizar cadastro</button>
            <a class="botao botao-secundario" href="index.php">Voltar ao início</a>
        </div>
    </form>
</section>
<?php
// TODO 08 — Rodapé compartilhado.
require __DIR__ . '/includes/rodape.php';
