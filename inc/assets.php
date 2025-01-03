<?php

    function main_assets(){

        wp_enqueue_style( 
            'style-settings',
            get_template_directory_uri(  ). '/style.css',  
            array(),
            '1.0.0',
            'all' 
        );

        wp_enqueue_style( 
            'style-elements',
            get_template_directory_uri(  ). '/assets/css/elements.css',  
            array('style-settings'),
            '1.0.0',
            'all' 
        );

        wp_enqueue_script(

            'main', 
            get_template_directory_uri(  ). '/assets/js/main.js', 
            array('jquery'), 
            '1.0.0', 
            true 

        );

        wp_register_script(

            'slick', 
            get_template_directory_uri(  ). '/assets/vendors/slick-1.8.1/slick/slick.min.js', 
            array(
                'jquery',
                'main'
            ), 
            '1.0.0', 
            true 
        );
        
        wp_register_style( 
            'slick', 
            get_template_directory_uri(  ). '/assets/vendors/slick-1.8.1/slick/slick.css', 
            array(), 
            '1.0.0', 
            'all' 
        );
        
        wp_register_script( 
            'carousel', 
            get_template_directory_uri(  ). '/assets/js/carousel.js', 
            array(
                'slick'
            ), 
            '1.0.0', 
            true 
        );
        
        wp_register_style( 
            'carousel', 
            get_template_directory_uri( ) . '/assets/css/carousel.css', 
            array('slick'), 
            '1.0.0', 
            'all'
        );

        wp_register_style( 
            'card', 
            get_template_directory_uri( ) . '/assets/css/card.css', 
            array(), 
            '1.0.0', 
            'all'
        );

        wp_register_style( 
            'popup', 
            get_template_directory_uri( ) . '/assets/css/popup.css', 
            array(), 
            '1.0.0', 
            'all'
        );

        wp_register_script( 
            'popup', 
            get_template_directory_uri(  ). '/assets/js/popup.js', 
            array(
                'jquery',
                'main'
            ), 
            '1.0.0', 
            true 
        );
        wp_register_style( 
            'accordion', 
            get_template_directory_uri( ) . '/assets/css/accordion.css', 
            array(), 
            '1.0.0', 
            'all'
        );

        if (class_exists ( 'WooCommerce' ) ){
            
            wp_enqueue_style(
                'woo',
                get_template_directory_uri( ) . '/assets/css/woo.css', 
                array(), 
                '1.0.0', 
                'all'
            );
        if(is_cart()){
            
            wp_enqueue_style(
                'woo-cart',
                get_template_directory_uri( ) . '/assets/css/woo-cart.css', 
                array(), 
                '1.0.0', 
                'all'
            );
        }
    }
    }
    add_action( 'wp_enqueue_scripts', 
    'main_assets' );

    function admin_assets(){
        wp_enqueue_script( 
            'register-block-style', 
            get_stylesheet_directory_uri(  ). '/assets/js/register-block-style.js', 
            array(
                'wp-blocks',
                'wp-dom-ready',
                'wp-edit-post'
            ), 
            '1.0.0',
            true
        );
    }
    add_action( 'enqueue_block_editor_assets', 'admin_assets' );




