<?php

namespace App\Http\Controllers;

use App\Services\ApiServices\ApiService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function index(){
        $apiResponse = ApiService::getAllArticles();
        return view('index', [
            'articles' => $apiResponse->response ? $apiResponse->response : [],
            'message' => $apiResponse->message,
            'success' => $apiResponse->success,
        ]);
    }

    public function create(Request $request){
        $apiResponse = ApiService::createArticle($request);
        return [
            'article' => $apiResponse->response ? view('card', [
                'article' => $apiResponse->response,
            ])->render() : '',
            'toast' => view('toast', [
                'message' => $apiResponse->message,
                'success' => $apiResponse->success,
            ])->render()
        ];
    }

    public function delete($id){
        $apiResponse = ApiService::deleteArticle($id);
        return [
            'success' => $apiResponse->success,
            'toast' => view('toast', [
                'message' => $apiResponse->message,
                'success' => $apiResponse->success,
            ])->render()
        ];
    }

    public function show($id){
        $apiResponse = ApiService::getArticle($id);
        return [
            'article' => $apiResponse->response ? view('card', [
                'article' => $apiResponse->response,
            ])->render() : '',
            'toast' => view('toast', [
                'message' => $apiResponse->message,
                'success' => $apiResponse->success,
            ])->render()
        ];
    }

    public function update(Request $request){
        $apiResponse = ApiService::updateArticle($request);
        return [
            'success' => $apiResponse->success,
            'article' => $apiResponse->response ? view('card', [
                'article' => $apiResponse->response,
            ])->render() : '',
            'toast' => view('toast', [
                'message' => $apiResponse->message,
                'success' => $apiResponse->success,
            ])->render()
        ];
    }
}
