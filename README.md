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
    - HTML e PHP (sem lógica complexa);
    - Instancia classes de modelos (quando necessário);
    - Somente recebem dados, nunca enviam;

## Autoload

- Carrega automaticamente qualquer classe necessária, localizadas nas pastas `Models` e `Library`;
- Arquivos das pastas `Views` e `Controllers` são chamados através de rotas criadas na classe `Library/Rotas.php`;

## Imagens dos produtos

Todos os produtos devem possuir, ao menos, uma imagem na plataforma. Cada imagem deve ser exclusiva da plataforma (ou seja, nada de Google Imagens), e devem seguir as seguintes regras:

- Todas devem ser quadradas e com exatamente o mesmo tamanho(e.g. 600x600);
- Todas devem ter um fundo transparente (png);

## Interface

Toda a interface da plataforma foi baseada no seguinte tema Bootstrap:

[QuantumPro - Bootstrap 4 Dashboard & UI Kit](http://https://themeforest.net/item/quantumpro-bootstrap-4-dashboard-ui-kit/22102521 "QuantumPro - Bootstrap 4 Dashboard & UI Kit")

## Base de dados
Há regras e padrões a serem seguidos ao criar tabelas e atributos:
1. Nomes de tabelas devem estar sempre no plural (~~usuario~~ -> usuarios);
2. O chave primária da tabela deve conter a descrição da entidade no singular;
	Ex: A chave primária da tabela `usuarios` deve ser descrita como `id_usuario`, nunca como `id`

Descrição de todas as tabelas e seus relacionamentos.

#### 1. usuarios

    id_usuario [int, 10, pk]
    nome [varchar, 30]
    email [varchar, 50]
    senha [varchar, 100]
    data_cadastro [timestamp]
    status [tinyint, 0/1]


## Ideias
- *A imagem de cada produto deve ter um tamanho diferente para a plataforma web e dispositivos móveis.*
- *Bundle de produtos por menor preço.*
- *Avisar que uma área não está coberta*
- *Ranking do produtor*
- *História do produtor*
- *Rastreabilidade*
- *QR Code*

## Dúvidas
- *Se um cliente comprar, por exemplo, 10 produtos diferentes e vier de mais de 1 produtor (neste exemplo, 10 produtores seria o pior caso), como a logística de entrega vai funcionar?*

## Próximos passos

- Criar banco de dados
- Mini estúdio fotográfico
- Preencher formulário 'Desenvolvimento do cliente'

## Reuniões

- 11 de outubro de 2018

## Bugs


------------

Quem quiser usar o editor `markdown` para editar este arquivo, acesse o seguinte link:

[Editor.md - Open source online Markdown editor](http://https://pandao.github.io/editor.md/en.html "Edit.md - Open source online Markdown editor")