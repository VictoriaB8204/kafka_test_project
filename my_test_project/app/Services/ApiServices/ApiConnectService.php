<?php


namespace App\Services\ApiServices;

use App\Services\ApiServices\models\ApiRequest;
use App\Services\ApiServices\models\ApiResponse;
use Illuminate\Support\Facades\Log;

class ApiConnectService
{
    public function sendRequest(ApiRequest $apiRequest){
        $opts = array(
            'http' => array(
                'method'  => $apiRequest->method,
                'header'  => 'Content-type: application/json',
                'content' => json_encode($apiRequest->data)
            )
        );

        $context  = stream_context_create($opts);

        try{
            $result = file_get_contents(
                $apiRequest->url,
                false,
                $context
            );

            return new ApiResponse(
                true,
                json_decode($result)
            );
        }
        catch (\Exception $ex){
            if(!empty($http_response_header)) {
                preg_match("#HTTP/[0-9\.]+\s+([0-9]+)+\s+(.*)#", $http_response_header[0], $match);
                $statusCode = intval($match[1]);

                return new ApiResponse(
                    false,
                    null,
                    'Api error: ' . $statusCode . ' ' . $match[2]
                );
            }else {
                Log::error('Api error: ' . $ex->getMessage() . ' ' . json_encode($apiRequest));
                return new ApiResponse(
                    false,
                    null,
                    'Api error: ' . $ex->getMessage()
                );
            }
        }
    }

}
