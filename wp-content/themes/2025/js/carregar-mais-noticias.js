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

    function ajustarPadding() {
        console.log("ajustarPadding")
        // Seleciona os elementos
        const header = document.querySelector('.header-title-2');
        const conteudo = document.getElementById('conteudo-noticia');
        
    
        if (header && conteudo) {
            // Obtém a altura do elemento .header-title-2
            const alturaHeader = header.offsetHeight-200;

            console.log(alturaHeader)
    
            // Define o padding-top do #conteudo-noticia com base na altura do .header-title-2
            conteudo.style.paddingTop = `${alturaHeader}px`;
            conteudo.style.paddingBottom = `3rem`;
        }
    }
    
    // Ajusta o padding ao carregar a página
    window.addEventListener('load', ajustarPadding);
    
    // Ajusta o padding ao redimensionar a janela (caso o tamanho do header mude)
    window.addEventListener('resize', ajustarPadding);

    // Quando o título for clicado
    $(document).on('click', '.abrir-modal', function() {
        var mediaUrl = $(this).data('url'); // Obtém o link do atributo data-url
        var mediaTitle = $(this).data('title'); 
        var mediaContent = $(this).data('content');
        var modalBody = $('#modal-body'); // Corpo do modal
        modalBody.empty(); // Limpa o conteúdo anterior

        
        var contEmbed = "";

        if(mediaTitle){
            contEmbed += '<h5>' + mediaTitle + '</h5>';
         }
        // Verifica se é um link do YouTube ou uma imagem
        if (mediaUrl.includes('youtube') || mediaUrl.includes('youtu.be')) {
            const urlObj = new URL(mediaUrl);
            // Caso seja um vídeo do YouTube, cria um iframe
            contEmbed += '<iframe width="560" height="315" src="https://www.youtube.com/embed/' + urlObj.searchParams.get("v") + '" frameborder="0" allowfullscreen></iframe>';
           // modalBody.html(videoEmbed);
        } else {
            // Caso contrário, assume que é uma imagem
            contEmbed += '<img src="' + mediaUrl + '" alt="Mídia">';
           // modalBody.html(imageEmbed);
        }

       
        if(mediaContent){
            contEmbed += '<p class="content">' + mediaContent + '</p>';
         }

        modalBody.html(contEmbed);

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