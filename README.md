# 

# \## ACQAPHP, MySQL, MVC e Design Patterns

# 

# \*\*Aluno:\*\* Felipe Almeida Pires

# \*\*RA:\*\* 1171140-1

# \*\*Curso:\*\* Sistemas de Informação

# 

# \---

# 

# \# Sobre o Projeto

# 

# Este projeto foi desenvolvido como atividade da ACQA com o objetivo de colocar em prática os conceitos estudados durante a disciplina, principalmente PHP, MySQL, arquitetura MVC e Design Patterns.

# 

# A aplicação consiste em uma lista de tarefas (To-Do List) onde cada usuário possui sua própria conta e pode gerenciar suas tarefas de forma independente. O sistema permite realizar cadastro, login, criação de tarefas, edição, exclusão e acompanhamento das atividades cadastradas.

# 

# Durante o desenvolvimento procurei organizar o código de forma que ele fosse fácil de entender, manter e expandir futuramente, utilizando boas práticas de programação e separação de responsabilidades.

# 

# \---

# 

# \# Tecnologias Utilizadas

# 

# Para desenvolver o sistema utilizei:

# 

# \* PHP

# \* MySQL

# \* HTML

# \* CSS

# \* PDO para conexão com o banco de dados

# \* Arquitetura MVC

# \* Design Patterns

# 

# \---

# 

# \# Como o Projeto Está Organizado

# 

# O sistema foi construído seguindo o padrão MVC (Model-View-Controller), que ajuda a separar cada parte da aplicação em uma responsabilidade específica.

# 

# \### Models

# 

# Os Models são responsáveis pela comunicação com o banco de dados.

# 

# Neste projeto foram criados:

# 

# \* User.php

# \* Task.php

# 

# Essas classes realizam consultas, inserções, atualizações e exclusões utilizando PDO e prepared statements.

# 

# \### Views

# 

# As Views são responsáveis pela interface que o usuário visualiza.

# 

# Foram desenvolvidas telas para:

# 

# \* Cadastro

# \* Login

# \* Dashboard

# \* Cadastro de tarefas

# \* Edição de tarefas

# 

# \### Controllers

# 

# Os Controllers fazem a ligação entre as Views e os Models.

# 

# Foram implementados:

# 

# \* AuthController

# \* DashboardController

# \* TaskController

# 

# Eles recebem as requisições do usuário, processam as informações necessárias e retornam a página adequada.

# 

# \---

# 

# \# Design Patterns Utilizados

# 

# Além da arquitetura MVC, o projeto também utiliza dois Design Patterns.

# 

# \### Singleton

# 

# O padrão Singleton foi aplicado na classe responsável pela conexão com o banco de dados.

# 

# A ideia foi garantir que apenas uma conexão PDO seja criada durante a execução da aplicação, evitando desperdício de recursos e centralizando o acesso ao banco.

# 

# \### Factory Method

# 

# O padrão Factory Method foi utilizado para criar os Controllers através da classe ControllerFactory.

# 

# Dessa forma o Router não precisa conhecer os detalhes de criação de cada Controller, tornando o código mais organizado e facilitando futuras expansões do sistema.

# 

# \---

# 

# \# Banco de Dados

# 

# O banco de dados foi modelado com duas tabelas principais:

# 

# \### usuarios

# 

# Armazena as informações dos usuários cadastrados.

# 

# Campos principais:

# 

# \* id

# \* nome

# \* email

# \* senha

# \* criado\_em

# 

# \### tarefas

# 

# Armazena as tarefas criadas pelos usuários.

# 

# Campos principais:

# 

# \* id

# \* usuario\_id

# \* titulo

# \* descricao

# \* status

# \* criado\_em

# \* atualizado\_em

# 

# O relacionamento entre as tabelas garante que cada tarefa pertença a um usuário específico.

# 

# \---

# 

# \# Segurança

# 

# Procurei implementar algumas práticas básicas de segurança para tornar a aplicação mais confiável.

# 

# Entre elas:

# 

# \* Senhas armazenadas utilizando hash bcrypt

# \* Uso de password\_hash()

# \* Validação através de password\_verify()

# \* Prepared Statements para evitar SQL Injection

# \* Controle de sessão para autenticação dos usuários

# \* Proteção das páginas que exigem login

# 

# Além disso, cada usuário pode visualizar e alterar apenas as próprias tarefas.

# 

# \---

# 

# \# Desafios Encontrados

# 

# Uma das partes que exigiu mais atenção foi a implementação do sistema de autenticação, principalmente o controle de sessões e a proteção das páginas restritas.

# 

# Outro desafio foi estruturar o projeto seguindo corretamente o padrão MVC, separando a lógica de negócio, acesso ao banco e interface do usuário sem misturar responsabilidades.

# 

# Esses desafios ajudaram a compreender melhor como aplicações maiores são organizadas e mantidas.

# 

# \---

# 

# \# Como Executar o Projeto

# 

# 1\. Importar o arquivo `schema.sql` no phpMyAdmin.

# 

# 2\. Configurar as credenciais do banco de dados no arquivo:

# 

# ```php

# app/Config/config.php

# ```

# 

# 3\. Copiar a pasta do projeto para o diretório `htdocs` do XAMPP.

# 

# 4\. Iniciar os serviços Apache e MySQL.

# 

# 5\. Acessar no navegador:

# 

# ```text

# http://localhost/php-mvc-tarefas/public/index.php

# ```

# 

# \---

# 

# \# Testes Realizados

# 

# Antes da finalização do projeto foram realizados testes em todas as funcionalidades principais:

# 

# \* Cadastro de usuários

# \* Login e logout

# \* Cadastro de tarefas

# \* Edição de tarefas

# \* Exclusão de tarefas

# \* Separação de dados entre usuários

# \* Persistência das informações no banco de dados

# 

# Os testes foram realizados utilizando um banco MySQL local para garantir que todas as funcionalidades estivessem operando corretamente.

# 

# \---

# 

# \# Considerações Finais

# 

# O desenvolvimento deste projeto foi uma oportunidade para aplicar de forma prática diversos conceitos vistos durante o curso. Além de reforçar conhecimentos sobre PHP e MySQL, também permitiu compreender melhor a importância da organização do código utilizando MVC e Design Patterns.

# 

# O resultado foi um sistema funcional de gerenciamento de tarefas, com autenticação de usuários, operações completas de CRUD e uma estrutura preparada para futuras melhorias e expansões.



