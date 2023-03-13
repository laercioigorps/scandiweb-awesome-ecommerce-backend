<?php
require_once('../src/services/Response.php');
class Router
{

    private $routes = [];

    private function add($uri, $controler, $method)
    {
        $this->routes[] = [
            'uri' => $uri,
            'method' => $method,
            'controler' => $controler,
        ];
    }

    public function get($uri, $controler)
    {
        $this->add($uri, $controler, 'GET');
    }

    public function post($uri, $controler)
    {
        $this->add($uri, $controler, 'POST');
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $rout) {
            if ($uri === $rout['uri'] && $method == $rout['method']) {
                echo $rout['controler']()->getData();
                return;
            }
        }
        new Response(status: 404);
    }
}