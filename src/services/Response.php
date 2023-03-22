<?php
namespace Services;

class Response
{

    private $data = null;
    public function __construct($data = null, int $status = 200)
    {
        $this->setHeaders();
        $this->setStatus($status);
        $this->setData($data);
    }

    private function setHeaders()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    }

    public function setStatus($status)
    {
        http_response_code($status);
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }
}