# Prova Prática – CRUD de Produtos com Relacionamento de Categoria

### Requisitos de Instalação
- Docker
- Docker Compose

### Iniciando o ambiente
1. Clonando o repositório:
    ```bash
    git clone https://github.com/pwqr/prova-cbmse.git
    cd prova-cbmse
    ```

2. Execute o seguinte comando para criar uma cópia do arquivo `.env.example` e renomear para `.env`:
    ```bash
    copy .env.example .env
    ```

3. Subindo os contêineres no Docker:
    ```bash
    docker compose up -d --build
    ```

4. Acessando o contêiner da aplicação:
    ```bash
    docker exec -it laravel_app bash 
    ```

5. Execute os seguintes comandos dentro do contêiner para configurar os pacotes PHP:
    ```bash
    composer install
    php artisan key:generate
    npm install
    npm run build
    ```

6. Criando o banco de dados:
    ```bash
    php artisan migrate
    ```

---

## Acessando a aplicação
Com o ambiente configurado, a aplicação estará disponível em: [http://localhost:8099](http://localhost:8099)