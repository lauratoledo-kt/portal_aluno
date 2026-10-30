<?php
// TODO 01 — Iniciar a sessão antes de enviar qualquer HTML.
session_start();
$tituloPagina = 'Início';
// TODO 02 — Cabeçalho compartilhado.
require __DIR__ . '/includes/cabecalho.php';
?>
<section class="cartao">
    <span class="etiqueta">Bem-vindo</span>
    <h1>Portal do Aluno</h1>
    <p>Cadastre seus dados, consulte as informações registradas e gerencie sua sessão de forma simples e segura.</p>
    <p class="observacao">O cadastro é temporário: não utiliza banco de dados e fica disponível enquanto sua sessão estiver ativa.</p>
    <div class="acoes">
        <a class="botao" href="cadastro.php">Realizar cadastro</a>
        <a class="botao botao-secundario" href="resultado.php">Consultar informações</a>
        <a class="botao botao-secundario" href="logout.php">Encerrar sessão</a>
    </div>
</section>
<?php
// TODO 03 — Rodapé compartilhado.
require __DIR__ . '/includes/rodape.php';
