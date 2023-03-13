<?php
class Request
{

    private $uri;
    private $method;

    public function __construct()
    {
        $this->uri = parse_url($_SERVER['REQUEST_URI'])['path'];
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    public function getURI()
    {
        return $this->uri;
    }

    public function getMethod()
    {
        return $this->method;
    }
}