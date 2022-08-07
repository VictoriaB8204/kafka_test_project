@extends('app')

@section('content')
    <div class="d-flex justify-content-between my-4">
        <h1>Articles list</h1>
        <button class="btn btn-primary" id="add_article">+Add</button>
    </div>
    <div id="article_list">
        @foreach($articles as $article)
            @include('card')
        @endforeach
    </div>
    @include('modal_form')
@endsection
