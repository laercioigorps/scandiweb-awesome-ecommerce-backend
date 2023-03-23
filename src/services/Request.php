<?php

declare(strict_types=1);

namespace Services;

class Request
{

    private string $uri;
    private string $method;
    public $POST;

    public function __construct()
    {
        $this->uri = parse_url($_SERVER['REQUEST_URI'])['path'];
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->POST = json_decode(file_get_contents('php://input'), true);
    }

    public function getURI(): string
    {
        return $this->uri;
    }

    public function getMethod(): string
    {
        return $this->method;
    }
}