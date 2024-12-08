
<?php

    // commento singola riga
    
    /**
     * 
     * commento 
     * riga
     * multipla
     * 
     */

    
    if ( ! function_exists('setup') ) {

        function setup() {

            // Importo il file php che registra e mette in coda i file CSS e JS
            require get_template_directory() . '/inc/assets.php';
        }

    }
    add_action('after_setup_theme', 'setup');

    if( class_exists('acf') ) {
        function register_acf_blocks() {
            register_block_type( __DIR__ . '/acf-blocks/accordion');
            register_block_type( __DIR__ . '/acf-blocks/carousel');
        }
        add_action('init', 'register_acf_blocks');
    }

    function crea_post_type_recensioni() {
        $args = array(
            'labels' => array(
                'name' => 'Recensioni',
                'singular_name' => 'Recensione',
                'add_new' => 'Aggiungi Nuova',
                'add_new_item' => 'Aggiungi Nuova Recensione',
                'edit_item' => 'Modifica Recensione',
                'new_item' => 'Nuova Recensione',
                'view_item' => 'Visualizza Recensione',
                'search_items' => 'Cerca Recensioni',
                'not_found' => 'Nessuna recensione trovata',
                'not_found_in_trash' => 'Nessuna recensione nel cestino',
                'parent_item_colon' => '',
                'menu_name' => 'Recensioni'
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'custom-fields'),
            'rewrite' => array('slug' => 'recensioni'),
            'show_in_rest' => true, // Abilita Gutenberg
            'menu_icon' => 'dashicons-star-half',
            'taxonomies' => array('category', 'post_tag') // opzionale, se vuoi associare categorie e tag
        );
        
        register_post_type('recensioni', $args);
    }
    add_action('init', 'crea_post_type_recensioni');

