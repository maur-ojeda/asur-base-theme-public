<?php
$args = array(
    'post_type'      => 'hero',
    'posts_per_page' => 1,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
);

$hero_query = new WP_Query($args);

// Valores por defecto como fallback
$default_background_image = 'https://picsum.photos/1200/600';
$default_title = 'Bienvenido a nuestra plataforma';
$default_content = 'Descubre las últimas tendencias y soluciones tecnológicas.';
$default_button1_text = 'Comienza Ahora';
$default_button1_link = '#';
$default_button2_text = 'Contáctanos';
$default_button2_link = '#';

if ($hero_query->have_posts()) :
    while ($hero_query->have_posts()) : $hero_query->the_post();

        $title           = get_the_title() ?: $default_title;
        $content         = get_the_content() ?: $default_content;
        $button1_icon = carbon_get_the_post_meta('hero_button_1_icon') ?: 'cat';
        $button1_text    = carbon_get_the_post_meta('hero_button_1_text') ?: $default_button1_text;
        $button1_link    = carbon_get_the_post_meta('hero_button_1_link') ?: $default_button1_link;
        $button2_text    = carbon_get_the_post_meta('hero_button_2_text') ?: $default_button2_text;
        $button2_icon = carbon_get_the_post_meta('hero_button_2_icon') ?: 'image-off';
        $button2_link    = carbon_get_the_post_meta('hero_button_2_link') ?: $default_button2_link;
        $overlay_opacity   = carbon_get_the_post_meta('hero_overlay_opacity');
        $background_color   = carbon_get_the_post_meta('hero_background_color');
        $background_image = carbon_get_the_post_meta('hero_background_image') ?: $default_background_image;
        $is_visible       = carbon_get_the_post_meta('is_visible');

        if (!$is_visible) {
            continue;            
        }

     
        ?>

        <section 
            id="hero"
            class="hero-section d-flex align-items-center text-white position-relative hero-zoom" 
            style="background: url('<?php echo esc_url(ensure_https($background_image)); ?>') no-repeat center center / cover; min-height: 100vh;">
            
            <div class="overlay position-absolute top-0 start-0 w-100 h-100 <?= esc_attr($overlay_opacity); ?>" style="background: <?= esc_attr($background_color); ?>;"></div>
            
            <div class="container text-left position-relative z-1 mt-5 pt-5">
                <div class="row">
                    <div class="offset-lg-1 col-lg-8 col-md-10 col-sm-12">

                        <?php if ($title): ?>
                            <h1 class="display-3 mb-3" data-aos="fade-up"><?php echo esc_html($title); ?></h1>
                        <?php endif; ?>

                        <?php if ($content): ?>
                            <div data-aos="fade-up" data-aos-delay="200">
                                <p class="lead mb-4"><?php echo esc_html(strip_tags($content)); ?></p>
                            </div>
                        <?php endif; ?>

                        <div class="d-flex justify-content-left gap-3 flex-wrap" data-aos="fade-up" data-aos-delay="400">
                            <?php if ($button1_link): ?>
                                <a href="<?php echo esc_url($button1_link); ?>" class="btn rounded-pill btn-primary hvr-icon-wobble-horizontal">
                                    <?php if ($button1_icon): ?>
                                        <i class="hvr-icon" data-lucide="<?php echo esc_attr($button1_icon); ?>"></i>
                                    <?php endif; ?>

                                    <?php echo esc_html($button1_text); ?>
                                </a>
                            <?php endif; ?>


                            <?php if ($button2_link): ?>
                                <a href="<?php echo esc_url($button2_link); ?>" class="btn rounded-pill btn-outline-light  hvr-icon-wobble-horizontal">                                
                                    <?php if ($button2_icon): ?>
                                        <i class="hvr-icon" data-lucide="<?php echo esc_attr($button2_icon); ?>"></i>
                                    <?php endif; ?>
                                    <?php echo esc_html($button2_text); ?>
                                </a>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <?php
    endwhile;
    wp_reset_postdata();
endif;
?>
