<?php
/**
 * Funciones y definiciones del tema asur-base-theme.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package asur-base-theme
 */

// =============================================================================
// 1. INCLUDES ESENCIALES
// =============================================================================
// Archivos necesarios para funcionalidades clave del tema.
// =============================================================================

use Carbon_Fields\Carbon_Fields;

// Carga el autoloader de Composer para las dependencias.
$autoload = __DIR__ . '/vendor/autoload.php';
if (file_exists($autoload)) {
    require_once $autoload;
    Carbon_Fields::boot(); // Inicializa Carbon Fields.
}

// Incluye el Nav Walker personalizado para menús de Bootstrap.
require_once get_template_directory() . '/inc/class-bootstrap-navwalker.php';

// Incluye la lógica para el shortcode del formulario de contacto.
require_once get_template_directory() . '/inc/shortcodes/contact-form.php';

// Incluye el manejador AJAX para el envío del formulario de contacto.
require_once get_template_directory() . '/inc/ajax/contact-form-handler.php';

// Incluye la función para encolar los scripts y estilos del tema.
require_once get_template_directory() . '/inc/enqueue.php';


// =============================================================================
// 2. CONFIGURACIÓN DEL TEMA
// =============================================================================
// Hooks y funciones que configuran las características básicas del tema.
// =============================================================================

/**
 * Configura las características soportadas por el tema.
 */
function asur_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
    add_theme_support('custom-logo');

    // Registra las ubicaciones de los menús de navegación.
    register_nav_menus([
        'main_menu' => __('Main Menu', 'asur-base-theme')
    ]);
}
add_action('after_setup_theme', 'asur_theme_setup');


// =============================================================================
// 3. PERSONALIZADOR DE WORDPRESS (CUSTOMIZER)
// =============================================================================
// Añade nuevas opciones al personalizador de temas de WordPress.
// =============================================================================

/**
 * Añade la opción para subir un logo blanco en el personalizador.
 * Útil para encabezados con fondo transparente.
 *
 * @param WP_Customize_Manager $wp_customize Instancia del personalizador.
 */
function asur_customize_register($wp_customize) {
    // Define el ajuste para el logo blanco.
    $wp_customize->add_setting('white_logo', [
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ]);

    // Añade el control para subir la imagen del logo blanco.
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'white_logo_control', [
        'label'       => __('Logo Blanco (para header transparente)', 'asur-base-theme'),
        'description' => __('Sube una versión en blanco del logo para mostrar cuando el encabezado es transparente.', 'asur-base-theme'),
        'section'     => 'title_tagline', // Se añade a la sección "Identidad del Sitio".
        'settings'    => 'white_logo',
        'priority'    => 8, // Justo después del logo estándar.
    ]));
}
add_action('customize_register', 'asur_customize_register');


// =============================================================================
// 4. REGISTRO DE TIPOS DE CONTENIDO Y CAMPOS PERSONALIZADOS
// =============================================================================
// Carga automática de Custom Post Types (CPT) y campos de Carbon Fields.
// =============================================================================

/**
 * Registra los Custom Post Types (CPT) definidos en la carpeta /inc/custom-post-types/.
 * Carga cada archivo PHP de forma automática.
 */
foreach (glob(__DIR__ . '/inc/custom-post-types/*.php') as $cpt_file) {
    require_once $cpt_file;
}

/**
 * Registra los campos personalizados de Carbon Fields.
 * Carga cada archivo de definición de campos desde /inc/carbon-fields/.
 */
add_action('carbon_fields_register_fields', function () {
    foreach (glob(__DIR__ . '/inc/carbon-fields/*.php') as $carbon_fields) {
        require_once $carbon_fields;
    }
});


// =============================================================================
// 5. AJUSTES DEL ÁREA DE ADMINISTRACIÓN (WP-ADMIN)
// =============================================================================
// Modificaciones y personalizaciones del backend de WordPress.
// =============================================================================

/**
 * Deshabilita el editor de bloques (Gutenberg) para los CPTs personalizados.
 * Fuerza el uso del editor clásico para una experiencia más consistente con Carbon Fields.
 */
/*add_filter('use_block_editor_for_post_type', function($use_block_editor, $post_type) {
    //$core_post_types = ['post', 'page', 'attachment', 'revision', 'nav_menu_item'];

    // Si el tipo de post no es uno de los principales de WordPress, deshabilita Gutenberg.
    if (!in_array($post_type, $core_post_types)) {
        return false;
    }

    return $use_block_editor;
}, 10, 2);*/
add_filter('use_block_editor_for_post_type', '__return_false', 10, 2);


/**
 * Añade una página de menú en el administrador para agrupar los CPTs.
 * Facilita el acceso a los tipos de contenido personalizados.
 */
add_action('admin_menu', function () {
    add_menu_page(
        'CPT',                     // Título de la página
        'Contenidos',              // Título del menú
        'edit_posts',              // Capacidad requerida
        'cpt',                     // Slug del menú
        '',                        // Función de callback (vacía para ser un separador)
        'dashicons-category',      // Icono del menú
        5                          // Posición en el menú
    );
});


// =============================================================================
// 6. FUNCIONES DE AYUDA (HELPERS)
// =============================================================================
// Funciones de utilidad reutilizables en todo el tema.
// =============================================================================

/**
 * Asegura que una URL use el protocolo HTTPS.
 * Nota: Actualmente está forzando HTTP, probablemente para un entorno de desarrollo local.
 *
 * @param string $url La URL a procesar.
 * @return string La URL con el esquema correcto.
 */
function ensure_https($url) {
    // Para producción, debería ser: return esc_url(set_url_scheme($url, 'https'));
    return esc_url(set_url_scheme($url, 'http'));
}


// 1. Registrar taxonomías (en init)
add_action('init', 'registrar_taxonomias_basicas');
function registrar_taxonomias_basicas() {

    register_taxonomy('industria', ['producto', 'monitoreo'], [
        'labels' => [
            'name' => 'Industrias',
            'singular_name' => 'Industria',
        ],
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'rewrite'           => ['slug' => 'industria'],
    ]);

    register_taxonomy('linea_producto', 'producto', [
        'labels' => [
            'name' => 'Líneas de Producto',
            'singular_name' => 'Línea de Producto',
        ],
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'rewrite'           => ['slug' => 'linea-producto'],
    ]);

    register_taxonomy('categoria_tecnologia', 'producto', [
        'labels' => [
            'name' => 'Categorías Tecnológicas',
            'singular_name' => 'Categoría Tecnológica',
        ],
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'rewrite'           => ['slug' => 'categoria-tecnologia'],
    ]);

    register_taxonomy('segmento', 'monitoreo', [
        'labels' => [
            'name' => 'Segmentos',
            'singular_name' => 'Segmento',
        ],
        'hierarchical'      => false,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'rewrite'           => ['slug' => 'segmento'],
    ]);

    register_taxonomy('tipo_info', 'info', [
        'labels' => [
            'name' => 'Tipos de Información',
            'singular_name' => 'Tipo de Información',
        ],
        'hierarchical'      => false,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'rewrite'           => ['slug' => 'tipo-info'],
    ]);

    register_taxonomy('familia_producto', 'producto', [
        'labels' => [
            'name' => 'Familias de Producto',
            'singular_name' => 'Familia de Producto',
        ],
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'rewrite'           => ['slug' => 'familia-producto'],
    ]);

    register_taxonomy('mercado_objetivo', 'producto', [
        'labels' => [
            'name' => 'Mercados Objetivo',
            'singular_name' => 'Mercado Objetivo',
        ],
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'rewrite'           => ['slug' => 'mercado-objetivo'],
    ]);

    // 🌟 Nuevas taxonomías basadas en el diagrama
    register_taxonomy('fabricante', 'producto', [
        'labels' => [
            'name' => 'Fabricantes',
            'singular_name' => 'Fabricante',
        ],
        'hierarchical'      => false, // No jerárquica
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'rewrite'           => ['slug' => 'fabricante'],
    ]);

    register_taxonomy('tecnologia', 'producto', [
        'labels' => [
            'name' => 'Tecnologías',
            'singular_name' => 'Tecnología',
        ],
        'hierarchical'      => true, // Jerárquica
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'rewrite'           => ['slug' => 'tecnologia'],
    ]);

}


// 2. Agrupar bajo un menú padre "Taxonomías"
add_action('admin_menu', 'crear_menu_taxonomias');
function crear_menu_taxonomias() {
    // Menú padre
    add_menu_page(
        'Taxonomías',
        'Taxonomías',
        'manage_options',
        'menu-taxonomias',
        '',
        'dashicons-category',
        25
    );

    // Submenús para cada taxonomía
    add_submenu_page('menu-taxonomias', 'Industrias', 'Industrias', 'manage_options', 'edit-tags.php?taxonomy=industria');
    add_submenu_page('menu-taxonomias', 'Líneas de Producto', 'Líneas de Producto', 'manage_options', 'edit-tags.php?taxonomy=linea_producto');
    add_submenu_page('menu-taxonomias', 'Categorías Tecnológicas', 'Categorías Tecnológicas', 'manage_options', 'edit-tags.php?taxonomy=categoria_tecnologia');
    add_submenu_page('menu-taxonomias', 'Segmentos', 'Segmentos', 'manage_options', 'edit-tags.php?taxonomy=segmento');
    add_submenu_page('menu-taxonomias', 'Tipos de Información', 'Tipos de Información', 'manage_options', 'edit-tags.php?taxonomy=tipo_info');
    add_submenu_page('menu-taxonomias', 'Familias de Producto', 'Familias de Producto', 'manage_options', 'edit-tags.php?taxonomy=familia_producto');
    add_submenu_page('menu-taxonomias', 'Mercados Objetivo', 'Mercados Objetivo', 'manage_options', 'edit-tags.php?taxonomy=mercado_objetivo');

    // 🌟 Nuevos submenús
    add_submenu_page('menu-taxonomias', 'Fabricantes', 'Fabricantes', 'manage_options', 'edit-tags.php?taxonomy=fabricante');
    add_submenu_page('menu-taxonomias', 'Tecnologías', 'Tecnologías', 'manage_options', 'edit-tags.php?taxonomy=tecnologia');
}