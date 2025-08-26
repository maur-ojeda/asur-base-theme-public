<?php
/**
 * Template Part for displaying the Info Block section.
 *
 * This template part is intended to be included in a parent template
 * and expects the post object to be passed via query variables.
 *
 * @package asur-base-theme
 */

// --- Variable Setup ---
global $wp_query;

// Get the post object passed from the template file.
$current_post = $wp_query->query_vars['info_block_data'] ?? null;

// Exit if no post object is available.
if (!$current_post) {
    return;
}

// --- Post Data and Custom Fields ---
$post_id = $current_post->ID;
$title = $current_post->post_title;
$content = $current_post->post_content;

// Carbon Fields data.
$is_visible = carbon_get_post_meta($post_id, 'is_visible');
$type = carbon_get_post_meta($post_id, 'type');

// Exit if the section is not marked as visible.
if (!$is_visible) {
    return;
}

$overTitle = carbon_get_post_meta($post_id, 'over_title');
$image = carbon_get_post_meta($post_id, 'image');
$btnUrl = carbon_get_post_meta($post_id, 'btn_url');
$btnText = carbon_get_post_meta($post_id, 'btn_txt');
$icon = carbon_get_post_meta($post_id, 'btn_icon');
$extraTitle = carbon_get_post_meta($post_id, 'extra_title');
$extraOverTitle = carbon_get_post_meta($post_id, 'extra_overtitle');

// --- Logic for Layout ---

// Determine the column order based on the 'type' field.
// 'order-first' places the image on the left, 'order-last' places it on the right.
$order = '';
switch ($type) {
    case 'type-2': // texto derecha, imagen izquierda, adorno izquierda
    case 'type-5': // texto derecha, imagen izquierda, adorno arriba
        $order = 'order-first';
        break;
    case 'type-1': // texto izquierda, imagen derecha
    case 'type-3': // texto derecha, imagen izquierda, adorno arriba
    case 'type-4': // texto derecha, imagen izquierda, sin adorno
        $order = 'order-last';
        break;
    // type-6 (solo texto) and default have no specific order.
}
?>


<section class="info-block">
    <div class="container-fluid mt-5">        
        <?php if ($type === 'type-3' && $extraTitle && $extraOverTitle) : ?>
            <div class="row mb-20">
                <div class="col-12 offset-md-1 col-md-10" data-aos="fade" data-aos-delay="100">
                    <h6 class="over-title"><?= esc_html($extraOverTitle); ?></h6>
                    <h2 class="title"><?= esc_html($extraTitle); ?></h2>
                </div>
            </div>
        <?php endif; ?>

        <div class="row">

            <?php // --- Image Column (if not type-6) --- ?>
            <?php if ($type !== 'type-6') : ?>
                <div class="col-12 offset-md-1 col-md-4 <?= esc_attr($order); ?>" data-aos="fade-right">
                    <div class="img-krom-wrapper <?= esc_attr($type); ?>">
                        <img class="img-krom <?= esc_attr($order); ?>" src="<?php echo esc_url(ensure_https($image)); ?>" alt="">
                    </div>
                </div>
            <?php endif; ?>

            <?php // --- Content Column --- ?>
            <div class="offset-md-1 col">
                <?php if ($overTitle) : ?>
                    <h6 class="over-title" data-aos="fade-up" data-aos-delay="200"><?= esc_html($overTitle); ?></h6>
                <?php endif; ?>

                <h2 class="title" data-aos="fade-up" data-aos-delay="400"><?= esc_html($title); ?></h2>

                <div class="wysiwyg" data-aos="fade-up" data-aos-delay="600">
                    <?php echo apply_filters('the_content', $content); ?>
                </div>

                <?php if ($btnUrl && $btnText) : ?>
                    <a href="<?= esc_url($btnUrl); ?>" class="btn-krom" data-aos="fade-up" data-aos-delay="800">
                        <?= esc_html($btnText); ?>
                        <i data-lucide="<?php echo esc_attr($icon); ?>"></i>
                    </a>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>
