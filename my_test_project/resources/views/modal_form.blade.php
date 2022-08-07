<div class="modal fade" id="article_modal_form" tabindex="-1" role="dialog" aria-hidden="true"  data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Article</h5>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('article.update') }}" id="update_article_form">
                    <input hidden name="id" id="article_id">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Body</label>
                        <textarea class="form-control" id="body" name="body" rows="6"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="update_article_button">Сохранить</button>
            </div>
        </div>
    </div>
</div>
