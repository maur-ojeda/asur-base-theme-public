<?php
/* Template Name: Front Page OnePage */
get_header();

/**
 * ==========================================================
 * 1. QUERY: CATEGORY-SHOWCASE
 * ==========================================================
 */
$showcase_query = new WP_Query([
    'post_type'      => 'category-showcase',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
]);

$ordered_showcase_blocks = [];
if ($showcase_query->have_posts()) {
    while ($showcase_query->have_posts()) {
        $showcase_query->the_post();
        $order = (int) carbon_get_the_post_meta('orden_bloque');
        $destacados = carbon_get_the_post_meta('crb_destacados_agrupados');

        if ($order > 0 && !empty($destacados)) {
            $ordered_showcase_blocks[$order] = get_post();
        }
    }
    wp_reset_postdata();

    // Ordenar según orden_bloque
    ksort($ordered_showcase_blocks);
}

/**
 * ==========================================================
 * 2. QUERY: INFO-BLOCK
 * ==========================================================
 */
$info_blocks_query = new WP_Query([
    'post_type'      => 'info-block',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
]);

$ordered_blocks = [];
if ($info_blocks_query->have_posts()) {
    while ($info_blocks_query->have_posts()) {
        $info_blocks_query->the_post();
        $order = (int) carbon_get_the_post_meta('ib_order');

        if ($order > 0) {
            $ordered_blocks[$order] = get_post();
        }
    }
    wp_reset_postdata();

    // Ordenar según ib_order
    ksort($ordered_blocks);
}

/**
 * ==========================================================
 * 3. LAYOUT DEL CLIENTE (ORDEN FIJO DE SECCIONES)
 * ==========================================================
 */
$layout = [
    ['type' => 'hero'],
    ['type' => 'info-block', 'slot' => 1],
    ['type' => 'info-block', 'slot' => 2],
    ['type' => 'info-block', 'slot' => 3],
    ['type' => 'category-showcase', 'slot' => 2],
    ['type' => 'call-to-action'],
    ['type' => 'category-showcase', 'slot' => 1],
    ['type' => 'info-block', 'slot' => 4],
    ['type' => 'info-block', 'slot' => 5],
];
?>

<main id="main-content">
    <?php foreach ($layout as $item) : ?>

        <?php if ($item['type'] === 'hero') : ?>
            <?php get_template_part('template-parts/section', 'hero'); ?>

        <?php elseif ($item['type'] === 'info-block' && !empty($ordered_blocks[$item['slot']])) : ?>
            <?php set_query_var('info_block_data', $ordered_blocks[$item['slot']]); ?>
            <?php get_template_part('template-parts/section', 'info-block'); ?>

        <?php elseif ($item['type'] === 'category-showcase' && !empty($ordered_showcase_blocks[$item['slot']])) : ?>
            <?php set_query_var('showcase_data', $ordered_showcase_blocks[$item['slot']]); ?>
            <?php get_template_part('template-parts/section', 'category-showcase'); ?>

        <?php elseif ($item['type'] === 'call-to-action') : ?>
            <?php get_template_part('template-parts/section', 'call-to-action'); ?>

        <?php endif; ?>

    <?php endforeach; ?>
</main>

<?php get_footer(); ?>
