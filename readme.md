# Template Para Iniciar Projetos Com Laravel

## Auth OK
```php
php artisan make:auth
```
O Comando acima já foi usado

## Login Unico OK
Ao logar, as outras sessões que já estavam logadas com o mesmo usuário serão invalidadas;
Ao logar, é redirecionado para /;
Existe um seeder para o usuário admin@admin.com / Senha admin

## Template ADMLTE configurado OK
Estou usando o sistema de tradução do laravel, todos os nomes usuados dentro do template se encontram dentro do arquivo resources\lang\pt_BR\admin.php e são usados assim
```php
{{__('admin.chave')}}
```

### Pacotes adicionados
```php
composer require guzzlehttp/guzzle
composer require symfony/psr-http-message-bridge
```
