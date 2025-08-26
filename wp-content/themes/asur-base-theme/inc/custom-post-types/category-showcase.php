<?php
// CPT: Category Showcase
add_action('init', function () {
    $labels = [
        'name'               => __('Destacados de Categoría', 'textdomain'),
        'singular_name'      => __('Destacado', 'textdomain'),
        'menu_name'          => __('Destacados', 'textdomain'),
        'add_new'            => __('Añadir Nuevo', 'textdomain'),
        'add_new_item'       => __('Añadir Nuevo Destacado', 'textdomain'),
        'edit_item'          => __('Editar Destacado', 'textdomain'),
        'new_item'           => __('Nuevo Destacado', 'textdomain'),
        'view_item'          => __('Ver Destacado', 'textdomain'),
        'all_items'          => __('Todos los Destacados', 'textdomain'),
        'search_items'       => __('Buscar Destacados', 'textdomain'),
        'not_found'          => __('No se encontraron Destacados', 'textdomain'),
        'not_found_in_trash' => __('No se encontraron Destacados en la Papelera', 'textdomain'),
    ];

    $args = [
        'labels'        => $labels,
        'public'        => true,
        'has_archive'   => false,
        'menu_icon'     => 'dashicons-grid-view',
        'supports'      => ['title'],
        'show_in_rest'  => true,
        'show_in_menu'  => 'cpt',
    ];

    register_post_type('category-showcase', $args);
});