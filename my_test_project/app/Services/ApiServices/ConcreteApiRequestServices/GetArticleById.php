<?php


namespace App\Services\ApiServices\ConcreteApiRequestServices;


use App\Services\ApiServices\AbstractApiRequestService;
use App\Services\ApiServices\models\ApiRequest;
use App\Services\ApiServices\models\ApiResponse;

class GetArticleById extends AbstractApiRequestService
{
    public $successMessage = 'Got article by id';

    private $id;

    public function __construct($id)
    {
        parent::__construct();
        $this->id = $id;
    }

    protected function makeRequest()
    {
        return new ApiRequest(
            'GET',
            $this->baseUrl . '/articles/' . $this->id,
            []
        );
    }
}
