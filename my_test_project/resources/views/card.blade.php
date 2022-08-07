
<div class="card mb-3">
    <div class="d-flex align-items-center">
        <div class="card-body">
            <input hidden class="article_id" value="{{$article->id}}">
            <h5 class="card-title">{{$article->title}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">
                {{(new DateTime($article->created_at))->format('d.m.Y H:i')}}
            </h6>
            <p class="card-text">{{$article->body}}</p>
        </div>
        <div class="me-3">
            <button class="btn btn-success d-block w-100 mb-2 edit_article_button" data-bs-toggle="modal" data-bs-target="#article_modal_form">Edit</button>
            <form action="{{ route('article.delete', ['id' => $article->id]) }}">
                <button type="button" class="btn btn-danger d-block w-100 delete_article_button">Delete</button>
            </form>
        </div>
    </div>
</div>
