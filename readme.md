# Brenofvs | Easy Dinamic Router for PHP

This class is responsible for loading the page requested by the user.

## Properties
- `$url`: Contains the url requested by the user;
- `$dir`: Contains the directory where the page files are stored;
- `$ext`: Contains the extension of the page files;

## Methods 
- `__construct()`: Responsible for receiving and storing the URL requested by the user; 
- `loadPage()`: Responsible for checking if there is a file with the same name as the URL requested by the user and, if so, loading it. Otherwise, it will load a 404 error page. 

 ## Usage 

 ```php 

 use Source\Helpers\Router;

 $router = new Router();

 $router->loadPage();

 ```
 
 # Brenofvs | Easy Dinamic Router for PHP
 Esta classe é responsável por carregar a página solicitada pelo usuário. 
 
 ## Propriedades 
 - `$url`: Contém a url solicitada pelo usuário; 
 - `$dir`: Contém o diretório onde os arquivos de página são armazenados; 
 - `$ext`: Contém a extensão dos arquivos de página;  

 ## Métodos  
 - `__construct()`: Responsável por receber e armazenar a URL solicitada pelo usuário;  
 - `loadPage()`: Responsável por verificar se existe um arquivo com o mesmo nome da URL solicitada pelo usuário e, caso exista, carrega-lo. Caso contrário, irá carregar uma página de erro 404.  

 ## Uso  

 ```php  

 use Source\Helpers\Router;  

 $router = new Router();  

 $router->loadPage();  

 ```
