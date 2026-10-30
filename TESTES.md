# Registro de testes — Portal do Aluno

Ambiente utilizado: **PHP 8.4.24**, servidor HTTP embutido do PHP, requisições HTTP locais automatizadas e sessão mantida por cookies.

Data da execução: **29/10/2026** (data de referência da atividade; tema rosa).

> A pasta `arquivos_desorganizados` original não foi enviada. Os testes abaixo foram aplicados à implementação de referência construída conforme o enunciado.

Identidade visual: **tema rosa**, concentrado em `includes/cabecalho.php`, sem alterar as regras PHP.

## Cenários e verificações

| Nº | Cenário verificado | Resultado |
|---:|---|---|
| 01 | Cenário 1 — Página inicial e navegação | APROVADO |
| 02 | Resultado sem aluno cadastrado | APROVADO |
| 03 | Processamento via GET é rejeitado | APROVADO |
| 04 | Cenário 2 — Nome vazio e prioridade da validação | APROVADO |
| 05 | Erro temporário aparece somente uma vez | APROVADO |
| 06 | Cenário 3 — E-mail inválido | APROVADO |
| 07 | Cenário 9 — Campos preservados após erro | APROVADO |
| 08 | Campos temporários são removidos após recuperação | APROVADO |
| 09 | Cenário 4 — Idade igual a zero | APROVADO |
| 10 | Idade decimal não aceita | APROVADO |
| 11 | Campo ausente é validado sem falha | APROVADO |
| 12 | Cenário 5 — Cadastro válido redireciona e apresenta dados | APROVADO |
| 13 | TODO 26 — trim do nome aplicado | APROVADO |
| 14 | Mensagem de sucesso no primeiro acesso | APROVADO |
| 15 | Cenário 6 — Dados persistem, mensagem não se repete | APROVADO |
| 16 | Cenário 8 — HTML é escapado com segurança | APROVADO |
| 17 | Cenário 7 — Logout encerra sessão e apaga o aluno | APROVADO |

**Resumo:** 17 testes aprovados de 17 executados.

## Como repetir manualmente

1. Abra `http://localhost/portal_aluno/` após iniciar Apache no XAMPP.
2. Tente cadastrar com o nome vazio: o servidor deve informar que o nome é obrigatório.
3. Digite `Mariana Oliveira`, `mariana.com`, `21`: deve acusar e-mail inválido e manter os campos preenchidos.
4. Cadastre `Ana Souza`, `ana@senac.br`, `0`: deve acusar idade inválida.
5. Corrija a idade para `22`: deve aparecer o resumo do cadastro e uma mensagem de sucesso.
6. Atualize `resultado.php`: os dados devem permanecer, mas a confirmação deve sumir.
7. Cadastre nome `<h1>Ana</h1>`: a página deve apresentar o texto literalmente, sem criar título HTML.
8. Acesse **Encerrar sessão** e depois **Consultar dados**: nenhum cadastro deverá ser encontrado.

## Observações

- Não há banco de dados: o estado é mantido apenas em `$_SESSION`.
- A validação foi testada diretamente via HTTP POST para confirmar o comportamento do PHP, inclusive quando campos não são enviados.
- Cada mensagem temporária é consumida e removida de sessão após a primeira exibição.
