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



 <style>
        .custom-orange {
            color: #ff6347;
        }
        .bg-dark-gray {
            background-color: #2c3e50;
        }
        .card-download-links a {
            font-size: 0.875rem;
            color: #6c757d;
            text-decoration: none;
        }
        .card-download-links i {
            font-size: 1.25rem;
            color: #6c757d;
        }
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            filter: invert(1);
        }
    </style>

   <style>
        .custom-bg-dark {
            background-color: #0b1f3f;
        }
        .custom-orange {
            color: #ff6347;
        }
        .form-container {
            background-color: white;
            padding: 2.5rem;
            border-radius: 0.5rem;
        }
    </style>






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
    
<?php get_template_part('template-parts/section', 'innovation-projects-carousel'); ?>
<?php get_template_part('template-parts/section', 'technological-solutions-carousel'); ?>

<?php get_template_part('template-parts/section', 'partners'); ?>

<?php get_template_part('template-parts/section', 'form-home'); ?>

</main>

     







<?php get_footer(); ?>
