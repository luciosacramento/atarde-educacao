jQuery(document).ready(function($) {
    $('#upload_imagem_personalizada').click(function(e) {
        e.preventDefault();
        var imageUploader = wp.media({
            title: 'Selecionar Imagem',
            button: {
                text: 'Usar esta imagem'
            },
            multiple: false
        }).on('select', function() {
            var attachment = imageUploader.state().get('selection').first().toJSON();
            $('#imagem_personalizada').val(attachment.url);
        }).open();
    });
});