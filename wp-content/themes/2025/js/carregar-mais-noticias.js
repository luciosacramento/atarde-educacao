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

    var currentIndex = 0; 
    var galleryImages = []; // Lista de imagens da galeria

    // Quando o título for clicado
    $(document).on('click', '.abrir-modal', function() {
        galleryImages = []; // Resetar a galeria ao abrir o modal

        // Captura todas as imagens da galeria para navegação
        $('.abrir-modal').each(function() {
            galleryImages.push({
                url: $(this).data('url'),
                title: $(this).data('title') || '',
                content: $(this).data('content') || '',
                depoimento: $(this).data('depoimento') || ''
            });
        });

        // Define o índice atual da imagem clicada
        currentIndex = $(this).parent().index();

        // Exibir imagem no modal
        showMedia(currentIndex);

        // Exibe o modal
        $('#modal').fadeIn();
    });

    // Exibir mídia no modal
    function showMedia(index) {
        var media = galleryImages[index];
        var modalBody = $('#modal-body');
        var contEmbed = '';

        if (media.title) {
            contEmbed += '<h5>' + media.title + '</h5>';
        }

        if (media.url) {
            if (media.url.includes('youtube') || media.url.includes('youtu.be')) {
                const urlObj = new URL(media.url);
                contEmbed += '<iframe width="560" height="315" src="https://www.youtube.com/embed/' + urlObj.searchParams.get("v") + '" frameborder="0" allowfullscreen></iframe>';
            } else {
                contEmbed += '<img src="' + media.url + '" alt="Mídia">';
            }
        }

        if (media.depoimento) {
            contEmbed += '<p>' + media.depoimento + '</p>';
        }

        if (media.content) {
            contEmbed += '<p class="content">' + media.content + '</p>';
        }

        modalBody.html(contEmbed);
    }

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

    // Evento para navegar para a imagem anterior
    $(document).on('click', '#prev', function(e) {
        e.stopPropagation();
        currentIndex--;
        if (currentIndex < 0) {
            currentIndex = galleryImages.length - 1;
        }
            showMedia(currentIndex);
    });

    // Evento para navegar para a próxima imagem
    $(document).on('click', '#next', function(e) {
        e.stopPropagation();
        currentIndex++;
        if (currentIndex > galleryImages.length - 1) {
            currentIndex = 0;
        }
            showMedia(currentIndex);
    });
    
});