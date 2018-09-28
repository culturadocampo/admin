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
    - Requisições assíncronas por um rota predefinida
    - Sem HTML, somente backend
    - Sem comunicação com o banco de dados
    - Representa uma ação
    - Nome do arquivo com prefixo "do_" (e.g. `do_insert_produto.php`)
    - Finaliza o arquivo retornando um `JSON`
- **Models**
    - Representa uma tabela do banco de dados
    - Se comunica com a classe conexão
    

## Autoload

- Carrega automaticamente qualquer classe necessária, localizadas nas pastas `Models` e `Library
- Arquivos da pasta `Views` e `Controllers` são chamados através de rotas criadas na classe `Library/Rotas.php`
