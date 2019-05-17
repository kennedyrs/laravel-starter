# Template Para Iniciar Projetos Com Laravel

## Auth OK
```php
$> php artisan make:auth
```
O Comando acima já foi usado

## Login Unico OK
>Ao logar, as outras sessões que já estavam logadas com o mesmo usuário serão invalidadas.
>Ao logar, é redirecionado para a rota '/'.
>Existe um seeder para o usuário 'admin@admin.com' / Senha 'admin'.

## Template ADMLTE configurado OK
Estou usando o sistema de tradução do laravel, todos os nomes usuados dentro do template se encontram dentro do arquivo resources\lang\pt_BR\admin.php e são usados assim
```php
{{__('admin.chave')}}
{{__('admin.chave')}}
```

## Yields do template disponíveis para serem usados
```php
@section('page-aba-title') //Nome que aparece na aba do navegador
@section('page-title')
@section('page-title-small')
@section('page-content')
@section('page-breadcrumb') //Ex: <li class="active">Dashboard</li>
@section('page-css') //Nome que aparece na aba do navegador
@section('page-js') //Nome que aparece na aba do navegador
```

### Pacotes adicionados
```php
$> composer require guzzlehttp/guzzle
$> composer require symfony/psr-http-message-bridge
```
