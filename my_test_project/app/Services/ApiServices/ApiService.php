<?php


namespace App\Services\ApiServices;


use App\Services\ApiServices\ConcreteApiRequestServices\CreateArticle;
use App\Services\ApiServices\ConcreteApiRequestServices\DeleteArticle;
use App\Services\ApiServices\ConcreteApiRequestServices\GetAllArticles;
use App\Services\ApiServices\ConcreteApiRequestServices\GetArticleById;
use App\Services\ApiServices\ConcreteApiRequestServices\UpdateArticle;

class ApiService
{
    public static function getAllArticles(){
        return (new GetAllArticles())->send();
    }
    public static function getArticle($id){
        return (new GetArticleById($id))->send();
    }
    public static function createArticle($articleData){
        return (new CreateArticle($articleData))->send();
    }
    public static function updateArticle($articleData){
        return (new UpdateArticle($articleData))->send();
    }
    public static function deleteArticle($id){
        return (new DeleteArticle($id))->send();
    }
}
