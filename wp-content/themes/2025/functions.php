<?php
add_action( 'after_setup_theme', 'theme_setup' );

function theme_setup() {
    add_action( 'init', 'add_support_to_pages' );
}

function add_support_to_pages() {
    add_post_type_support( 'page', 'excerpt' );
}

add_theme_support( 'post-thumbnails' );

/*******************tipo de conteudo NOTICIA***************** */

function registrar_custom_post_type_noticias() {
    $labels = array(
        'name'               => _x('Notícias', 'Post Type General Name', 'textdomain'),
        'singular_name'      => _x('Notícia', 'Post Type Singular Name', 'textdomain'),
        'menu_name'          => __('Notícias', 'textdomain'),
        'name_admin_bar'     => __('Notícia', 'textdomain'),
        'archives'           => __('Arquivos de Notícias', 'textdomain'),
        'attributes'         => __('Atributos de Notícia', 'textdomain'),
        'parent_item_colon'  => __('Notícia Parente:', 'textdomain'),
        'all_items'          => __('Todas as Notícias', 'textdomain'),
        'add_new_item'       => __('Adicionar Nova Notícia', 'textdomain'),
        'add_new'            => __('Adicionar Nova', 'textdomain'),
        'new_item'           => __('Nova Notícia', 'textdomain'),
        'edit_item'          => __('Editar Notícia', 'textdomain'),
        'update_item'        => __('Atualizar Notícia', 'textdomain'),
        'view_item'          => __('Ver Notícia', 'textdomain'),
        'view_items'         => __('Ver Notícias', 'textdomain'),
        'search_items'       => __('Procurar Notícia', 'textdomain'),
        'not_found'          => __('Não encontrado', 'textdomain'),
        'not_found_in_trash' => __('Não encontrado na lixeira', 'textdomain'),
        'featured_image'     => __('Imagem Destacada', 'textdomain'),
        'set_featured_image' => __('Definir imagem destacada', 'textdomain'),
        'remove_featured_image' => __('Remover imagem destacada', 'textdomain'),
        'use_featured_image' => __('Usar como imagem destacada', 'textdomain'),
        'insert_into_item'   => __('Inserir na Notícia', 'textdomain'),
        'uploaded_to_this_item' => __('Enviado para esta Notícia', 'textdomain'),
        'items_list'         => __('Lista de Notícias', 'textdomain'),
        'items_list_navigation' => __('Navegação da lista de Notícias', 'textdomain'),
        'filter_items_list'  => __('Filtrar lista de Notícias', 'textdomain'),
    );

    $args = array(
        'label'               => __('Notícia', 'textdomain'),
        'description'         => __('Post Type para Notícias', 'textdomain'),
        'labels'              => $labels,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'comments', 'author', 'custom-fields', 'revisions'), // Mesmos campos do post padrão
        'taxonomies'          => array('category', 'post_tag'), // Categorias e Tags como em posts
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true, // Exibe no painel de administração
        'show_in_menu'        => true, // Exibe no menu
        'menu_position'       => 1, // Próximo de Posts
        'menu_icon'           => 'dashicons-megaphone', // Ícone do menu
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true, // Habilita um arquivo para "Notícias"
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest'        => true, // Habilita o editor de blocos (Gutenberg)
    );

    register_post_type('noticias', $args);
}

add_action('init', 'registrar_custom_post_type_noticias');


/*******************FIM  tipo de conteudo NOTICIA***************************************** */


/*******************tipo de conteudo EQUIPE***************************************** */
// Adicionar um tipo de conteúdo personalizado chamado "equipe"
function criar_tipo_conteudo_equipe() {
    $labels = array(
        'name'               => _x('Equipe', 'Post Type General Name', 'text_domain'),
        'singular_name'      => _x('Membro', 'Post Type Singular Name', 'text_domain'),
        'menu_name'          => __('Equipe', 'text_domain'),
        'name_admin_bar'     => __('Membro da Equipe', 'text_domain'),
        'archives'           => __('Arquivos de Membros', 'text_domain'),
        'attributes'         => __('Atributos de Membros', 'text_domain'),
        'parent_item_colon'  => __('Membro Principal:', 'text_domain'),
        'all_items'          => __('Todos os Membros', 'text_domain'),
        'add_new_item'       => __('Adicionar Novo Membro', 'text_domain'),
        'add_new'            => __('Adicionar Novo', 'text_domain'),
        'new_item'           => __('Novo Membro', 'text_domain'),
        'edit_item'          => __('Editar Membro', 'text_domain'),
        'update_item'        => __('Atualizar Membro', 'text_domain'),
        'view_item'          => __('Visualizar Membro', 'text_domain'),
        'view_items'         => __('Visualizar Equipe', 'text_domain'),
        'search_items'       => __('Buscar Membro', 'text_domain'),
        'not_found'          => __('Nenhum membro encontrado', 'text_domain'),
        'not_found_in_trash' => __('Nenhum membro encontrado na lixeira', 'text_domain'),
        'featured_image'     => __('Imagem de Destaque', 'text_domain'),
        'set_featured_image' => __('Definir imagem de destaque', 'text_domain'),
        'remove_featured_image' => __('Remover imagem de destaque', 'text_domain'),
        'use_featured_image' => __('Usar como imagem de destaque', 'text_domain'),
        'insert_into_item'   => __('Inserir no membro', 'text_domain'),
        'uploaded_to_this_item' => __('Enviado para este membro', 'text_domain'),
        'items_list'         => __('Lista de membros', 'text_domain'),
        'items_list_navigation' => __('Navegação da lista de membros', 'text_domain'),
        'filter_items_list'  => __('Filtrar lista de membros', 'text_domain'),
    );

    $args = array(
        'label'               => __('Equipe', 'text_domain'),
        'description'         => __('Tipo de conteúdo para a equipe da organização.', 'text_domain'),
        'labels'              => $labels,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'comments', 'revisions', 'custom-fields', 'author'), // Mesmos campos de "post"
        'taxonomies'          => array('category', 'post_tag'), // Categorias e tags padrão
        'hierarchical'        => false, // Não permite hierarquia, como posts normais
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 2, // Posição no menu do admin
        'menu_icon'           => 'dashicons-groups', // Ícone do menu
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post', // Comportamento semelhante ao tipo "post"
        'show_in_rest'        => true, // Habilita a API REST
    );

    register_post_type('equipe', $args);
}
add_action('init', 'criar_tipo_conteudo_equipe', 0);

/*conteúdo teste

// Função para adicionar automaticamente 6 posts ao tipo de conteúdo "equipe"
function adicionar_posts_equipe() {
    // Certifique-se de que a função só seja executada uma vez
    if (get_option('equipe_populado')) {
        return;
    }

    // Dados de exemplo para os membros da equipe
    $membros = [
        [
            'nome' => 'João Silva',
            'descricao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nec venenatis erat. Ut ac massa et quam volutpat cursus.',
            'imagem' => 'https://via.placeholder.com/600x400', // URL da imagem destacada
        ],
        [
            'nome' => 'Maria Oliveira',
            'descricao' => 'Curabitur a nibh in velit tincidunt pretium. Sed tincidunt fringilla libero, in gravida nisl viverra non.',
            'imagem' => 'https://via.placeholder.com/600x400',
        ],
        [
            'nome' => 'Pedro Santos',
            'descricao' => 'Fusce dapibus, turpis vel dapibus consectetur, turpis sem viverra lacus, id tincidunt elit nisi ac felis.',
            'imagem' => 'https://via.placeholder.com/600x400',
        ],
        [
            'nome' => 'Ana Costa',
            'descricao' => 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.',
            'imagem' => 'https://via.placeholder.com/600x400',
        ],
        [
            'nome' => 'Lucas Pereira',
            'descricao' => 'Donec eleifend erat ut arcu consectetur, a vehicula est bibendum. Mauris luctus orci id quam tincidunt eleifend.',
            'imagem' => 'https://via.placeholder.com/600x400',
        ],
        [
            'nome' => 'Carla Souza',
            'descricao' => 'Aenean dictum nulla nec nisl placerat gravida. Quisque sit amet arcu nec massa ultricies fermentum.',
            'imagem' => 'https://via.placeholder.com/600x400',
        ],
    ];

    // Loop para adicionar cada membro como um post
    foreach ($membros as $membro) {
        // Cria o post
        $post_id = wp_insert_post([
            'post_title'   => $membro['nome'], // Nome do membro
            'post_content' => $membro['descricao'], // Descrição (conteúdo)
            'post_status'  => 'publish', // Publicado automaticamente
            'post_type'    => 'equipe', // Tipo de conteúdo personalizado
        ]);

        // Se o post foi criado com sucesso, define a imagem destacada
        if ($post_id && !is_wp_error($post_id)) {
            // Baixa a imagem e define como destacada
            $imagem_id = importar_imagem_destacada($membro['imagem'], $post_id);

            if ($imagem_id) {
                set_post_thumbnail($post_id, $imagem_id);
            }
        }
    }

    // Salva uma opção para garantir que a função não seja executada novamente
    update_option('equipe_populado', true);
}

// Função para importar imagens destacadas
function importar_imagem_destacada($url, $post_id) {
    $upload_dir = wp_upload_dir();

    // Faz o download da imagem
    $image_data = file_get_contents($url);
    if (!$image_data) {
        return false;
    }

    // Define o caminho do arquivo
    $filename = basename($url);
    $file     = $upload_dir['path'] . '/' . $filename;

    // Salva a imagem no diretório de uploads
    file_put_contents($file, $image_data);

    // Prepara o arquivo para ser anexado ao post
    $wp_filetype = wp_check_filetype($filename, null);
    $attachment  = [
        'post_mime_type' => $wp_filetype['type'],
        'post_title'     => sanitize_file_name($filename),
        'post_content'   => '',
        'post_status'    => 'inherit',
    ];

    // Anexa o arquivo ao post
    $attachment_id = wp_insert_attachment($attachment, $file, $post_id);

    // Gera os metadados da imagem
    require_once(ABSPATH . 'wp-admin/includes/image.php');
    $attach_data = wp_generate_attachment_metadata($attachment_id, $file);
    wp_update_attachment_metadata($attachment_id, $attach_data);

    return $attachment_id;
}

// Hook para executar a função após inicializar o WordPress
add_action('init', 'adicionar_posts_equipe');

/*******************FIM  tipo de conteudo EQUIPE********************** */

/*******************tipo de conteudo PARCEIRO************************ */

// Função para registrar o tipo de conteúdo "parceiro"
function registrar_tipo_conteudo_parceiro() {
    $labels = array(
        'name'               => 'Parceiros',
        'singular_name'      => 'Parceiro',
        'menu_name'          => 'Parceiros',
        'name_admin_bar'     => 'Parceiro',
        'add_new'            => 'Adicionar Novo',
        'add_new_item'       => 'Adicionar Novo Parceiro',
        'new_item'           => 'Novo Parceiro',
        'edit_item'          => 'Editar Parceiro',
        'view_item'          => 'Visualizar Parceiro',
        'all_items'          => 'Todos os Parceiros',
        'search_items'       => 'Pesquisar Parceiros',
        'not_found'          => 'Nenhum Parceiro encontrado.',
        'not_found_in_trash' => 'Nenhum Parceiro encontrado na lixeira.'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'parceiro'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 3,
        'menu_icon'          => 'dashicons-admin-links', // Ícone do menu
        'supports'           => array('title', 'thumbnail'), // Suporte a título e imagem destacada
    );

    register_post_type('parceiro', $args);
}
add_action('init', 'registrar_tipo_conteudo_parceiro');

// Adicionar o metabox para o campo "Link"
function adicionar_metabox_parceiro() {
    add_meta_box(
        'parceiro_link', // ID único
        'Link do Parceiro', // Título do Metabox
        'renderizar_metabox_parceiro', // Função de callback
        'parceiro', // Tipo de conteúdo
        'normal', // Contexto
        'default' // Prioridade
    );
}
add_action('add_meta_boxes', 'adicionar_metabox_parceiro');

// Renderizar o Metabox
function renderizar_metabox_parceiro($post) {
    // Garante a segurança com nonce
    wp_nonce_field('salvar_metabox_parceiro', 'parceiro_link_nonce');

    // Obtém o valor salvo, se existir
    $link = get_post_meta($post->ID, '_parceiro_link', true);

    echo '<label for="parceiro_link">Insira o link do parceiro:</label>';
    echo '<input type="url" id="parceiro_link" name="parceiro_link" value="' . esc_attr($link) . '" style="width:100%; margin-top:10px;" placeholder="https://exemplo.com">';
}

// Salvar o valor do campo personalizado
function salvar_metabox_parceiro($post_id) {
    // Verifica o nonce para garantir a segurança
    if (!isset($_POST['parceiro_link_nonce']) || !wp_verify_nonce($_POST['parceiro_link_nonce'], 'salvar_metabox_parceiro')) {
        return;
    }

    // Verifica se o campo foi enviado e salva o valor
    if (isset($_POST['parceiro_link'])) {
        update_post_meta($post_id, '_parceiro_link', esc_url_raw($_POST['parceiro_link']));
    }
}
add_action('save_post', 'salvar_metabox_parceiro');

/*******************FIM tipo de conteudo PARCEIRO************************ */

/*******************tipo de conteudo CURSO************************ */

// Função para registrar o tipo de conteúdo "Cursos"
function registrar_tipo_conteudo_cursos() {
    $labels = array(
        'name'               => 'Cursos',
        'singular_name'      => 'Curso',
        'menu_name'          => 'Cursos',
        'name_admin_bar'     => 'Curso',
        'add_new'            => 'Adicionar Novo',
        'add_new_item'       => 'Adicionar Novo Curso',
        'new_item'           => 'Novo Curso',
        'edit_item'          => 'Editar Curso',
        'view_item'          => 'Visualizar Curso',
        'all_items'          => 'Todos os Cursos',
        'search_items'       => 'Pesquisar Cursos',
        'not_found'          => 'Nenhum Curso encontrado.',
        'not_found_in_trash' => 'Nenhum Curso encontrado na lixeira.',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'curso'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-welcome-learn-more', // Ícone para o menu
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'), // Suporte a título, descrição, imagem destacada e resumo
    );

    register_post_type('curso', $args);
}
add_action('init', 'registrar_tipo_conteudo_cursos');

// Adicionar metaboxes para os campos personalizados
function adicionar_metabox_cursos() {
    add_meta_box(
        'curso_informacoes', // ID único do metabox
        'Informações do Curso', // Título do metabox
        'renderizar_metabox_cursos', // Função de callback para exibir os campos
        'curso', // Tipo de conteúdo
        'normal', // Localização na tela de edição
        'default' // Prioridade
    );
}
add_action('add_meta_boxes', 'adicionar_metabox_cursos');

// Renderizar o metabox
function renderizar_metabox_cursos($post) {
    // Garante a segurança com um nonce
    wp_nonce_field('salvar_metabox_cursos', 'curso_informacoes_nonce');

    // Recupera os valores salvos (se houver)
    $duracao = get_post_meta($post->ID, '_curso_duracao', true);
    $publico = get_post_meta($post->ID, '_curso_publico', true);
    $nivel = get_post_meta($post->ID, '_curso_nivel', true);

    // Campos do formulário
    echo '<label for="curso_duracao">Duração:</label>';
    echo '<input type="text" id="curso_duracao" name="curso_duracao" value="' . esc_attr($duracao) . '" style="width:100%; margin-bottom:10px;" placeholder="Ex: 40 horas">';

    echo '<label for="curso_publico">Público:</label>';
    echo '<input type="text" id="curso_publico" name="curso_publico" value="' . esc_attr($publico) . '" style="width:100%; margin-bottom:10px;" placeholder="Ex: Estudantes, Profissionais">';

    echo '<label for="curso_nivel">Nível:</label>';
    echo '<input type="text" id="curso_nivel" name="curso_nivel" value="' . esc_attr($nivel) . '" style="width:100%; margin-bottom:10px;" placeholder="Ex: Iniciante, Intermediário, Avançado">';
}

// Salvar os campos personalizados
function salvar_metabox_cursos($post_id) {
    // Verifica o nonce para garantir a segurança
    if (!isset($_POST['curso_informacoes_nonce']) || !wp_verify_nonce($_POST['curso_informacoes_nonce'], 'salvar_metabox_cursos')) {
        return;
    }

    // Salva os valores dos campos personalizados
    if (isset($_POST['curso_duracao'])) {
        update_post_meta($post_id, '_curso_duracao', sanitize_text_field($_POST['curso_duracao']));
    }

    if (isset($_POST['curso_publico'])) {
        update_post_meta($post_id, '_curso_publico', sanitize_text_field($_POST['curso_publico']));
    }

    if (isset($_POST['curso_nivel'])) {
        update_post_meta($post_id, '_curso_nivel', sanitize_text_field($_POST['curso_nivel']));
    }
}
add_action('save_post', 'salvar_metabox_cursos');

/*Conteúdo:
function criar_cursos_automaticamente() {
    // Verifica se o tipo de conteúdo "curso" existe
    if (!post_type_exists('curso')) {
        echo 'O tipo de conteúdo "curso" não está registrado.';
        return;
    }

    // Array com dados fictícios
    $titulos = [
        'Curso de Programação para Iniciantes',
        'Design Gráfico com Photoshop',
        'Marketing Digital Avançado',
        'Curso de Fotografia Profissional',
        'Criação de Sites com WordPress',
        'Excel para Negócios',
        'Curso de Edição de Vídeo com Premiere',
        'Ilustração Digital com Procreate',
        'Introdução ao Desenvolvimento Mobile',
        'Curso de Data Science com Python',
        'Curso de Inglês Básico para Viagens',
        'Curso de Liderança e Gestão de Equipes',
        'Criação de Jogos com Unity',
        'Produção de Música Eletrônica',
        'Curso de Animação 2D para Iniciantes',
        'Técnicas de SEO para Blogs',
        'Curso de Modelagem 3D com Blender',
        'Curso de Redes de Computadores',
        'Aprenda a Programar em JavaScript',
        'Curso de Empreendedorismo e Inovação'
    ];

    $duracoes = [
        '10 horas', '20 horas', '15 horas', '8 horas', '25 horas',
        '30 horas', '12 horas', '18 horas', '40 horas', '50 horas',
        '5 horas', '16 horas', '22 horas', '14 horas', '9 horas',
        '7 horas', '6 horas', '11 horas', '35 horas', '24 horas'
    ];

    $publicos = [
        'Estudantes', 'Profissionais', 'Iniciantes', 'Avançados', 'Todos os níveis'
    ];

    $niveis = ['Básico', 'Intermediário', 'Avançado'];

    $descricoes = [
        'Este curso é ideal para quem está começando e deseja aprender o básico.',
        'Aprenda as melhores práticas do mercado com este curso completo.',
        'Este curso oferece uma abordagem prática para aplicar o conhecimento adquirido.',
        'Perfeito para quem busca se especializar em um novo tema.',
        'Desenvolva suas habilidades com este curso detalhado e passo a passo.'
    ];

    $resumos = [
        'Curso completo e dinâmico para você.', 
        'Aprenda tudo o que precisa para ser um especialista.',
        'Aproveite este curso com conteúdo exclusivo.',
        'Um curso rápido e direto ao ponto.',
        'Torne-se um profissional com este curso.'
    ];

    // Caminho para imagens de exemplo (alterar conforme necessidade)
    $imagens = [
        'https://via.placeholder.com/300x200.png?text=Curso+1',
        'https://via.placeholder.com/300x200.png?text=Curso+2',
        'https://via.placeholder.com/300x200.png?text=Curso+3',
        'https://via.placeholder.com/300x200.png?text=Curso+4',
        'https://via.placeholder.com/300x200.png?text=Curso+5'
    ];

    // Loop para criar os cursos
    for ($i = 0; $i < 20; $i++) {
        $titulo = $titulos[$i % count($titulos)];
        $duracao = $duracoes[$i % count($duracoes)];
        $publico = $publicos[array_rand($publicos)];
        $nivel = $niveis[array_rand($niveis)];
        $descricao = $descricoes[array_rand($descricoes)];
        $resumo = $resumos[array_rand($resumos)];
        $imagem_url = $imagens[array_rand($imagens)];

        // Criar o post
        $post_id = wp_insert_post(array(
            'post_title'   => $titulo,
            'post_content' => $descricao,
            'post_excerpt' => $resumo,
            'post_type'    => 'curso',
            'post_status'  => 'publish',
        ));

        // Verifica se o post foi criado com sucesso
        if ($post_id) {
            // Adiciona os campos personalizados
            update_post_meta($post_id, '_curso_duracao', $duracao);
            update_post_meta($post_id, '_curso_publico', $publico);
            update_post_meta($post_id, '_curso_nivel', $nivel);

            // Adiciona a imagem destacada
            $image_id = gerar_imagem_destacada($imagem_url, $post_id);
            if ($image_id) {
                set_post_thumbnail($post_id, $image_id);
            }

            echo "Curso criado: $titulo (ID: $post_id)<br>";
        } else {
            echo "Erro ao criar o curso: $titulo<br>";
        }
    }
}

// Função para fazer download e atribuir imagem destacada
function gerar_imagem_destacada($image_url, $post_id) {
    $upload_dir = wp_upload_dir();
    $image_data = file_get_contents($image_url);
    $filename = basename($image_url);

    if (wp_mkdir_p($upload_dir['path'])) {
        $file = $upload_dir['path'] . '/' . $filename;
    } else {
        $file = $upload_dir['basedir'] . '/' . $filename;
    }

    file_put_contents($file, $image_data);

    $wp_filetype = wp_check_filetype($filename, null);
    $attachment = array(
        'post_mime_type' => $wp_filetype['type'],
        'post_title'     => sanitize_file_name($filename),
        'post_content'   => '',
        'post_status'    => 'inherit'
    );

    $attach_id = wp_insert_attachment($attachment, $file, $post_id);
    require_once(ABSPATH . 'wp-admin/includes/image.php');
    $attach_data = wp_generate_attachment_metadata($attach_id, $file);
    wp_update_attachment_metadata($attach_id, $attach_data);

    return $attach_id;
}

// Executa a função uma única vez
//criar_cursos_automaticamente();
add_action('init', 'criar_cursos_automaticamente');

/*******************FIM tipo de conteudo CURSO************************ */

/*******************tipo de conteudo DEPOIMENTO************************ */

// Registrar o tipo de conteúdo "Depoimento"
function registrar_tipo_conteudo_depoimento() {
    $labels = array(
        'name'               => 'Depoimentos',
        'singular_name'      => 'Depoimento',
        'menu_name'          => 'Depoimentos',
        'name_admin_bar'     => 'Depoimento',
        'add_new'            => 'Adicionar Novo',
        'add_new_item'       => 'Adicionar Novo Depoimento',
        'new_item'           => 'Novo Depoimento',
        'edit_item'          => 'Editar Depoimento',
        'view_item'          => 'Ver Depoimento',
        'all_items'          => 'Todos os Depoimentos',
        'search_items'       => 'Buscar Depoimentos',
        'not_found'          => 'Nenhum depoimento encontrado.',
        'not_found_in_trash' => 'Nenhum depoimento encontrado na lixeira.',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'depoimentos'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-testimonial', // Ícone do menu
        'supports'           => array('title', 'editor', 'excerpt', 'thumbnail'), // Título, descrição, resumo, imagem destacada
    );

    register_post_type('depoimento', $args);
}
add_action('init', 'registrar_tipo_conteudo_depoimento');

// Adicionar o campo personalizado "Link para vídeo"
function adicionar_campos_personalizados_depoimento() {
    add_meta_box(
        'link_video_meta_box',
        'Link para Vídeo',
        'renderizar_campo_link_video',
        'depoimento',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'adicionar_campos_personalizados_depoimento');

// Renderizar o campo personalizado no painel administrativo
function renderizar_campo_link_video($post) {
    // Recuperar o valor salvo
    $link_video = get_post_meta($post->ID, '_link_video', true);

    // Campo HTML
    echo '<label for="link_video">Insira o link para o vídeo (YouTube, Vimeo, etc.):</label>';
    echo '<input type="url" id="link_video" name="link_video" value="' . esc_attr($link_video) . '" style="width: 100%; margin-top: 10px;" placeholder="https://www.youtube.com/watch?v=xxxxxx">';
}

// Salvar o valor do campo personalizado
function salvar_campo_link_video($post_id) {
    // Verifica se o campo foi enviado
    if (isset($_POST['link_video'])) {
        // Sanitiza e salva o valor do campo
        $link_video = sanitize_text_field($_POST['link_video']);
        update_post_meta($post_id, '_link_video', $link_video);
    }
}
add_action('save_post', 'salvar_campo_link_video');

/*CONTEÚDO:

// Script para criar 9 depoimentos
function criar_depoimentos_automaticos() {
    // Certifique-se de que o tipo de conteúdo "depoimento" está registrado
    if (!post_type_exists('depoimento')) {
        return;
    }

    // Dados para os depoimentos
    $depoimentos = [
        [
            'titulo' => 'Depoimento de João Silva',
            'resumo' => 'Uma experiência transformadora.',
            'descricao' => 'Minha experiência foi incrível! A equipe é altamente profissional e atenciosa. Recomendo a todos!',
            'imagem' => 'https://via.placeholder.com/600x400.png?text=Joao+Silva',
            'link_video' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
        ],
        [
            'titulo' => 'Depoimento de Maria Oliveira',
            'resumo' => 'Serviço excepcional.',
            'descricao' => 'Nunca tive uma experiência tão boa antes. O atendimento foi impecável do início ao fim!',
            'imagem' => 'https://via.placeholder.com/600x400.png?text=Maria+Oliveira',
            'link_video' => 'https://www.youtube.com/watch?v=9bZkp7q19f0',
        ],
        [
            'titulo' => 'Depoimento de Carlos Santos',
            'resumo' => 'Altamente recomendável!',
            'descricao' => 'Atendimento rápido, eficiente e muito profissional. Certamente voltarei!',
            'imagem' => 'https://via.placeholder.com/600x400.png?text=Carlos+Santos',
            'link_video' => 'https://www.youtube.com/watch?v=3JZ_D3ELwOQ',
        ],
        [
            'titulo' => 'Depoimento de Ana Souza',
            'resumo' => 'Melhor escolha que fiz!',
            'descricao' => 'Escolher essa equipe foi a melhor decisão que já tomei. Obrigado por tudo!',
            'imagem' => 'https://via.placeholder.com/600x400.png?text=Ana+Souza',
            'link_video' => 'https://www.youtube.com/watch?v=tgbNymZ7vqY',
        ],
        [
            'titulo' => 'Depoimento de Pedro Lima',
            'resumo' => 'Serviço incrível!',
            'descricao' => 'Fiquei impressionado com a qualidade do serviço. Superou todas as minhas expectativas!',
            'imagem' => 'https://via.placeholder.com/600x400.png?text=Pedro+Lima',
            'link_video' => 'https://www.youtube.com/watch?v=CevxZvSJLk8',
        ],
        [
            'titulo' => 'Depoimento de Júlia Martins',
            'resumo' => 'Equipe nota 10!',
            'descricao' => 'Uma equipe incrível que me atendeu de forma rápida e eficiente. Muito obrigado!',
            'imagem' => 'https://via.placeholder.com/600x400.png?text=Julia+Martins',
            'link_video' => 'https://www.youtube.com/watch?v=2Vv-BfVoq4g',
        ],
        [
            'titulo' => 'Depoimento de Rafael Costa',
            'resumo' => 'Serviço de alta qualidade.',
            'descricao' => 'Eu recomendo esta equipe para todos que procuram um serviço de alta qualidade!',
            'imagem' => 'https://via.placeholder.com/600x400.png?text=Rafael+Costa',
            'link_video' => 'https://www.youtube.com/watch?v=JGwWNGJdvx8',
        ],
        [
            'titulo' => 'Depoimento de Fernanda Almeida',
            'resumo' => 'Totalmente satisfeita!',
            'descricao' => 'Minha experiência foi maravilhosa. Fiquei completamente satisfeita com o resultado!',
            'imagem' => 'https://via.placeholder.com/600x400.png?text=Fernanda+Almeida',
            'link_video' => 'https://www.youtube.com/watch?v=kJQP7kiw5Fk',
        ],
        [
            'titulo' => 'Depoimento de Lucas Ferreira',
            'resumo' => 'Atendimento incrível!',
            'descricao' => 'Desde o início fui muito bem atendido. O resultado final ficou excelente!',
            'imagem' => 'https://via.placeholder.com/600x400.png?text=Lucas+Ferreira',
            'link_video' => 'https://www.youtube.com/watch?v=RgKAFK5djSk',
        ],
    ];

    foreach ($depoimentos as $depoimento) {
        // Verificar se o depoimento já existe pelo título
        if (!get_page_by_title($depoimento['titulo'], OBJECT, 'depoimento')) {
            // Criar o depoimento
            $post_id = wp_insert_post([
                'post_title'   => $depoimento['titulo'],
                'post_excerpt' => $depoimento['resumo'], // Resumo
                'post_content' => $depoimento['descricao'], // Descrição
                'post_status'  => 'publish',
                'post_type'    => 'depoimento',
            ]);

            if ($post_id) {
                // Adicionar imagem em destaque
                $imagem_url = $depoimento['imagem'];
                $imagem_id = inserir_imagem_destacada($imagem_url, $post_id);

                // Adicionar o link para vídeo (meta personalizado)
                update_post_meta($post_id, '_link_video', $depoimento['link_video']);
            }
        }
    }
}
add_action('init', 'criar_depoimentos_automaticos');

// Função para baixar e definir imagem destacada
function inserir_imagem_destacada($imagem_url, $post_id) {
    $upload_dir = wp_upload_dir();
    $imagem_data = file_get_contents($imagem_url);
    $imagem_nome = basename($imagem_url);
    $imagem_caminho = wp_mkdir_p($upload_dir['path']) ? $upload_dir['path'] . '/' . $imagem_nome : $upload_dir['basedir'] . '/' . $imagem_nome;

    file_put_contents($imagem_caminho, $imagem_data);

    $arquivo_tipo = wp_check_filetype($imagem_nome, null);
    $anexo_id = wp_insert_attachment([
        'post_mime_type' => $arquivo_tipo['type'],
        'post_title'     => sanitize_file_name($imagem_nome),
        'post_content'   => '',
        'post_status'    => 'inherit',
    ], $imagem_caminho, $post_id);

    require_once(ABSPATH . 'wp-admin/includes/image.php');
    $anexo_meta = wp_generate_attachment_metadata($anexo_id, $imagem_caminho);
    wp_update_attachment_metadata($anexo_id, $anexo_meta);
    set_post_thumbnail($post_id, $anexo_id);

    return $anexo_id;
}

/*******************FIM tipo de conteudo DEPOIMENTO************************ */

/*******************tipo de conteudo EVENTO************************ */
// Função para registrar o Tipo de Conteúdo "Evento"
function registrar_tipo_conteudo_evento() {
    $labels = array(
        'name'               => 'Eventos',
        'singular_name'      => 'Evento',
        'menu_name'          => 'Eventos',
        'name_admin_bar'     => 'Evento',
        'add_new'            => 'Adicionar Novo',
        'add_new_item'       => 'Adicionar Novo Evento',
        'new_item'           => 'Novo Evento',
        'edit_item'          => 'Editar Evento',
        'view_item'          => 'Ver Evento',
        'all_items'          => 'Todos os Eventos',
        'search_items'       => 'Buscar Eventos',
        'not_found'          => 'Nenhum evento encontrado.',
        'not_found_in_trash' => 'Nenhum evento encontrado na lixeira.',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'eventos'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-calendar', // Ícone do menu
        'supports'           => array('title', 'editor', 'excerpt', 'thumbnail'), // Título, descrição, resumo, imagem destacada
    );

    register_post_type('evento', $args);
}
add_action('init', 'registrar_tipo_conteudo_evento');

// Função para adicionar os campos personalizados ao tipo de conteúdo "Evento"
function adicionar_campos_personalizados_evento() {
    // Adicionar Metaboxes para os campos personalizados
    add_meta_box(
        'campo_cidade_meta_box',
        'Informações do Evento',
        'renderizar_campos',
        'evento',
        'normal',
        'high'
    );
    

    

}
add_action('add_meta_boxes', 'adicionar_campos_personalizados_evento');

// Função para renderizar o campo "Cidade"
function renderizar_campos($post) {
    $cidade = get_post_meta($post->ID, '_cidade', true);
    echo '<label for="cidade">Cidade:</label>';
    echo '<input type="text" id="cidade" name="cidade" value="' . esc_attr($cidade) . '" style="width: 100%;" placeholder="Cidade">';

    $estado = get_post_meta($post->ID, '_estado', true);
    echo '<label for="estado">Estado:</label>';
    echo '<input type="text" id="estado" name="estado" value="' . esc_attr($estado) . '" style="width: 100%;" placeholder="Estado">';

    $data = get_post_meta($post->ID, '_data', true);
    echo '<label for="data">Data:</label>';
    echo '<input type="date" id="data" name="data" value="' . esc_attr($data) . '" style="width: 100%;">';

    $publico = get_post_meta($post->ID, '_publico', true);
    echo '<label for="publico">Público:</label>';
    echo '<input type="text" id="publico" name="publico" value="' . esc_attr($publico) . '" style="width: 100%;" placeholder="Público alvo">';

    $tipo = get_post_meta($post->ID, '_tipo', true);
    echo '<label for="tipo">Tipo:</label>';
    echo '<input type="text" id="tipo" name="tipo" value="' . esc_attr($tipo) . '" style="width: 100%;" placeholder="Tipo de evento">';
}




// Função para salvar os campos personalizados
function salvar_campos_personalizados_evento($post_id) {
    // Verificar se o campo foi enviado e salvar
    if (isset($_POST['cidade'])) {
        update_post_meta($post_id, '_cidade', sanitize_text_field($_POST['cidade']));
    }

    if (isset($_POST['estado'])) {
        update_post_meta($post_id, '_estado', sanitize_text_field($_POST['estado']));
    }

    if (isset($_POST['data'])) {
        update_post_meta($post_id, '_data', sanitize_text_field($_POST['data']));
    }

    if (isset($_POST['publico'])) {
        update_post_meta($post_id, '_publico', sanitize_text_field($_POST['publico']));
    }

    if (isset($_POST['tipo'])) {
        update_post_meta($post_id, '_tipo', sanitize_text_field($_POST['tipo']));
    }


}
add_action('save_post', 'salvar_campos_personalizados_evento');

/*Conteudo:

function adicionar_eventos_de_teste() {
    // Definir os dados dos eventos de teste
    $eventos = array(
        array(
            'titulo'     => 'Evento de Teste 1',
            'cidade'     => 'São Paulo',
            'estado'     => 'SP',
            'data'       => '2024-03-15',
            'publico'    => 'Todos',
            'tipo'       => 'Palestra',
            'descricao'  => 'Descrição do Evento 1. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'resumo'     => 'Resumo do Evento 1.',
        ),
        array(
            'titulo'     => 'Evento de Teste 2',
            'cidade'     => 'Rio de Janeiro',
            'estado'     => 'RJ',
            'data'       => '2024-03-18',
            'publico'    => 'Estudantes',
            'tipo'       => 'Workshop',
            'descricao'  => 'Descrição do Evento 2. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'resumo'     => 'Resumo do Evento 2.',
        ),
        array(
            'titulo'     => 'Evento de Teste 3',
            'cidade'     => 'Belo Horizonte',
            'estado'     => 'MG',
            'data'       => '2024-03-20',
            'publico'    => 'Profissionais',
            'tipo'       => 'Seminário',
            'descricao'  => 'Descrição do Evento 3. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'resumo'     => 'Resumo do Evento 3.',
        ),
        array(
            'titulo'     => 'Evento de Teste 4',
            'cidade'     => 'Porto Alegre',
            'estado'     => 'RS',
            'data'       => '2024-03-25',
            'publico'    => 'Empreendedores',
            'tipo'       => 'Conferência',
            'descricao'  => 'Descrição do Evento 4. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'resumo'     => 'Resumo do Evento 4.',
        ),
        array(
            'titulo'     => 'Evento de Teste 5',
            'cidade'     => 'Curitiba',
            'estado'     => 'PR',
            'data'       => '2024-03-30',
            'publico'    => 'Acadêmicos',
            'tipo'       => 'Fórum',
            'descricao'  => 'Descrição do Evento 5. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'resumo'     => 'Resumo do Evento 5.',
        ),
        array(
            'titulo'     => 'Evento de Teste 6',
            'cidade'     => 'Recife',
            'estado'     => 'PE',
            'data'       => '2024-04-05',
            'publico'    => 'Executivos',
            'tipo'       => 'Mesa Redonda',
            'descricao'  => 'Descrição do Evento 6. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'resumo'     => 'Resumo do Evento 6.',
        ),
        array(
            'titulo'     => 'Evento de Teste 7',
            'cidade'     => 'Fortaleza',
            'estado'     => 'CE',
            'data'       => '2024-04-10',
            'publico'    => 'Líderes',
            'tipo'       => 'Encontro',
            'descricao'  => 'Descrição do Evento 7. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'resumo'     => 'Resumo do Evento 7.',
        ),
        array(
            'titulo'     => 'Evento de Teste 8',
            'cidade'     => 'Salvador',
            'estado'     => 'BA',
            'data'       => '2024-04-12',
            'publico'    => 'Profissionais de TI',
            'tipo'       => 'Hackathon',
            'descricao'  => 'Descrição do Evento 8. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'resumo'     => 'Resumo do Evento 8.',
        ),
        array(
            'titulo'     => 'Evento de Teste 9',
            'cidade'     => 'Manaus',
            'estado'     => 'AM',
            'data'       => '2024-04-15',
            'publico'    => 'Estudantes de Tecnologia',
            'tipo'       => 'Curso',
            'descricao'  => 'Descrição do Evento 9. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'resumo'     => 'Resumo do Evento 9.',
        ),
        array(
            'titulo'     => 'Evento de Teste 10',
            'cidade'     => 'Natal',
            'estado'     => 'RN',
            'data'       => '2024-04-20',
            'publico'    => 'Jovens Empreendedores',
            'tipo'       => 'Feira',
            'descricao'  => 'Descrição do Evento 10. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'resumo'     => 'Resumo do Evento 10.',
        ),
    );

    // Loop para adicionar os eventos
    foreach ($eventos as $evento) {
        // Inserir o evento
        $evento_post = array(
            'post_title'   => $evento['titulo'],
            'post_content' => $evento['descricao'],
            'post_excerpt' => $evento['resumo'],
            'post_status'  => 'publish',
            'post_type'    => 'evento', // Nome do tipo de conteúdo
        );

        // Inserir o post e obter o ID do post criado
        $post_id = wp_insert_post($evento_post);

        // Adicionar os campos personalizados
        if ($post_id) {
            update_post_meta($post_id, '_cidade', $evento['cidade']);
            update_post_meta($post_id, '_estado', $evento['estado']);
            update_post_meta($post_id, '_data', $evento['data']);
            update_post_meta($post_id, '_publico', $evento['publico']);
            update_post_meta($post_id, '_tipo', $evento['tipo']);
        }
    }
}

// Executar a função para adicionar os eventos de teste (verifique se você executa isso uma vez, por exemplo, ao ativar o tema ou plugin)
adicionar_eventos_de_teste();

/*******************FIM tipo de conteudo EVENTO************************ */

/*******************tipo de conteudo FAQ************************ */

// Função para registrar o tipo de conteúdo FAQ
function registrar_tipo_conteudo_faq() {
    $labels = array(
        'name'               => 'FAQs',
        'singular_name'      => 'FAQ',
        'menu_name'          => 'FAQs',
        'name_admin_bar'     => 'FAQ',
        'add_new'            => 'Adicionar Novo',
        'add_new_item'       => 'Adicionar Nova FAQ',
        'new_item'           => 'Nova FAQ',
        'edit_item'          => 'Editar FAQ',
        'view_item'          => 'Ver FAQ',
        'all_items'          => 'Todas as FAQs',
        'search_items'       => 'Buscar FAQs',
        'not_found'          => 'Nenhuma FAQ encontrada.',
        'not_found_in_trash' => 'Nenhuma FAQ encontrada na lixeira.',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'faq'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-editor-help', // Ícone do menu
        'supports'           => array('title'), // Título e descrição
    );

    // Registrar o tipo de post FAQ
    register_post_type('faq', $args);
}
add_action('init', 'registrar_tipo_conteudo_faq');

// Função para adicionar o campo personalizado "Resposta"
function adicionar_campos_personalizados_faq() {
    add_meta_box(
        'resposta_meta_box',
        'Resposta',
        'renderizar_campo_resposta',
        'faq',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'adicionar_campos_personalizados_faq');

// Função para renderizar o campo personalizado de resposta
function renderizar_campo_resposta($post) {
    // Recupera o valor da resposta salva
    $resposta = get_post_meta($post->ID, '_resposta', true);

    // Exibe o campo HTML
    echo '<label for="resposta">Resposta:</label>';
    echo '<textarea id="resposta" name="resposta" rows="5" style="width: 100%;">' . esc_textarea($resposta) . '</textarea>';
}

// Função para salvar o valor do campo "Resposta"
function salvar_campo_resposta($post_id) {
    // Verifica se o campo 'resposta' foi enviado
    if (isset($_POST['resposta'])) {
        // Sanitiza e salva o valor do campo
        $resposta = sanitize_textarea_field($_POST['resposta']);
        update_post_meta($post_id, '_resposta', $resposta);
    }
}
add_action('save_post', 'salvar_campo_resposta');

/*Conteudo:

function adicionar_faqs_de_teste() {
    // Verificar se o tipo de post "faq" está registrado
    if ( post_type_exists( 'faq' ) ) {
        // Dados de exemplo para 20 FAQs
        $faqs = array(
            array(
                'titulo' => 'O que é o WordPress?',
                'resposta' => 'O WordPress é uma plataforma de criação de sites e blogs, amplamente usada em todo o mundo.'
            ),
            array(
                'titulo' => 'Como instalar o WordPress?',
                'resposta' => 'Você pode instalar o WordPress manualmente ou através de um instalador automático fornecido pela sua hospedagem.'
            ),
            array(
                'titulo' => 'Qual é a diferença entre posts e páginas?',
                'resposta' => 'Posts são usados para conteúdo dinâmico, como blogs, enquanto páginas são estáticas, como "Sobre nós".'
            ),
            array(
                'titulo' => 'Como adicionar um tema no WordPress?',
                'resposta' => 'Você pode adicionar temas acessando "Aparência > Temas" e clicando em "Adicionar Novo".'
            ),
            array(
                'titulo' => 'Como instalar plugins no WordPress?',
                'resposta' => 'Acesse "Plugins > Adicionar Novo" e procure pelo plugin desejado para instalá-lo.'
            ),
            array(
                'titulo' => 'O que são widgets no WordPress?',
                'resposta' => 'Widgets são blocos de conteúdo que você pode adicionar nas barras laterais ou rodapés do seu site.'
            ),
            array(
                'titulo' => 'Como atualizar o WordPress?',
                'resposta' => 'Você pode atualizar o WordPress acessando o painel de administração e clicando em "Atualizações".'
            ),
            array(
                'titulo' => 'Posso usar o WordPress sem conhecimentos de programação?',
                'resposta' => 'Sim, o WordPress é projetado para ser fácil de usar, mesmo sem conhecimento técnico.'
            ),
            array(
                'titulo' => 'Como adicionar um novo usuário no WordPress?',
                'resposta' => 'Você pode adicionar novos usuários em "Usuários > Adicionar Novo".'
            ),
            array(
                'titulo' => 'O que são taxonomias no WordPress?',
                'resposta' => 'Taxonomias são maneiras de agrupar posts, como categorias e tags.'
            ),
            array(
                'titulo' => 'Como otimizar meu site WordPress para SEO?',
                'resposta' => 'Você pode usar plugins de SEO, como o Yoast SEO, para otimizar seu conteúdo.'
            ),
            array(
                'titulo' => 'Como adicionar imagens ao meu site WordPress?',
                'resposta' => 'Você pode adicionar imagens ao seu conteúdo clicando no botão "Adicionar Mídia".'
            ),
            array(
                'titulo' => 'O que são permalinks?',
                'resposta' => 'Permalinks são os links permanentes para as páginas ou posts do seu site.'
            ),
            array(
                'titulo' => 'Como configurar os menus no WordPress?',
                'resposta' => 'Você pode configurar menus em "Aparência > Menus".'
            ),
            array(
                'titulo' => 'Como fazer backup do meu site WordPress?',
                'resposta' => 'Você pode usar plugins de backup, como UpdraftPlus, para fazer backups regulares.'
            ),
            array(
                'titulo' => 'Posso usar o WordPress para criar uma loja online?',
                'resposta' => 'Sim, com o plugin WooCommerce, você pode transformar seu site WordPress em uma loja online.'
            ),
            array(
                'titulo' => 'Como personalizar o tema do meu site?',
                'resposta' => 'Você pode personalizar seu tema em "Aparência > Personalizar".'
            ),
            array(
                'titulo' => 'O que é um post em destaque no WordPress?',
                'resposta' => 'É um post que você pode destacar na sua página inicial ou em outras seções do seu site.'
            ),
            array(
                'titulo' => 'Como gerenciar comentários no WordPress?',
                'resposta' => 'Você pode gerenciar os comentários em "Comentários" no painel de administração.'
            ),
            array(
                'titulo' => 'O que é o painel de administração do WordPress?',
                'resposta' => 'É o local onde você gerencia todo o conteúdo e configuração do seu site.'
            ),
        );

        // Loop para criar 20 FAQs de teste
        foreach ( $faqs as $faq ) {
            // Criação do post de FAQ
            $post_data = array(
                'post_title'   => $faq['titulo'],
                'post_content' => $faq['resposta'],
                'post_status'  => 'publish', // Publicado imediatamente
                'post_type'    => 'faq', // Tipo de post personalizado
                'post_author'  => 1, // ID do autor (geralmente o administrador)
            );

            // Inserir o post no banco de dados
            $post_id = wp_insert_post( $post_data );

            // Verificar se o post foi inserido com sucesso
            if ( !is_wp_error( $post_id ) ) {
                // Inserir a resposta no campo personalizado 'resposta'
                update_post_meta( $post_id, '_resposta', $faq['resposta'] );
            }
        }
    }
}
add_action('init', 'adicionar_faqs_de_teste');

/*******************FIM tipo de conteudo FAQ************************ */

/*******************tipo de conteudo GALERIA DE FOTOS************************ */

// Função para registrar o tipo de conteúdo "Galeria de Fotos"
function registrar_tipo_conteudo_galeria_fotos() {
    $labels = array(
        'name'               => 'Galerias de Fotos',
        'singular_name'      => 'Galeria de Fotos',
        'menu_name'          => 'Galerias de Fotos',
        'name_admin_bar'     => 'Galeria de Fotos',
        'add_new'            => 'Adicionar Nova',
        'add_new_item'       => 'Adicionar Nova Galeria de Fotos',
        'new_item'           => 'Nova Galeria de Fotos',
        'edit_item'          => 'Editar Galeria de Fotos',
        'view_item'          => 'Ver Galeria de Fotos',
        'all_items'          => 'Todas as Galerias de Fotos',
        'search_items'       => 'Buscar Galerias de Fotos',
        'not_found'          => 'Nenhuma galeria de fotos encontrada.',
        'not_found_in_trash' => 'Nenhuma galeria de fotos encontrada na lixeira.',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'galerias-de-fotos'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-format-gallery', // Ícone do menu
        'supports'           => array('title', 'thumbnail'), // Título, descrição, imagem destacada
    );

    register_post_type('galeria_fotos', $args);
}
add_action('init', 'registrar_tipo_conteudo_galeria_fotos');

/*Conteudo:
function criar_galerias_de_fotos_automaticamente() {
    // Garante que a função seja executada apenas uma vez
    if (get_option('galerias_de_fotos_criadas')) {
        return;
    }

    // URLs de imagens de exemplo (substitua pelos URLs das suas imagens reais)
    $imagens_exemplo = array(
        'https://via.placeholder.com/800x600.png?text=Imagem+1',
        'https://via.placeholder.com/800x600.png?text=Imagem+2',
        'https://via.placeholder.com/800x600.png?text=Imagem+3',
        'https://via.placeholder.com/800x600.png?text=Imagem+4',
        'https://via.placeholder.com/800x600.png?text=Imagem+5',
    );

    // Loop para criar 25 galerias
    for ($i = 1; $i <= 25; $i++) {
        // Define o título da galeria
        $titulo = 'Galeria de Fotos ' . $i;

        // Cria o post do tipo "galeria_fotos"
        $post_id = wp_insert_post(array(
            'post_title'   => $titulo,
            'post_content' => '',
            'post_status'  => 'publish',
            'post_type'    => 'galeria_fotos',
        ));

        if ($post_id) {
            // Adiciona uma imagem destacada ao post (usando a primeira imagem do exemplo)
            $image_url = $imagens_exemplo[array_rand($imagens_exemplo)];
            $image_id = importar_imagem_para_midia($image_url, $post_id);
            if ($image_id) {
                set_post_thumbnail($post_id, $image_id);
            }

            // Adiciona algumas imagens extras no conteúdo da galeria
            $galeria = array();
            foreach ($imagens_exemplo as $url) {
                $galeria[] = array(
                    'url' => esc_url($url),
                    'descricao' => 'Descrição para a imagem ' . $url,
                );
            }
            update_post_meta($post_id, '_galeria_fotos', $galeria);
        }
    }

    // Marca a execução como concluída
    add_option('galerias_de_fotos_criadas', true);
}

// Função para importar imagens para a biblioteca de mídia
function importar_imagem_para_midia($image_url, $post_id) {
    // Faz o download da imagem
    $image_data = file_get_contents($image_url);
    if (!$image_data) {
        return false;
    }

    // Configura os dados do arquivo
    $filename = basename($image_url);
    $upload_file = wp_upload_bits($filename, null, $image_data);
    if ($upload_file['error']) {
        return false;
    }

    // Adiciona a imagem à biblioteca de mídia
    $wp_filetype = wp_check_filetype($filename, null);
    $attachment = array(
        'post_mime_type' => $wp_filetype['type'],
        'post_title'     => sanitize_file_name($filename),
        'post_content'   => '',
        'post_status'    => 'inherit',
    );

    $attachment_id = wp_insert_attachment($attachment, $upload_file['file'], $post_id);

    // Gera os metadados para o anexo
    require_once(ABSPATH . 'wp-admin/includes/image.php');
    $attachment_data = wp_generate_attachment_metadata($attachment_id, $upload_file['file']);
    wp_update_attachment_metadata($attachment_id, $attachment_data);

    return $attachment_id;
}

// Hook para criar as galerias automaticamente
add_action('init', 'criar_galerias_de_fotos_automaticamente');




/*******************FIM tipo de conteudo GALERIA DE FOTOS************************ */

/*******************tipo de conteudo GALERIA DE VIDEOS************************ */

// Função para registrar o tipo de conteúdo "Galeria de Vídeos"
function registrar_tipo_conteudo_galeria_videos() {
    $labels = array(
        'name'               => 'Galerias de Vídeos',
        'singular_name'      => 'Galeria de Vídeos',
        'menu_name'          => 'Galeria de Vídeos',
        'name_admin_bar'     => 'Galeria de Vídeos',
        'add_new'            => 'Adicionar Nova',
        'add_new_item'       => 'Adicionar Nova Galeria de Vídeos',
        'new_item'           => 'Nova Galeria de Vídeos',
        'edit_item'          => 'Editar Galeria de Vídeos',
        'view_item'          => 'Ver Galeria de Vídeos',
        'all_items'          => 'Todas as Galerias de Vídeos',
        'search_items'       => 'Buscar Galerias de Vídeos',
        'not_found'          => 'Nenhuma galeria de vídeos encontrada.',
        'not_found_in_trash' => 'Nenhuma galeria de vídeos encontrada na lixeira.',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'galeria-videos'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-video-alt3', // Ícone do menu
        'supports'           => array('title', 'editor', 'thumbnail'), // Título, descrição e imagem destacada
    );

    register_post_type('galeria_videos', $args);
}
add_action('init', 'registrar_tipo_conteudo_galeria_videos');

// Função para adicionar o campo personalizado "Link do Vídeo"
function adicionar_campo_personalizado_video() {
    add_meta_box(
        'link_video_meta_box',
        'Link do Vídeo',
        'renderizar_campo_link_video_GALERIA',
        'galeria_videos',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'adicionar_campo_personalizado_video');

// Função para renderizar o campo no editor do WordPress
function renderizar_campo_link_video_GALERIA($post) {
    // Recupera o valor salvo anteriormente (se houver)
    $link_video = get_post_meta($post->ID, '_link_video', true);

    // Campo HTML
    echo '<label for="link_video">Insira o link do vídeo (YouTube, Vimeo, etc.):</label>';
    echo '<input type="url" id="link_video" name="link_video" value="' . esc_attr($link_video) . '" style="width: 100%; margin-top: 10px;" placeholder="https://www.youtube.com/watch?v=xxxxxx">';
}

// Função para salvar o valor do campo personalizado
function salvar_campo_personalizado_video($post_id) {
    // Verifica se o campo foi enviado e salva o valor
    if (isset($_POST['link_video'])) {
        $link_video = sanitize_text_field($_POST['link_video']);
        update_post_meta($post_id, '_link_video', $link_video);
    }
}
add_action('save_post', 'salvar_campo_personalizado_video');

/*Conteudo:
// Função para criar 25 galerias de vídeos automaticamente
function criar_galerias_de_videos() {
    // Verifica se o tipo de conteúdo "galeria_videos" está registrado
    if (!post_type_exists('galeria_videos')) {
        return;
    }

    // URLs de vídeos fictícios para teste
    $videos = array(
        'https://www.youtube.com/watch?v=xxxxxxx1',
        'https://www.youtube.com/watch?v=xxxxxxx2',
        'https://www.youtube.com/watch?v=xxxxxxx3',
        'https://www.youtube.com/watch?v=xxxxxxx4',
        'https://www.youtube.com/watch?v=xxxxxxx5',
        'https://www.youtube.com/watch?v=xxxxxxx6',
        'https://www.youtube.com/watch?v=xxxxxxx7',
        'https://www.youtube.com/watch?v=xxxxxxx8',
        'https://www.youtube.com/watch?v=xxxxxxx9',
        'https://www.youtube.com/watch?v=xxxxxxx10',
        'https://www.youtube.com/watch?v=xxxxxxx11',
        'https://www.youtube.com/watch?v=xxxxxxx12',
        'https://www.youtube.com/watch?v=xxxxxxx13',
        'https://www.youtube.com/watch?v=xxxxxxx14',
        'https://www.youtube.com/watch?v=xxxxxxx15',
        'https://www.youtube.com/watch?v=xxxxxxx16',
        'https://www.youtube.com/watch?v=xxxxxxx17',
        'https://www.youtube.com/watch?v=xxxxxxx18',
        'https://www.youtube.com/watch?v=xxxxxxx19',
        'https://www.youtube.com/watch?v=xxxxxxx20',
        'https://www.youtube.com/watch?v=xxxxxxx21',
        'https://www.youtube.com/watch?v=xxxxxxx22',
        'https://www.youtube.com/watch?v=xxxxxxx23',
        'https://www.youtube.com/watch?v=xxxxxxx24',
        'https://www.youtube.com/watch?v=xxxxxxx25',
    );

    // Inserir 25 galerias
    for ($i = 1; $i <= 25; $i++) {
        $titulo = "Galeria de Vídeo $i";
        $descricao = "Esta é a descrição da galeria de vídeo $i. Lorem ipsum dolor sit amet, consectetur adipiscing elit.";
        $link_video = $videos[array_rand($videos)];

        // Criar o post da galeria
        $post_id = wp_insert_post(array(
            'post_title'   => $titulo,
            'post_content' => $descricao,
            'post_type'    => 'galeria_videos',
            'post_status'  => 'publish',
        ));

        // Verifica se o post foi criado com sucesso
        if ($post_id && !is_wp_error($post_id)) {
            // Adiciona o link do vídeo como metadado
            update_post_meta($post_id, '_link_video', $link_video);

            // Define uma imagem destacada (caso tenha imagens disponíveis no banco de mídia)
            $imagens_disponiveis = get_posts(array(
                'post_type'      => 'attachment',
                'post_mime_type' => 'image',
                'posts_per_page' => -1,
            ));

            if (!empty($imagens_disponiveis)) {
                $imagem_aleatoria = $imagens_disponiveis[array_rand($imagens_disponiveis)];
                set_post_thumbnail($post_id, $imagem_aleatoria->ID);
            }
        }
    }
}
add_action('init', 'criar_galerias_de_videos');

/*******************FIM tipo de conteudo GALERIA DE VIDEOS************************ */