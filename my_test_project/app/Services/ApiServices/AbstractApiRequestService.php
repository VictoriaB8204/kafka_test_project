<?php


namespace App\Services\ApiServices;


use App\Services\ApiServices\models\ApiResponse;
use Illuminate\Support\Facades\Log;

abstract class AbstractApiRequestService
{
    protected $connectionService;
    public $successMessage = '';
    protected $baseUrl = 'http://127.0.0.1:8000/api';
    protected $apiRequest;

    public function __construct()
    {
        $this->connectionService = new ApiConnectService();
    }

    public function send(){
        $error = $this->checkDataCorrectness();
        if($error != null) {
            Log::error($error);
            return new ApiResponse(false, null, $error);
        }

        $this->apiRequest = $this->makeRequest();
        Log::info(json_encode($this->apiRequest->expose()));
        $apiResponse = $this->connectionService->sendRequest($this->apiRequest);

        if($apiResponse->success)
            return $this->onSuccessAction($apiResponse);
        else
            return $this->onFailAction($apiResponse);
    }

    protected function checkDataCorrectness(){
        return null;
    }

    protected function onSuccessAction(ApiResponse $apiResponse)
    {
        Log::info($this->successMessage);
        $apiResponse->message = $this->successMessage;
        return $apiResponse;
    }

    protected function onFailAction(ApiResponse $apiResponse){
        Log::error($apiResponse->message);
        Log::error(json_encode($this->apiRequest));
        return $apiResponse;
    }

    protected abstract function makeRequest();
}
