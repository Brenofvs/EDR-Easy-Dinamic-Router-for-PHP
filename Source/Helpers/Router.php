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
