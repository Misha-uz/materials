document.addEventListener('DOMContentLoaded', function () {
    let materialAddTag = $('#materialAddTag');
    let material_tag_list = $('#material_tag_list');
    let exampleModalToggle = $('#exampleModalToggle');
    let material_url_list = $('#material-url-list');
    let url_create = $('#url_create');
    url_create.click(function (event){
        event.preventDefault();
        let aUrl = $(this);
        $.ajax({
            url: '/material-url/create?material_id='+$(this).attr('material_id'),
            type: 'get',
            success: function (data) {
                exampleModalToggle.html(data);
                exampleModalToggle.modal('show');
            },
        })
        return false;
    });
    materialAddTag
        .on('submit', function (event) {
            event.preventDefault();
            $.ajax({
                url: materialAddTag.attr('action'),
                type: 'post',
                data: materialAddTag.serializeArray(),
                success: function (data) {
                    material_tag_list.append(data);
                    $('[name=tag_id]').find('option[value=' + $('[name=tag_id]').val() + ']').remove();
                },
            })
            return false;
        });
    material_tag_list
        .on('click', 'a.tag_delete', function (event) {
            event.preventDefault();
            let aUrl = $(this);
            if(confirm(aUrl.attr('data-confirm'))) {
                $.ajax({
                    url: aUrl.attr('href'),
                    type: 'post',
                    success: function (data) {
                        aUrl.parent().remove();
                        $('[name=tag_id]').append(data);
                    },
                })
            }
            return false;
        });
    exampleModalToggle
        .on('click', '#url_save', function (event) {
            event.preventDefault();
            $.ajax({
                url: '/material-url/create',
                type: 'post',
                data: $('#material-url-form').serializeArray(),
                success: function (data) {
                    exampleModalToggle.modal('hide');
                    $('#material-url-form').find('input[type=text]').val('');
                    $('#material-url-list').append(data);
                },
            })
            return false;
        })
        .on('click', '#url_update_save', function (event) {
            event.preventDefault();
            let form = exampleModalToggle.find('form');
            $.ajax({
                url: form.attr('action'),
                type: 'post',
                data: form.serializeArray(),
                success: function (data) {
                    exampleModalToggle.modal('hide');
                    $('#material-url-list').find('#'+form.attr('data-id')).replaceWith(data);
                },
            })
            return false;
        })
    material_url_list
        .on('click', 'a.url_delete', function (event) {
            event.preventDefault();
            let aUrl = $(this);
            if(confirm(aUrl.attr('data-confirm'))) {
                $.ajax({
                    url: aUrl.attr('href'),
                    type: 'post',
                    success: function (data) {
                        aUrl.parent().parent().remove();
                    },
                })
            }
            return false;
        })
        .on('click', 'a.url_update', function (event) {
            event.preventDefault();
            let aUrl = $(this);
            $.ajax({
                url: aUrl.attr('href'),
                type: 'post',
                success: function (data) {
                    exampleModalToggle.html(data);
                    exampleModalToggle.modal('show');
                },
            })
            return false;
        })

});