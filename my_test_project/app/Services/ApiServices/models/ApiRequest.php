<?php


namespace App\Services\ApiServices\models;


class ApiRequest
{
    public $method;
    public $url;
    public $data;

    public function __construct($method, $url, $data)
    {
        $this->method = $method;
        $this->url = $url;
        $this->data = $data;
    }

    public function expose() {
        return get_object_vars($this);
    }
}
