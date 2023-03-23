<?php

declare(strict_types=1);

namespace Services;

class Router
{

    private $routes = [];

    private function add(string $uri, callable $controler, string $method)
    {
        $this->routes[] = [
            'uri' => $uri,
            'method' => $method,
            'controler' => $controler,
        ];
    }

    public function get(string $uri, callable $controler)
    {
        $this->add($uri, $controler, 'GET');
    }

    public function post(string $uri, callable $controler)
    {
        $this->add($uri, $controler, 'POST');
    }

    public function route(Request $request)
    {
        if ($request->getMethod() === 'OPTIONS') {
            new Response();
            return;
        }
        foreach ($this->routes as $rout) {
            if ($request->getURI() === $rout['uri'] && $request->getMethod() == $rout['method']) {
                echo $rout['controler']($request)->getData();
                return;
            }
        }
        new Response(status: 404);
    }
}