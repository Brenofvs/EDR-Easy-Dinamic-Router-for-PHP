# EDR - Easy Dynamic Router PHP - English
*README em Português logo abaixo*

First of all, thank you for visiting here! Hope this can help you :)

What is EDR? Well, this is a PHP class created by me [Brenofvs](https://www.github.com/Brenofvs "Brenofvs GitHub page") to make routes easier. While learning PHP with MVC I found a big problem to deal with, Routes.

While I'm creating my projects I needed to create a lot of code just to redirect the client to the requested page, but keeping the URL friendly, so if the user types "www.site.com" I need to redirect to the home page, but if the user types " www.site.com/contact" I want to redirect to contact page without showing links like "www.site.com/page/contact.php".

So I decided to create a simple code to redirect all pages with friendly links without having to write one more line of code to do it, and thus EDR was born, let's see how it works.

The most important thing here is not the class, but the .htaccess file which is an Apache configuration file, you can see the docs by [clicking here.](https://httpd.apache.org/docs/2.2/howto/htaccess.html "Apache .htaccess Docs")

This file can redirect and rewrite URLs, and I used it to create the `$_GET['url']` variable in PHP, see the code below:

```.htaccess
# URL Admin rewrite by Brenofvs
<IfModule mod_rewrite.c>
RewriteCond %{SCRIPT_FILENAME} !-f
RewriteCond %{SCRIPT_FILENAME} !-d
RewriteRule ^admin/([0-9A-z_-]+)$ admin/index.php?url=$1 [QSA,L,NC]
</IfModule>

# URL rewrite by Brenofvs
<IfModule mod_rewrite.c>
RewriteCond %{SCRIPT_FILENAME} !-f
RewriteCond %{SCRIPT_FILENAME} !-d
RewriteRule ^(.*)$ index.php?url=$1 [QSA,L,NC]
</IfModule>
```

The first `IfModule` checks if the requested link is for an administration panel, if you are creating a CMS or a CRUD for the administrator to be able to modify the main site this module redirects to the index.php of the administration panel, for example: "www.site.com/admin" will result in directory "./admin/index.php"

The second `IfModule` causes all links to redirect to the root index.php, except links with "admin" in the URI.

Both modules identify what is written after the "/" and rewrite it as "?url=$1", and in this example you can see the result: "www.site.com/contact" will be equal to "www.site.com/index.php?url=contact"

So all we need to do is get the value of "?url" to know which page is being requested, now let's look at the `Router.php` class.

```PHP
<?php

namespace Source\Helpers;

/**
 * Brenofvs | Class Router
 *
 * @author Brenofvs <github.com/Brenofvs>
 * @package Source\Helpers
 */
class Router
{

    private $url;
    private $dir = "./pages/";
    private $ext = ".php";

    public function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : 'home';
        $this->url = $url;
    }

    public function loadPage()
    {
        if (file_exists($this->dir . $this->url . $this->ext)) {
            include $this->dir . $this->url . $this->ext;
        } else {
            include "./pages/404.php";
        }
    }
}
```

This class has three variables, `$url`, `$dir` and `$ext`.

`$url`: Will have the value returned by `$_GET['url']`.

`$dir`: The name of the folder where the page files are.

`$ext`: The extension of the files you are using, I always use ".php".

We can see just below a __construct function that is responsible for assigning the value of `$_GET['url']` to our variable `$url` of the class, if there is no value assigned, the default value will be "home".

Next is where the magic happens, we have the `loadPage()` function which is responsible for checking if the file requested through the url exists and if it exists, this function includes this file inside the index.php as we can see in this example: we imagine the url "www.site.com/contact" and then the function will check if there is a file called "contact.php" inside the "pages" folder and if this file exists then it will include it inside the index, otherwise it will display the "404.php" page, an error page if no file is found.

Now we'll see how to use this class, I've already left the whole environment ready to do the tests, but all you need to implement the class is to download it and call it through the "new" operator in PHP.

In this example I used composer autoload to make things easier and you can use the test environment I created here in this repository to learn how to use the class before implementing it on your systems!

```PHP
<?php

require "./vendor/autoload.php";

use Source\Helpers\Router;

echo "<h1>Main Index</h1>";
$router = new Router();
$router->loadPage();
```

In the above code we are requesting the autoload which was downloaded through composer and is in the "./vendor/autoload.php" folder and we are using the class through the "Source\Helpers\Router" namespace.

Right below we have a ´h1´ tag just to identify which index we are in (we also have the index.php from the admin panel) and right after that we already have the class being used through the "new" operator and having its loadPage function already loading the "home" page as it is defined by default.

So to test it, just change the link by adding a "/" at the end of it and a name for the page you want to request, for example "http://localhost/PHPRouter/teste" and the page "./pages/teste.php" will automatically be loaded, but if the file does not exist in that directory, the page "./pages/404.php" will be loaded.

As you can see, it's a very simple class, it will take care of the routes to any page automatically without the need to change/add any extra line of code for that, all pages will be dynamically included, I hope that this article has helped you in some way.

# EDR - Easy Dynamic Router PHP - Português
*README in English just above*

Em primeiro lugar, obrigado por visitar este repositório! Espero poder ajudá-lo :)

O que é o EDR? Bem, esta é uma classe PHP criada por mim [Brenofvs](https://www.github.com/Brenofvs "Brenofvs GitHub page") para facilitar as rotas. Enquanto aprendia PHP com MVC, encontrei um grande problema para lidar, Rotas.

Enquanto criava meus projetos precisei criar muito código apenas para redirecionar o client para a página solicitada, mas mantendo a URL amigável, então se o usuário digitar "www.site.com" preciso redirecionar para a página home, mas se o usuário digitar "www.site.com/contact" eu quero redirecionar para a página de contato sem mostrar links como "www.site.com/page/contact.php".

Então resolvi criar um código simples para redirecionar todas as páginas com links amigáveis ​​sem precisar escrever mais uma linha de código para isso, e assim nasceu o EDR, vamos ver como funciona.

O mais importante aqui não é a classe, mas sim o arquivo .htaccess que é um arquivo de configuração do Apache, você pode ver a documentação [clicando aqui.](https://httpd.apache.org/docs/2.2/howto/htaccess.html "Apache .htaccess Docs")

Este arquivo pode redirecionar e reescrever URLs, e eu o usei para criar a variável `$_GET['url']` no PHP, veja o código abaixo:

```.htaccess
# URL Admin rewrite by Brenofvs
<IfModule mod_rewrite.c>
RewriteCond %{SCRIPT_FILENAME} !-f
RewriteCond %{SCRIPT_FILENAME} !-d
RewriteRule ^admin/([0-9A-z_-]+)$ admin/index.php?url=$1 [QSA,L,NC]
</IfModule>

# URL rewrite by Brenofvs
<IfModule mod_rewrite.c>
RewriteCond %{SCRIPT_FILENAME} !-f
RewriteCond %{SCRIPT_FILENAME} !-d
RewriteRule ^(.*)$ index.php?url=$1 [QSA,L,NC]
</IfModule>
```

O primeiro `IfModule` verifica se o link solicitado é para um painel de administração, se você está criando um CMS ou um CRUD para o administrador poder modificar o site principal este módulo redireciona para o index.php do painel de administração, para exemplo: "www.site.com/admin" resultará no diretório "./admin/index.php"

O segundo `IfModule` faz com que todos os links sejam redirecionados para o index.php da raiz, exceto links com "admin" na URI.

Ambos os módulos identificam o que está escrito depois do "/" e reescrevem como "?url=$1", e neste exemplo você pode ver o resultado: "www.site.com/contact" será igual a "www.site. com/index.php?url=contato"

Então, tudo o que precisamos fazer é obter o valor de "?url" para saber qual página está sendo solicitada, agora vamos ver a classe `Router.php`.

```PHP
<?php

namespace Source\Helpers;

/**
 * Brenofvs | Class Router
 *
 * @author Brenofvs <github.com/Brenofvs>
 * @package Source\Helpers
 */
class Router
{

    private $url;
    private $dir = "./pages/";
    private $ext = ".php";

    public function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : 'home';
        $this->url = $url;
    }

    public function loadPage()
    {
        if (file_exists($this->dir . $this->url . $this->ext)) {
            include $this->dir . $this->url . $this->ext;
        } else {
            include "./pages/404.php";
        }
    }
}
```

Esta classe possui três variáveis, `$url`, `$dir` e `$ext`.

`$url`: Terá o valor retornado por `$_GET['url']`.

`$dir`: O nome da pasta onde estão os arquivos da página.

`$ext`: A extensão dos arquivos que você está usando, eu sempre uso ".php".

Podemos ver logo abaixo uma função __construct que é responsável por atribuir o valor de `$_GET['url']` à nossa variável `$url` da classe, caso não haja valor atribuído, o valor padrão será "home".

A seguir é onde a mágica acontece, temos a função `loadPage()` que é responsável por verificar se o arquivo solicitado através da url existe e se existir, esta função inclui este arquivo dentro do index.php como podemos ver neste exemplo: imaginamos a url "www.site.com/contact" e então a função irá verificar se existe um arquivo chamado "contact.php" dentro da pasta "pages" e se esse arquivo existir então irá incluí-lo dentro do index, caso contrário, ele exibirá a página "404.php", uma página de erro se nenhum arquivo for encontrado.

Agora vamos ver como usar essa classe, já deixei todo o ambiente pronto para fazer os testes, mas tudo que você precisa para implementar a classe é baixá-la e chamá-la através do operador "new" do PHP.

Neste exemplo usei o composer autoload para facilitar as coisas e você pode usar o ambiente de teste que criei aqui neste repositório para aprender como usar a classe antes de implementá-la em seus sistemas!

```PHP
<?php

require "./vendor/autoload.php";

use Source\Helpers\Router;

echo "<h1>Main Index</h1>";
$router = new Router();
$router->loadPage();
```

No código acima estamos solicitando o autoload que foi baixado através do composer e está na pasta "./vendor/autoload.php" e estamos utilizando a classe através do namespace "Source\Helpers\Router".

Logo abaixo temos uma tag ´h1´ apenas para identificar em qual index estamos (temos também o index.php do painel de administração) e logo em seguida já temos a classe sendo utilizada através do operador "new" e tendo sua função loadPage já carregando a página "home" como é definido por padrão.

Então, para testar, basta alterar o link adicionando um "/" no final dele e um nome para a página que deseja solicitar, por exemplo "http://localhost/PHPRouter/teste" e a página "./pages/teste.php" será carregada automaticamente, mas se o arquivo não existir nesse diretório, a página "./pages/404.php" será carregada.

Como podem ver é uma classe bem simples, ela vai cuidar das rotas para qualquer página automaticamente sem a necessidade de alterar/adicionar nenhuma linha extra de código para isso, todas as páginas serão incluídas dinamicamente, espero que este artigo tenha te ajudado de alguma forma.