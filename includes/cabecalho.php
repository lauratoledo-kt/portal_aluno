<?php
// Cabeçalho compartilhado entre as páginas (TODOs 02, 07 e 19).
require_once __DIR__ . '/funcoes.php';
$tituloPagina = $tituloPagina ?? 'Portal do Aluno';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= escaparHtml($tituloPagina) ?> | Portal do Aluno</title>
    <style>
        /* Identidade visual Rosa — definida uma vez para todas as páginas. */
        :root {
            font-family: Arial, Helvetica, sans-serif;
            color: #46263a;
            background-color: #fff5fa;
            line-height: 1.5;
            --rosa-escuro: #831843;
            --rosa-principal: #be185d;
            --rosa-vivo: #db2777;
            --rosa-claro: #fce7f3;
            --rosa-borda: #f9bfdb;
            --texto-suave: #74566a;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background:
                radial-gradient(circle at 12% 16%, #ffe1ef 0, transparent 33%),
                radial-gradient(circle at 89% 77%, #ffd3e7 0, transparent 32%),
                linear-gradient(160deg, #fff8fc 0%, #fff0f7 100%);
        }
        a { color: var(--rosa-principal); }
        .barra-superior {
            color: #fff;
            background: linear-gradient(110deg, #9d174d 0%, #be185d 53%, #db2777 100%);
            box-shadow: 0 5px 22px rgba(157, 23, 77, .13);
        }
        .barra-conteudo {
            max-width: 980px;
            padding: 19px 26px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
        }
        .marca {
            font-size: 1.22rem;
            font-weight: 800;
            letter-spacing: .1px;
            color: #fff;
            text-decoration: none;
        }
        .marca::before { content: "✦"; color: #ffe4f1; margin-right: 9px; }
        .menu { display: flex; align-items: center; flex-wrap: wrap; gap: 6px; }
        .menu a {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            font-size: .9rem;
            padding: 7px 11px;
            border-radius: 99px;
            transition: background-color .2s ease;
        }
        .menu a:hover, .menu a:focus-visible { background: rgba(255, 255, 255, .19); }
        main {
            width: 100%;
            max-width: 980px;
            margin: 48px auto;
            padding: 0 26px;
            flex: 1;
        }
        .cartao {
            padding: 42px;
            background: rgba(255, 255, 255, .96);
            border: 1px solid #f9d2e4;
            border-radius: 22px;
            box-shadow: 0 16px 45px rgba(157, 23, 77, .09);
            overflow: hidden;
            position: relative;
        }
        .cartao::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #f472b6, #be185d, #fb7185);
        }
        .etiqueta {
            display: inline-block;
            padding: 6px 12px;
            color: var(--rosa-escuro);
            background: var(--rosa-claro);
            border: 1px solid #fbcfe8;
            border-radius: 99px;
            font-size: .77rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .09em;
        }
        h1 { font-size: clamp(1.75rem, 4vw, 2.5rem); color: var(--rosa-escuro); margin: 17px 0 14px; line-height: 1.18; }
        h2 { font-size: 1.2rem; margin-top: 0; color: var(--rosa-escuro); }
        p { color: #68485c; }
        .acoes { display: flex; gap: 12px; flex-wrap: wrap; margin-top: 28px; }
        .botao {
            display: inline-block;
            border: 1px solid var(--rosa-principal);
            border-radius: 11px;
            padding: 12px 20px;
            background: linear-gradient(115deg, #be185d, #db2777);
            color: #fff;
            font: inherit;
            font-weight: 700;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            box-shadow: 0 7px 16px rgba(190, 24, 93, .16);
            transition: transform .2s ease, box-shadow .2s ease, background-color .2s ease;
        }
        .botao:hover, .botao:focus-visible { background: #9d174d; box-shadow: 0 9px 20px rgba(190, 24, 93, .24); transform: translateY(-1px); }
        .botao-secundario {
            color: var(--rosa-escuro);
            border-color: #f3a7cb;
            background: #fff7fb;
            box-shadow: none;
        }
        .botao-secundario:hover, .botao-secundario:focus-visible { background: #fce7f3; box-shadow: none; }
        .grupo { display: flex; flex-direction: column; gap: 8px; margin: 20px 0; }
        label { font-weight: 700; font-size: .95rem; color: #66354e; }
        input {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #e8b6cf;
            border-radius: 11px;
            font: inherit;
            background: #fffafd;
            color: #46263a;
            transition: border-color .2s ease, box-shadow .2s ease;
        }
        input::placeholder { color: #a58b99; }
        input:focus { outline: none; box-shadow: 0 0 0 3px #fbcfe8; border-color: var(--rosa-vivo); }
        .alerta {
            border-radius: 11px;
            border: 1px solid #fda4af;
            border-left: 5px solid #be123c;
            background: #fff1f2;
            color: #9f1239;
            padding: 14px 16px;
            margin: 22px 0;
        }
        .sucesso { border-color: #a7e1be; border-left-color: #15803d; background: #f0fdf4; color: #166534; }
        .dados { display: grid; gap: 12px; margin: 26px 0; }
        .dados div { padding: 15px 17px; background: #fff1f8; border: 1px solid #fce0ec; border-radius: 11px; overflow-wrap: anywhere; }
        .dados dt { font-size: .82rem; color: #91516e; font-weight: 700; margin-bottom: 4px; }
        .dados dd { margin: 0; font-size: 1.06rem; color: #4b263c; }
        .observacao { color: var(--texto-suave); font-size: .89rem; }
        footer { text-align: center; padding: 23px 24px; color: #86556d; border-top: 1px solid #f7c8de; font-size: .9rem; background: rgba(255, 248, 252, .55); }
        @media (max-width: 550px) {
            .barra-conteudo { padding: 17px 16px; }
            .menu { gap: 2px; }
            .menu a { font-size: .83rem; padding: 6px 8px; }
            main { padding: 0 16px; margin: 24px auto; }
            .cartao { padding: 27px 22px; }
            .acoes { flex-direction: column; }
            .botao { width: 100%; }
        }
        @media (prefers-reduced-motion: reduce) {
            .botao, .menu a, input { transition: none; }
            .botao:hover, .botao:focus-visible { transform: none; }
        }
    </style>
</head>
<body>
    <header class="barra-superior">
        <div class="barra-conteudo">
            <a class="marca" href="index.php">Portal do Aluno</a>
            <nav class="menu" aria-label="Menu principal">
                <a href="index.php">Início</a>
                <a href="cadastro.php">Cadastro</a>
                <a href="resultado.php">Consultar dados</a>
                <a href="logout.php">Encerrar sessão</a>
            </nav>
        </div>
    </header>
    <main>
