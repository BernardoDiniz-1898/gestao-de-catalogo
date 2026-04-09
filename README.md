# 📦 Gestão de Catálogo de Equipamentos

Um sistema web desenvolvido em **Laravel** para o controle e gerenciamento de um catálogo de equipamentos. O sistema permite o cadastro de itens, controle de status (Disponível, Inativo, Manutenção, etc.), validação de números de série e vinculação de ativos aos usuários responsáveis.

---

## 🚀 Funcionalidades

* **Autenticação e Autorização:** Acesso restrito para usuários cadastrados.
* **CRUD de Equipamentos:** Cadastro, listagem, edição e exclusão de itens do catálogo.
* **Validação de Dados:** Bloqueio de números de série duplicados (com exceção inteligente durante a edição).
* **Proteção de Acesso:** Usuários só podem editar ou excluir os equipamentos que eles mesmos cadastraram.
* **Carga Inicial (Seeders):** Banco de dados já populado com usuários de teste e um estoque inicial para facilitar a avaliação do sistema.

---

## 🛠️ Tecnologias Utilizadas

* **PHP** (8.1+)
* **Laravel** (Framework MVC)
* **MySQL** (Banco de Dados Relacional)
* **Blade** (Template Engine)
* **HTML/CSS/JavaScript**

---

## ⚙️ Pré-requisitos

Antes de começar, você precisará ter instalado em sua máquina as seguintes ferramentas:
* [Git](https://git-scm.com)
* [PHP](https://www.php.net/)
* [Composer](https://getcomposer.org/)
* Servidor MySQL (XAMPP, Laragon, Docker, etc.)

---

## 📥 Como instalar e rodar o projeto localmente

**1. Clone o repositório**
```bash
git clone [https://github.com/SEU-USUARIO/NOME-DO-REPOSITORIO.git](https://github.com/SEU-USUARIO/NOME-DO-REPOSITORIO.git)
cd NOME-DO-REPOSITORIO

2. Instale as dependências do PHP

Bash
composer install
3. Configure o arquivo de ambiente
Faça uma cópia do arquivo .env.example e renomeie para .env:

Bash
cp .env.example .env
4. Gere a chave da aplicação

Bash
php artisan key:generate
5. Configure o Banco de Dados
Abra o arquivo .env e preencha as credenciais do seu banco de dados MySQL:

Snippet de código
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestao_catalogo
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
(Lembre-se de criar um banco de dados vazio chamado gestao_catalogo no seu MySQL antes do próximo passo).

6. Execute as Migrations e Seeders
Este comando vai criar todas as tabelas e inserir a carga inicial de dados (Usuários e Equipamentos):

Bash
php artisan migrate:fresh --seed
7. Inicie o servidor local

Bash
php artisan serve
Acesse no seu navegador: http://localhost:8000
