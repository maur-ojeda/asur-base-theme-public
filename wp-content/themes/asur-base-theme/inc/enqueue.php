<?php

// Cargar CSS y JS del theme desde /dist/
function asur_enqueue_assets() {
    wp_enqueue_style(
        'asur-theme-style',
        get_template_directory_uri() . '/dist/css/style.min.css',
        [],
        filemtime(get_template_directory() . '/dist/css/style.min.css')
    );

    wp_enqueue_style(
        'aos',
        'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css',
        [],
        '2.3.4'
    );

    wp_enqueue_script(
        'asur-theme-script',
        get_template_directory_uri() . '/dist/js/app.min.js',
        [],
        filemtime(get_template_directory() . '/dist/js/app.min.js'),
        true
    );

    // JS formulario contacto (tu archivo contact-form.js)
    wp_enqueue_script(
        'custom-contact-form',
        get_template_directory_uri() . '/dist/js/contact-form.js', // asegúrate que la ruta sea correcta
        ['jquery'],
        filemtime(get_template_directory() . '/dist/js/contact-form.js'),
        true
    );

    // Localizar para pasar ajax_url
    wp_localize_script('custom-contact-form', 'my_ajax_object', [
        'ajax_url' => admin_url('admin-ajax.php'),
    ]);
}
add_action('wp_enqueue_scripts', 'asur_enqueue_assets');
