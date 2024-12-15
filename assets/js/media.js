jQuery(document).ready(function($) {
    let mediaUploader;
    let userId = wmpwVars.userID;

    $('#product_image_button').on('click',function(e) {
        e.preventDefault();

        if (mediaUploader) {
            mediaUploader.open();
            return;
        }

        mediaUploader = wp.media({
            title: 'Choose Product Image',
            button: {
                text: 'Use this image'
            },
            library: {
                type: 'image',
                author: userId
            },
            multiple: false
        });

        mediaUploader.on('select', function() {
            const attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#product_image').val(attachment.id);
            $('#product_image_preview').html('<img src="' + attachment.url + '" style="max-width: 100px;" alt="Product image preview">');
        });

        mediaUploader.open();
    });
});
