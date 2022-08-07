require('./bootstrap');

var toastElList = [].slice.call(document.querySelectorAll('.toast'))
toastElList.map(function(toastEl) {
    new bootstrap.Toast(toastEl).show();
});

function updateToast(newToast){
    $('#toastForm').replaceWith(newToast);
    new bootstrap.Toast($('#toast')).show();
}

$('#add_article').click(function () {
    $.ajax({
        url: '/create',
        method: 'post',
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            'title': 'New article',
            'body': 'Some text...'
        },
        success: function(result){
            $('#article_list').prepend(result['article']);
            updateToast(result['toast']);
        }
    });
})

$(document).on('click', '.delete_article_button', function () {
    let card = $(this).closest('.card');
    $.ajax({
        url: $(this).closest('form').attr('action'),
        method: 'delete',
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(result){
            if(result['success'])
                card.remove();
            updateToast(result['toast']);
        }
    });
})

$(document).on('click', '.edit_article_button', function () {
    $('#article_modal_form').find('#title').val(
        $(this).closest('.card').find('.card-title').text()
    );
    $('#article_modal_form').find('#body').val(
        $(this).closest('.card').find('.card-text').text()
    );
    $('#article_modal_form').find('#article_id').val(
        $(this).closest('.card').find('.article_id').val()
    );
})

$(document).on('click', '#update_article_button', function () {
    let form = $(this).closest('.modal').find('form');
    let card = $('#article_list').find('.article_id[value=' + form.find('#article_id').val() + ']')
        .closest('.card');
    $.ajax({
        url: form.attr('action'),
        method: 'post',
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        data: form.serialize(),
        success: function(result){
            if(result['success'])
                card.replaceWith(result['article']);
            updateToast(result['toast']);
        }
    });
    $('#article_modal_form').find('.btn-close').trigger('click');
})
