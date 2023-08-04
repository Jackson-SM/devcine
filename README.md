# Devcine - Catálogos de Filmes
## Introdução
O Devcine é um projeto em PHP que permite aos usuários realizar o upload e gerenciamento de catálogos de filmes, contendo informações como descrições, sinopses e outros detalhes. O projeto utiliza o padrão de arquitetura Model-View-Controller (MVC) para organizar o código de forma modular e facilitar a manutenção.

## Funcionalidades
- Cadastrar catálogos de filmes com informações como título, descrição, gênero, diretor, ano de lançamento, sinopse, etc.
- Listar todos os catálogos cadastrados.
- Visualizar detalhes de um catálogo específico.
- Editar informações de um catálogo existente.
- Excluir catálogos de filmes da base de dados.
## Estrutura do Projeto
```arduino
Devcine/
├── public/
│   ├── (arquivos acessíveis publicamente)
│   └── index.php
├── App/
│   ├── Auth/
│   ├── Config/
│   ├── Controllers/
│   ├── Core/
│   ├── Database/
│   ├── Middlewares/
│   ├── Models/
│   ├── Router/
│   └── Views/
```
### Descrição das Pastas
- **public**: Contém os arquivos acessíveis publicamente, como CSS, JavaScript e imagens. O arquivo index.php é o ponto de entrada do aplicativo.
**App**:
- **Auth**: Responsável pela autenticação do aplicativo, incluindo login, registro e recuperação de senha.
- **Config**: Armazena arquivos de configuração do aplicativo, como conexão com banco de dados e outras configurações gerais.
- **Controllers**: Contém os controladores (controllers) do padrão MVC, que recebem as requisições dos usuários e coordenam as ações do sistema.
- **Core**: Inclui arquivos centrais do aplicativo, como o app.php, que configura e inicializa o sistema, e o controller.php, classe base para os controladores.
- **Database**: Responsável pela camada de banco de dados, com classes de modelo (Model) para interagir com os dados.
- **Middlewares**: Contém funções intermediárias (middlewares) que são executadas antes ou depois do processamento das requisições pelos controladores.
- **Models**: Aqui ficam as classes de modelo (Model) que representam as entidades do aplicativo, usadas para interagir com o banco de dados.
- **Router**: Responsável pelo mapeamento de URLs para os controladores apropriados, garantindo o roteamento correto das requisições.
- **Views**: Contém os arquivos de visualização (View) do padrão MVC, responsáveis por exibir os dados em formato HTML, CSS e, se necessário, JavaScript.

# Como utilizar a aplicação.
**Clone o projeto**
```bash
$ git clone git@github.com:Jackson-SM/devcine.git
```

**Instalando as dependências**
```bash
$ cd devcine # Entrando na pasta do projeto.
$ composer install # Instalando as dependências.
```

**Configurar o banco de dados**
Para configurar o banco de dados, você deve acessar a pasta <kbd>App</kbd> no projeto e abrir o arquivo <kbd>PostgresConnect.php</kbd>

# Considerações Finais
O projeto Devcine possui uma estrutura bem organizada, seguindo as melhores práticas para o desenvolvimento de aplicativos PHP com o padrão MVC. A divisão em pastas torna o código modular e facilita a manutenção e expansão do projeto. Com essa estrutura, o Devcine proporciona uma ótima base para criar um aplicativo de catálogos de filmes eficiente e escalável.