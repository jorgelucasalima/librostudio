## Projeto

- install
composer install

- banco
-- criar banco no mysql chamado librostudio
-- criar usuário chamado librostudio e senha librostudio no seu mysql

- Incluir no seu .env:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=librostudio
DB_USERNAME=librostudio
DB_PASSWORD=librostudio

- executar 
php artisan serve
