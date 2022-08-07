<?php


namespace App\Services\ApiServices\ConcreteApiRequestServices;


use App\Services\ApiServices\AbstractApiRequestService;
use App\Services\ApiServices\models\ApiRequest;
use App\Services\ApiServices\models\ApiResponse;

class GetAllArticles extends AbstractApiRequestService
{
    public $successMessage = 'Article list loaded';

    protected function makeRequest()
    {
        return new ApiRequest(
            'GET',
            $this->baseUrl . '/articles',
            []
        );
    }
}
