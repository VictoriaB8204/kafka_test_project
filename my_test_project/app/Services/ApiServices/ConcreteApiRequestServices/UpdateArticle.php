<?php


namespace App\Services\ApiServices\ConcreteApiRequestServices;


use App\Services\ApiServices\AbstractApiRequestService;
use App\Services\ApiServices\models\ApiRequest;
use App\Services\ApiServices\models\ApiResponse;

class UpdateArticle extends AbstractApiRequestService
{
    public $successMessage = 'Article updated';

    private $articleData;

    public function __construct($articleData)
    {
        parent::__construct();
        $this->articleData = $articleData;
    }

    protected function checkDataCorrectness()
    {
        if(!$this->articleData->has('id') || trim($this->articleData->input('id')) == '')
            return 'UpdateArticle error: $this->id = null';

        if(!$this->articleData->has('title') || trim($this->articleData->input('title')) == '')
            return 'UpdateArticle error: $this->title = null';

        if(!$this->articleData->has('body') || trim($this->articleData->input('body')) == '')
            return 'UpdateArticle error: $this->body = null';

        return parent::checkDataCorrectness();
    }

    protected function makeRequest()
    {
        return new ApiRequest(
            'PUT',
            $this->baseUrl . '/articles/' . $this->articleData->input('id'),
            $this->articleData->only(['title', 'body'])
        );
    }
}
