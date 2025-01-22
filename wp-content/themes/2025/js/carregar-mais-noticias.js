console.log("oifhfghghfgf");
jQuery(document).ready(function($) {

    console.log(ajax_obj.ajax_url);
    
    $('#mais-noticias').on('click', function() {
        var botao = $(this);
        var paged = parseInt(botao.attr('data-paged')) + 1; // Incrementa a página
        botao.attr('data-paged', paged); // Atualiza o número da página

        $.ajax({
            url: ajax_obj.ajax_url,
            type: 'POST',
            data: {
                action: 'carregar_mais_noticias',
                paged: paged,
            },
            beforeSend: function() {
                botao.text('Carregando...'); // Altere o texto do botão durante o carregamento
            },
            success: function(response) {
                if (response.success) {
                    var $novasNoticias = $(response.data); // Cria um objeto jQuery com as novas notícias
                    $novasNoticias.css('display', 'none'); // Esconde inicialmente

                    $('#noticias-container').append($novasNoticias); // Adiciona ao container

                    // Aplica o efeito cascata
                    $novasNoticias.each(function(index, element) {
                        $(element).delay(200 * index).fadeIn(400); // Efeito em cascata
                    });

                    botao.text('Mais Notícias'); // Restaura o texto do botão
                } else {
                    botao.text('Sem mais notícias').prop('disabled', true); // Desabilita o botão se não houver mais notícias
                }
            },
            error: function(xhr, status, error) {
                console.error('Erro na solicitação AJAX:', error);
                botao.text('Mais Notícias'); // Restaura o texto do botão em caso de erro
            },
        });
    });
});