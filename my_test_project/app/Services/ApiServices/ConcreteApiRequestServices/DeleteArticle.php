<?php


namespace App\Services\ApiServices\ConcreteApiRequestServices;


use App\Services\ApiServices\AbstractApiRequestService;
use App\Services\ApiServices\models\ApiRequest;
use App\Services\ApiServices\models\ApiResponse;

class DeleteArticle extends AbstractApiRequestService
{
    public $successMessage = 'Article deleted';

    private $id;

    public function __construct($id)
    {
        parent::__construct();
        $this->id = $id;
    }
    protected function makeRequest()
    {
        return new ApiRequest(
            'DELETE',
            $this->baseUrl . '/articles/' . $this->id,
            []
        );
    }
}
