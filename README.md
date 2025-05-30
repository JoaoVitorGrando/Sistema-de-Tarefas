# Sistema de Gerenciamento de Tarefas

Olá! Bem-vindo(a) ao repositório do nosso Sistema de Gerenciamento de Tarefas, desenvolvido com o framework Laravel.

Este projeto foi construído com o objetivo de oferecer uma ferramenta simples e eficaz para você organizar suas atividades diárias. Acreditamos que a organização é a chave para a produtividade, e é isso que esta aplicação busca facilitar.

## Sobre o Projeto

Nosso sistema permite que usuários autenticados gerenciem suas tarefas pessoais de maneira intuitiva. Você pode facilmente adicionar novas tarefas, visualizar suas pendências, marcar tarefas como concluídas e, claro, editar ou remover itens conforme necessário. A interface foi pensada para ser clara e fácil de usar no dia a dia.

## Funcionalidades Principais

*   **Autenticação de Usuário:** Registro, Login e Logout seguros.
*   **Gerenciamento Completo de Tarefas (CRUD):** Crie, visualize, edite e exclua suas tarefas.
*   **Visualização:** Liste suas tarefas com informações relevantes como título, descrição e status.
*   **Filtragem:** Filtre tarefas por status (concluídas/pendentes).
*   **Busca:** Encontre tarefas específicas rapidamente pela barra de busca.

## Tecnologias Utilizadas

Este projeto foi construído sobre uma base sólida de tecnologias web:

*   **Backend:** Laravel (PHP Framework)
*   **Frontend:** Blade Templates, HTML, CSS, JavaScript
*   **Estilização:** Bootstrap
*   **Banco de Dados:** Suporte a diversos bancos de dados via Eloquent ORM (MySQL, PostgreSQL, SQLite, etc.)
*   **Gerenciamento de Dependências:** Composer (PHP) e npm (Node.js)

## Como Configurar e Rodar o Projeto Localmente

Siga estes passos para ter o projeto funcionando na sua máquina:

1.  **Clone o Repositório:**
    ```bash
    git clone <url-do-seu-repositorio>
    cd ProjetoW3
    ```

2.  **Instale as Dependências do Backend (PHP):**
    Certifique-se de ter o Composer instalado.
    ```bash
    composer install
    ```

3.  **Instale as Dependências do Frontend (Node.js):**
    Certifique-se de ter o Node.js e npm instalados.
    ```bash
    npm install
    ```

4.  **Crie o Arquivo de Ambiente:**
    Duplique o arquivo `.env.example` e renomeie a cópia para `.env`. Configure as credenciais do seu banco de dados neste arquivo.
    ```bash
    copy .env.example .env
    ```
    *(Use `cp .env.example .env` no Linux/macOS)*

5.  **Gere a Chave da Aplicação:**
    ```bash
    php artisan key:generate
    ```

6.  **Execute as Migrações do Banco de Dados:**
    Isso criará as tabelas necessárias no seu banco de dados.
    ```bash
    php artisan migrate
    ```

7.  **Compile os Assets de Frontend:**
    ```bash
    npm run dev
    ```
    Ou para produção:
    ```bash
    npm run build
    ```

8.  **Inicie o Servidor de Desenvolvimento do Laravel:**
    ```bash
    php artisan serve
    ```

Agora você pode acessar a aplicação em `http://127.0.0.1:8000` no seu navegador (ou o endereço que for exibido no terminal).

## Considerações de Segurança

A segurança foi uma prioridade durante o desenvolvimento. Implementamos validação de dados robusta, utilizamos as proteções embutidas do Laravel contra ataques comuns como Injeção SQL e XSS, e adicionamos headers de segurança para fortalecer a proteção no lado do cliente. Trabalhamos para que seus dados e sua experiência estejam seguros.

## Contribuições

Sugestões e contribuições são sempre bem-vindas! Se tiver alguma ideia ou encontrar um bug, sinta-se à vontade para abrir uma issue ou enviar um Pull Request.

Esperamos que este sistema seja útil para você! 😊

@joaograndoo
42-9-99175040
