PLANO DE AÇÃO: Sistema de Biblioteca com um Time de 5 Pessoas
Objetivo: Desenvolver o Sistema de Biblioteca de forma organizada, aplicando as diretrizes de MVC e GitFlow para a entrega final da disciplina AP-1.
Fase 1: Planejamento e Organização (Sprint 0)
Definição de Papéis e Atribuição de Features:
Líder do Projeto: Thales Marques
Integrantes:
Thales Marques: Feature 1 - Gerenciamento de Livros (CRUD de livros).
Cristiano Herrera: Feature 2 - Gerenciamento de Usuários (Cadastro, Login).
Gabriel Portuguez: Feature 3 - Gerenciamento de Exemplares (Adicionar cópias de um livro).
Kayke Zago: Feature 4 - Gerenciamento de Empréstimos (Realizar e registrar empréstimos).
Vinicius Simon: Feature 5 - Gerenciamento de Devoluções e Reservas.
Definir Repositório Central e Limpeza:

Repositório Central: Thales-uft2022-2/sistema-biblioteca.
Limpeza Local: Todos os 5 alunos devem:
Excluir qualquer pasta de projeto antiga de C:\xampp\htdocs\.
Excluir o banco de dados maisaude ou qualquer pasta de seus phpMyAdmin.
Verificar a instalação e funcionamento do XAMPP.

Fase 2: Execução das Sprints (Desenvolvimento Incremental)
O ciclo de desenvolvimento será repetido para cada uma das 5 funcionalidades, garantindo o registro no Gráfico de Rede do GitHub.

Configuração e Estrutura Inicial (Responsabilidade do Líder - Thales Marques):

Thales irá criar o repositório no GitHub: Thales-uft2022-2/sistema-biblioteca.
Ele clonará este repositório em sua máquina.
Ele criará a branch develop a partir da main.
Ele fará o primeiro commit com a estrutura de pastas MVC (/controllers, /models, /views), e os arquivos base (index.php, config.php, Database.php, init_db.sql).
Ele fará o push para as branches main e develop.
A partir deste ponto, todos os outros membros do time podem clonar este repositório e começar a trabalhar.
Sprint 1 (Desenvolvimento da Feature 2 - Cristiano Herrera):
Cristiano Herrera irá:
Clonar o repositório (Thales-uft2022-2/sistema-biblioteca).
Fazer o checkout da develop e criar a branch de feature: git checkout -b feature/usuarios.
Desenvolver o código completo (models, controllers, views) para a funcionalidade de gerenciamento de usuários.
Fazer o git push da branch de feature para o GitHub.
Verificação: Cristiano submeterá um "Pull Request" para mesclar a feature/usuarios na develop.
Sprint 2 (Desenvolvimento da Feature 1 - Thales Marques):

Thales irá:
Fazer o git pull da develop para garantir que o código de Cristiano está em sua máquina.
Criar a branch de feature: git checkout -b feature/livros.
Desenvolver o código completo para o gerenciamento de livros.
Fazer o git push da branch de feature e submeter um "Pull Request" para a develop.
Próximas Sprints:
O ciclo se repete para as funcionalidades 3, 4 e 5, com cada aluno trabalhando em sua respectiva branch de feature e fazendo o merge na develop.
A cada ciclo, a branch develop se torna mais completa e o histórico no GitFlow se constrói de forma natural no Gráfico de Rede do GitHub.
Fase 3: Finalização e Entrega
Merge Final: Após todas as 5 features serem mescladas na develop, Thales (Líder) fará o merge final da develop na main para criar a versão estável (Release).
Vídeo de Apresentação: O vídeo será gravado, com a participação de todos, demonstrando as 5 funcionalidades.
README.md: O README.md será atualizado com a descrição do projeto, os nomes dos 5 integrantes e o link do vídeo.
