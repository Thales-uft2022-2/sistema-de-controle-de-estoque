# 📚 Sistema de Biblioteca

## 📖 Visão Geral do Projeto
O **Sistema de Biblioteca** é uma aplicação web desenvolvida como parte da disciplina de **Engenharia de Software** da **Universidade Federal do Tocantins (UFT)**.  
Seu objetivo é gerenciar livros, exemplares, empréstimos, devoluções, reservas e usuários, aplicando conceitos de **MVC (Model-View-Controller)** e boas práticas de versionamento com **GitFlow**.

---

## 🎯 Objetivo
O projeto visa demonstrar a aplicação prática de conceitos de Engenharia de Software, enfatizando:  
- Colaboração em equipe com **GitFlow**.  
- Estruturação em **MVC**.  
- Aplicação de requisitos funcionais e não funcionais reais.  

---

## 👥 Informações da Disciplina e Equipe
- **Universidade:** Universidade Federal do Tocantins (UFT)  
- **Curso:** Ciências da Computação  
- **Disciplina:** Engenharia de Software  
- **Semestre:** 2025/2  
- **Professor:** Prof. Dr. Edeilson Milhomem Silva  

### 👨‍💻 Integrantes
- Thales Marques  
- Cristian Herrera  
- Gabriel Portuguez  
- Kayke Zago  
- Vinicus Simon  

---

## ⚙️ Requisitos Funcionais (Principais)

D1 🔑 Autenticação & Perfis
- Login/Logout, recuperação de senha.  
- Perfis: **Administrador**, **Bibliotecário**, **Leitor**.  
- Controle de permissões por perfil.  

D2 📚 Cadastro & Catálogo
- CRUD de Livros (título, ISBN, edição, ano, editora, sinopse, capa).  
- CRUD de Autores e Categorias.  
- Relação **N:N** Livro–Autor e **1:N** Livro–Categoria.  
- Cadastro de Exemplares (cópias físicas) com código de patrimônio.  
- Importação de catálogo via CSV (opcional).  

D3 🔄 Circulação
- Empréstimos, devoluções, renovações.  
- Reservas com fila de espera.  

D4 💰 Multas & Regras
- Configuração de prazos de empréstimo por perfil.  
- Multa automática por atraso.  
- Bloqueio de empréstimos com multas pendentes.  

D5 👥 Usuários (Leitores)
- Cadastro/edição de leitores.  
- Histórico de empréstimos e reservas.  

D6 🔎 Busca & Descoberta
- Busca por título, autor, ISBN, categoria.  
- Filtros por disponibilidade, período, categoria.  

D7 📊 Relatórios
- Livros mais emprestados.  
- Empréstimos em andamento e atrasados.  
- Multas abertas/quitadas.  
- Usuários ativos x inativos.  

D8 ⚙️ Administração
- Gestão de perfis e usuários.  
- Configuração de parâmetros (prazo, multa, limite).  
- Log/Auditoria de ações críticas.  

---

## 🛠️ Requisitos Não Funcionais
- **Arquitetura:** MVC.  
- **Banco:** MySQL (InnoDB, chaves estrangeiras, índices).  
- **Acessibilidade:** WCAG AA, alto contraste, fontes escaláveis, navegação por teclado.  
- **Segurança:** Senhas com `password_hash`, CSRF tokens, prepared statements.  
- **Usabilidade:** Layout responsivo (mobile-first).  
- **Logs:** erros, acessos e auditoria.  
- **Backup:** rotinas SQL.  
- **Internacionalização:** suporte pt-BR (datas e moedas).  
- **Qualidade:** PHP linter e checklist de testes.  

---

## 🗄️ Modelo de Dados (Principais Tabelas)
- **users**(id, nome, email, senha_hash, papel, status, criado_em)  
- **authors**(id, nome)  
- **categories**(id, nome, slug)  
- **publishers**(id, nome)  
- **books**(id, titulo, isbn, ano, edicao, publisher_id, categoria_id, sinopse, capa_url)  
- **book_authors**(book_id, author_id)  
- **copies**(id, book_id, codigo_patrimonio, status)  
- **loans**(id, copy_id, user_id, retirado_em, previsto_para, devolvido_em, status)  
- **reservations**(id, book_id, user_id, criado_em, status, posicao_fila)  
- **fines**(id, loan_id, valor_total, pago_em, status)  
- **settings**(id, chave, valor)  
- **logs**(id, user_id, acao, recurso, payload_json, criado_em)  

---

## 🚀 Como Rodar o Projeto Localmente

### 1. Pré-requisitos
- **XAMPP** (Apache + MySQL).  
- **PHP 8.0+** (integrado no XAMPP).  
- **Git** instalado e configurado.  
- **Navegador web** moderno.  

### 2. Clonar o Repositório
```bash
cd C:\xampp\htdocs
git clone https://github.com/ThalesTIPalmas/sistema-biblioteca.git
cd sistema-biblioteca
