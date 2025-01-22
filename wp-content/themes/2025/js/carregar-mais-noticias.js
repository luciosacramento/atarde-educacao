console.log("oifhfghghfgf");
jQuery(document).ready(function($) {
    $('#mais-noticias').on('click', function() {
        var botao = $(this);
        var paged = parseInt(botao.attr('data-paged')) + 1; // Incrementa a página
        
        var tipo = 'noticias';
        if(botao.attr('tipo')){
            tipo = botao.attr('tipo');
        }

        botao.attr('data-paged', paged); // Atualiza o número da página

        $.ajax({
            url: ajax_obj.ajax_url, // Use a variável passada pelo PHP
            type: 'POST',
            data: {
                action: 'carregar_mais_noticias', // Nome da ação no PHP
                paged: paged,
                tipo: tipo
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

                    botao.text('Carregar mais'); // Restaura o texto do botão
                } else {
                    botao.text('Sem mais dados').prop('disabled', true); // Desabilita o botão se não houver Carregar mais
                }
            },
            error: function(xhr, status, error) {
                console.error('Erro na solicitação AJAX:', error);
                botao.text('Carregar mais'); // Restaura o texto do botão em caso de erro
            },
        });
    });

    // Quando o título for clicado
    $(document).on('click', '.abrir-modal', function() {
        var mediaUrl = $(this).data('url'); // Obtém o link do atributo data-url
        var modalBody = $('#modal-body'); // Corpo do modal
        modalBody.empty(); // Limpa o conteúdo anterior

        

        // Verifica se é um link do YouTube ou uma imagem
        if (mediaUrl.includes('youtube') || mediaUrl.includes('youtu.be')) {
            console.log(mediaUrl);
            // Caso seja um vídeo do YouTube, cria um iframe
            var videoEmbed = '<iframe width="560" height="315" src="' + mediaUrl + '" frameborder="0" allowfullscreen></iframe>';
            modalBody.html(videoEmbed);
        } else {
            // Caso contrário, assume que é uma imagem
            var imageEmbed = '<img src="' + mediaUrl + '" alt="Mídia">';
            modalBody.html(imageEmbed);
        }

        // Exibe o modal
        $('#modal').fadeIn();
    });

    // Fechar o modal
    $(document).on('click', '#fechar-modal', function() {
        $('#modal').fadeOut();
    });

    // Fechar o modal ao clicar fora do conteúdo
    $(document).on('click', '#modal', function(e) {
        if ($(e.target).is('#modal')) {
            $('#modal').fadeOut();
        }
    });
    
});