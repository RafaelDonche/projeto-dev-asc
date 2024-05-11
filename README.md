## Projeto Desenvolvedor WEB - ASC Brasil

Itens do sistema:

- Tela de cadastro de campanha com os campos: nome da campanha e arquivo .csv
- Tela de listagem de contatos com filtro de campanha e paginação da lista
- Importação dos dados do arquivo .csv para o banco de dados na tabela 'contatos'
- Validação do telefone dos contatos
- Retorno de quais linhas estão falhando na validação
- Possibilidade de definir delimitador em ponto e vírgula (;) ou vírgula (,) para a leitura do arquivo .csv
- API com rota para listagem dos contatos /api/obterContatos e /api/obterContatos/{campanha}
