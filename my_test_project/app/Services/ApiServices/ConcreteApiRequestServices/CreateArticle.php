<?php


namespace App\Services\ApiServices\ConcreteApiRequestServices;


use App\Services\ApiServices\AbstractApiRequestService;
use App\Services\ApiServices\models\ApiRequest;
use App\Services\ApiServices\models\ApiResponse;

class CreateArticle extends AbstractApiRequestService
{
    public $successMessage = 'Article created';

    private $request;

    public function __construct($articleData)
    {
        parent::__construct();
        $this->request = $articleData;
    }

    protected function checkDataCorrectness()
    {
        if(!$this->request->has('title') || trim($this->request->input('title')) == '')
            return 'CreateArticle error: $this->title = null';

        if(!$this->request->has('body') || trim($this->request->input('body')) == '')
            return 'CreateArticle error: $this->body = null';

        return parent::checkDataCorrectness();
    }

    protected function makeRequest()
    {
        return new ApiRequest(
            'POST',
            $this->baseUrl . '/articles',
            $this->request->only(['title', 'body'])
        );
    }
}
