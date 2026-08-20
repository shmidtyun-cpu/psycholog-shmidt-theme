<?php

add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style(
        'generatepress-parent',
        get_template_directory_uri() . '/style.css'
    );

    wp_enqueue_style(
        'psycholog-shmidt',
        get_stylesheet_uri(),
        array( 'generatepress-parent' ),
        wp_get_theme()->get( 'Version' )
    );
});
