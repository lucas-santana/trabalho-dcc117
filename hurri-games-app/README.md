# Rodar o projeto

1. Instalar docker com compose
2. Build e execução do container
    > docker compose up --build
3. Copiar env e mudar usuario/senha do db/db2
    > cp .env.example .env
4. Instalar dependências (bibliotecas) dentro do container
    > docker exec container_app composer install
5. Gerar chave do laravel
    > docker exec container_app php artisan key:generate
6. Rodar as migrations para criar as tabelas no banco de dados
    > docker exec container_app php artisan migrate
7. Acessar a aplicação no navegador em
    > http://localhost:8080/ 
