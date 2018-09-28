# Cultura do Campo

## Colaboradores

- Fernando Henrique Malaquias
- Fernando Stavski
- Luciano Ribeiro
- Marcel Kaspczak
- Marlon Cleiton Gross
- Willian Pestana


## Organização das pastas

- **Controllers**
    - Requisições assíncronas por rotas predefinidas;
    - Sem HTML, somente backend;
    - Sem comunicação com o banco de dados;
    - Instancia um ou mais modelos (quando necessário);
    - Representa uma ação;
    - Nome do arquivo com prefixo "do_" (e.g. `do_insert_produto.php`);
    - Finaliza o arquivo retornando um `JSON`;
- **Models**
    - Cada classe representa uma tabela do banco de dados;
    - Se comunica com a classe conexão;
    - Reúnem todas as queries `SQL` do sistema;
- **Views**
    - Contém toda a interface do sistema;
    - HTML e PHP (Sem lógica complexa);
    - Instancia classes de modelos (quando necessário);
    - Somente recebem dados, nunca enviam;

## Autoload

- Carrega automaticamente qualquer classe necessária, localizadas nas pastas `Models` e `Library`
- Arquivos das pastas `Views` e `Controllers` são chamados através de rotas criadas na classe `Library/Rotas.php`
