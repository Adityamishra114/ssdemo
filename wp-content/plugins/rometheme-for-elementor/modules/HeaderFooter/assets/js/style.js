jQuery(document).ready(($) => {
    $('#ModalEdit').on('show.bs.modal', (event) => {
        var edit_button = $(event.relatedTarget);
        var post_id = edit_button.data('post-id');
        var post_name = edit_button.data('post-name');
        var type = edit_button.data('type');
        var active = edit_button.data('active');
        var modal = $('#ModalEdit');
        modal.find('#id').val(post_id);
        modal.find('#inputTitle').val(post_name);
        modal.find('#inputType').val(type);
        if (active === true) {
            modal.find('#switch').prop("checked", true)
        } else {
            modal.find('#switch').prop("checked", false)
        }
    });

    $('#edit-submit-btn').click((event) => {
        $(event.currentTarget).html('Saving...');
        $(event.currentTarget).prop('disabled', true);
        $('#edit_form').find('#close-btn').prop('disabled' , true);
        $('#edit_form').find('.btn-close').prop('disabled' , true);
        data = $("#edit_form").serialize();
        $.ajax({
            type: 'post',
            url: rometheme_ajax_url.ajax_url,
            data: data,
            success: (data) => {
                location.href = rometheme_url.header_footer_url;
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error("The following error occured: " + textStatus, errorThrown);
            },
        });
    });

    $('#add-submit-btn').click((event) => {
        $(event.currentTarget).html('Saving...');
        $(event.currentTarget).prop('disabled', true);
        $('#add-new-post').find('#close-btn').prop('disabled' , true);
        $('#add-new-post').find('.btn-close').prop('disabled' , true);
        data = $('#add-new-post').serialize();
        $.ajax({
            type: 'post',
            url: rometheme_ajax_url.ajax_url,
            data: data,
            success: (data) => {
                location.href = rometheme_url.themebuilder_url;
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error("The following error occured: " + textStatus, errorThrown);
            },
        });
    });

});
