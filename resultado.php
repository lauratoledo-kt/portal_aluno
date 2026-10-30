<?php
// TODO 16 — Recuperar a sessão antes do HTML.
session_start();

// TODO 17 — Recuperar o aluno; ausência de cadastro não gera erro.
$aluno = $_SESSION['aluno'] ?? null;

// TODO 18 — Ler mensagem de sucesso uma única vez (flash).
$mensagemSucesso = $_SESSION['mensagem_sucesso'] ?? '';
unset($_SESSION['mensagem_sucesso']);

$tituloPagina = 'Resultado do cadastro';
// TODO 19 — Cabeçalho compartilhado.
require __DIR__ . '/includes/cabecalho.php';
?>
<section class="cartao">
    <span class="etiqueta">Consulta de cadastro</span>
    <h1>Informações do aluno</h1>

    <?php if (is_array($aluno)): ?>
        <?php if ($mensagemSucesso !== ''): ?>
            <div class="alerta sucesso" role="status"><?= escaparHtml($mensagemSucesso) ?></div>
        <?php endif; ?>
        <p>Seus dados continuarão disponíveis durante a sessão atual.</p>
        <dl class="dados">
            <div>
                <dt>Nome</dt>
                <dd><?= escaparHtml($aluno['nome'] ?? '') ?></dd>
            </div>
            <div>
                <dt>E-mail</dt>
                <dd><?= escaparHtml($aluno['email'] ?? '') ?></dd>
            </div>
            <div>
                <dt>Idade</dt>
                <dd><?= escaparHtml($aluno['idade'] ?? '') ?> anos</dd>
            </div>
        </dl>
        <div class="acoes">
            <a class="botao botao-secundario" href="cadastro.php">Novo cadastro</a>
            <a class="botao" href="logout.php">Encerrar sessão</a>
        </div>
    <?php else: ?>
        <div class="alerta" role="status">Nenhum estudante cadastrado nesta sessão.</div>
        <p>Para consultar informações, realize primeiro o cadastro.</p>
        <div class="acoes">
            <a class="botao" href="cadastro.php">Ir para cadastro</a>
        </div>
    <?php endif; ?>
</section>
<?php
// TODO 20 — Rodapé compartilhado.
require __DIR__ . '/includes/rodape.php';
