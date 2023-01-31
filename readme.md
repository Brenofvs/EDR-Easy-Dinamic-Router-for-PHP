# Brenofvs | Class Router
*README em postugês logo abaixo*

This class is responsible for loading pages based on the URL. It is part of the [Source\Helpers](https://github.com/Brenofvs/Source/Helpers) package. 

## Methods 
- `__construct()`: Initializes the `$url` variable with the value of the `$_GET['url']` or `'home'` if it does not exist. 
- `loadPage()`: Loads a page based on the value of `$url`. If the file does not exist, it loads a 404 page. 

## Usage 
```php 
use Source\Helpers\Router; 
$router = new Router(); 
$router->loadPage(); 
```

# Brenofvs | Class Router

This class is responsible for loading pages based on the URL. It is part of the [Source\Helpers](https://github.com/Brenofvs/Source/Helpers) package. 

## Methods 
- `__construct()`: Initializes the `$url` variable with the value of the `$_GET['url']` or `'home'` if it does not exist. 
- `loadPage()`: Loads a page based on the value of `$url`. If the file does not exist, it loads a 404 page. 

## Usage 
```php 
use Source\Helpers\Router; 
$router = new Router(); 
$router->loadPage(); 
```
