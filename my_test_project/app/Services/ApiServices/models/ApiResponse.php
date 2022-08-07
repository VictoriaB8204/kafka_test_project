<?php


namespace App\Services\ApiServices\models;


use JsonSerializable;

class ApiResponse implements JsonSerializable
{
    public $success;
    public $response;
    public $message;

    public function __construct(bool $success, $response, $message = '')
    {
        $this->success = $success;
        $this->response = $response;
        $this->message = $message;
    }

    public function jsonSerialize()
    {
        return [
            'success' => $this->success,
            'response' => $this->response,
            'message' => $this->message
        ];
    }
}
