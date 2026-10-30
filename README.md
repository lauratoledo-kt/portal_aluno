# Portal do Aluno — Tecnologias para Internet

Solução didática para o desafio de PHP: cadastro de aluno sem banco de dados, com sessões, formulários, validações e componentes reutilizáveis.

**Edição rosa:** identidade visual em tons de rosa aplicada no componente compartilhado `includes/cabecalho.php`. A apresentação foi atualizada sem alterar as regras de cadastro, validação e sessão.

**Observação:** esta é uma implementação funcional produzida a partir do enunciado. A pasta original `arquivos_desorganizados` não foi disponibilizada, portanto não foi possível mapear nomes e alterações dos scripts que o professor teria fornecido. Compare esta solução aos arquivos originais se a atividade exigir preservar o código inicial.

## Estrutura

```text
portal_aluno/
├── index.php
├── cadastro.php
├── processar_cadastro.php
├── resultado.php
├── logout.php
├── includes/
│   ├── cabecalho.php
│   ├── rodape.php
│   └── funcoes.php
├── README.md
└── TESTES.md
```

## Como executar usando XAMPP (Windows)

1. Inicie o Apache no painel de controle do XAMPP.
2. Copie a pasta `portal_aluno` inteira para `C:\xampp\htdocs\`.
3. Abra o navegador em <http://localhost/portal_aluno/>.
4. Em **Realizar cadastro**, preencha nome, e-mail e idade.
5. Consulte as informações em **Consultar dados**, e use **Encerrar sessão** para removê-las.

Não é necessário MySQL, extensões externas ou frameworks. Os campos são armazenados somente em `$_SESSION`.

## Alternativa com servidor embutido do PHP

No terminal, dentro da pasta `portal_aluno`, execute:

```bash
php -S localhost:8000
```

Abra <http://localhost:8000/>.

## Explicação resumida do fluxo

- `index.php` inicializa a sessão e mostra navegação.
- `cadastro.php` exibe formulário POST e consome mensagens/valores temporários.
- `processar_cadastro.php` recebe os campos, aplica `trim`, `FILTER_VALIDATE_EMAIL` e `FILTER_VALIDATE_INT`, valida e redireciona.
- `resultado.php` exibe dados salvos e uma mensagem de sucesso apenas na primeira visita.
- `logout.php` remove variáveis, apaga o cookie de sessão quando houver, destrói a sessão e redireciona.
- `includes/funcoes.php` possui funções para validar e-mail, tratar texto e escapar HTML.

A validação principal acontece no **servidor** (PHP), não somente no navegador. O formulário utiliza `novalidate` para permitir observar mensagens de erro do próprio PHP mesmo com dados inválidos.

## Respostas às 6 perguntas finais

1. **Por que iniciar antes do HTML?** `session_start()` e `header()` podem enviar cabeçalhos HTTP, que devem ser definidos antes de imprimir a página.
2. **Vantagem de componentes compartilhados?** Evitam repetição e mantêm o layout igual entre as páginas.
3. **Por que dados persistem após redirecionamento?** Porque a sessão identifica o mesmo visitante e o PHP mantém `$_SESSION` no servidor entre requisições.
4. **Por que mensagem aparece uma vez?** Ela é lida da sessão e removida com `unset()`, padrão conhecido como mensagem flash.
5. **`unset()` vs. destruir sessão?** `unset($_SESSION['chave'])` remove um dado específico; `session_destroy()` destrói o armazenamento da sessão (com esvaziamento e remoção do cookie, neste projeto).
6. **Por que não confiar no formulário?** Usuários podem enviar dados ausentes, incorretos ou conteúdo malicioso; por isso validamos no servidor e escapamos os valores antes de colocá-los no HTML.

## TODOs

Os 26 TODOs estão identificados em comentários junto aos locais de implementação nos arquivos PHP, incluindo o bônus de tratamento de texto.
