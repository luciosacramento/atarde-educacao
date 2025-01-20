<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <input type="search" id="search-input" class="search-field" placeholder="<?php echo esc_attr_x('BUSCA', 'placeholder', 'seu-tema'); ?>" value="<?php echo get_search_query(); ?>" name="s">
    <!--button type="submit" class="search-submit"><?php echo esc_html('Buscar'); ?></button-->
</form>