![BancoDeDados](https://github.com/user-attachments/assets/93fbd2e2-10ec-45ba-b488-53dfeac09e00)
![img1](https://github.com/user-attachments/assets/cc3f6354-98ea-4b9b-8286-4f168629cffc)
![img2](https://github.com/user-attachments/assets/40f7e220-3047-4ff5-b3d8-19ab32a5057d)
![img3](https://github.com/user-attachments/assets/c9fa6992-13c5-4d49-aee3-e5fd809e387a)
![img4](https://github.com/user-attachments/assets/e15ff11b-acb9-47dd-8342-119ac67fdae9)
![img5](https://github.com/user-attachments/assets/c59c6bd5-887f-4864-bedb-a5e58525581b)
 

Este projeto é um sistema de gerenciamento de usuários e produtos, incluindo funcionalidades de cadastro, login, e controle de uma cesta de produtos. Ele foi desenvolvido para ser uma aplicação web com um backend em PHP e um frontend em HTML, CSS e JavaScript, com conexão a um banco de dados. Aqui está uma descrição detalhada das principais funcionalidades:

1. Tela de Login

A tela de login permite que usuários registrados acessem o sistema. Ela inclui um formulário onde o usuário pode inserir seu nome de usuário e senha. Esses dados são capturados por um script JavaScript e enviados para o backend em PHP via uma requisição POST. No backend, os dados de login são verificados no banco de dados para autenticação.

Frontend: Um formulário simples com campos de entrada para nome de usuário e senha.

Backend: Um script PHP que valida as credenciais do usuário, comparando os dados inseridos com os registros no banco de dados. Se a autenticação for bem-sucedida, o usuário é redirecionado para a área restrita do sistema.


2. Cadastro de Usuário

O sistema também permite o cadastro de novos usuários. A tela de cadastro de usuário é composta por um formulário onde o novo usuário pode inserir seu nome e criar uma senha. Quando o formulário é enviado, um script JavaScript envia esses dados ao backend para serem armazenados no banco de dados.

Frontend: Formulário com campos para o nome e senha do usuário.

Backend: Um script PHP que recebe os dados do formulário e armazena as informações no banco de dados, criando um novo registro de usuário.


3. Gerenciamento da Cesta de Produtos

Uma das principais funcionalidades do sistema é o gerenciamento de uma cesta de produtos. O usuário pode adicionar produtos à cesta especificando o nome do produto e a quantidade. Esses dados são enviados para o backend, onde são processados e armazenados no banco de dados. O sistema também exibe uma lista dos produtos que foram adicionados à cesta.

Frontend: Formulário para adicionar produtos com campos para nome e quantidade. Após a adição de um produto, a lista de produtos na cesta é atualizada automaticamente.

Backend: Um script PHP que insere os produtos no banco de dados e também permite que o frontend recupere a lista atualizada de produtos.


4. Visualização dos Dados em Tabelas

O sistema permite que os dados armazenados, como informações de usuários ou produtos, sejam visualizados em tabelas dinâmicas. Para isso, há páginas específicas que consultam o banco de dados e exibem os registros em um formato de tabela, tornando mais fácil para o administrador gerenciar o conteúdo.

Frontend: Página com uma tabela HTML que exibe os dados de forma clara e organizada.

Backend: Um script PHP que consulta o banco de dados e retorna os registros, que são inseridos dinamicamente na tabela exibida no frontend.


5. Estrutura de Pastas e Módulos

O projeto segue uma estrutura modular organizada com as seguintes pastas principais:

assets/: Contém os arquivos de estilo (CSS) e scripts (JavaScript) para estilização e interação dinâmica das páginas.

php/: Contém os scripts PHP responsáveis pelo processamento das requisições, como o cadastro de usuários, login, e manipulação da cesta de produtos.

config/: Armazena arquivos de configuração, como o arquivo de conexão ao banco de dados.

view/: Contém as páginas HTML principais do sistema, como a tela de login, cadastro de usuários e a página da cesta de produtos.


6. Conexão com o Banco de Dados

O sistema utiliza um banco de dados para armazenar os dados de usuários e produtos. A conexão é realizada por meio de um arquivo PHP que utiliza PDO (PHP Data Objects) para se conectar ao banco de dados, o que permite uma interação segura e eficiente.

7. Interatividade e Requisições Assíncronas

A interação entre o frontend e o backend é realizada de maneira assíncrona usando fetch em JavaScript para enviar e receber dados sem recarregar a página. Isso proporciona uma experiência mais fluida e interativa para o usuário, especialmente ao adicionar produtos à cesta ou ao realizar o login.

8. Segurança

Para garantir a segurança dos dados, especialmente durante o login e cadastro de usuários, o sistema utiliza boas práticas como validação no backend e hash de senhas antes de armazená-las no banco de dados. Além disso, o sistema valida os dados no frontend, garantindo que campos obrigatórios sejam preenchidos.

Funcionalidades Futuras:

O sistema pode ser expandido com diversas funcionalidades adicionais, como:

Autenticação de usuários com diferentes níveis de acesso (por exemplo, usuários comuns e administradores).

Edição e remoção de produtos da cesta.

Relatórios de produtos: Exibir quantidades e produtos mais adicionados.

Integração com um carrinho de compras completo: Permitir que os produtos adicionados à cesta sejam posteriormente finalizados como uma compra.


Conclusão

Esse projeto oferece uma base sólida para um sistema de gerenciamento de usuários e produtos com funcionalidades de login, cadastro e manipulação de uma cesta de produtos. O uso de tecnologias como HTML, CSS, JavaScript e PHP, juntamente com a integração a um banco de dados, proporciona uma aplicação dinâmica, interativa e escalável.

