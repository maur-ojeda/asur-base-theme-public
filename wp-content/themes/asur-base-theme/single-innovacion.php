<?php get_header(); ?>

<?php 

if (have_posts()):
    while (have_posts()): the_post();
            // Campos generales
        $title   = get_the_title();
        $content = apply_filters('the_content', get_the_content());
        $image   = get_the_post_thumbnail_url(get_the_ID(), 'large');
        

        // Sobre título y título principal
        $over_title   = carbon_get_post_meta(get_the_ID(), 'crb_content_over_title');
        $main_title   = carbon_get_post_meta(get_the_ID(), 'crb_content_title');
        $rich_text    = carbon_get_post_meta(get_the_ID(), 'crb_content_texto_enriquecido');
        $main_image   = wp_get_attachment_image_url(carbon_get_post_meta(get_the_ID(), 'crb_content_imagen'), 'large');

        // Hero
        $hero_title   = carbon_get_post_meta(get_the_ID(), 'crb_hero_title');
        $hero_title = $hero_title !== '' ? $hero_title : $title;
        $hero_overlay_opacity   = carbon_get_post_meta(get_the_ID(), 'crb_hero_overlay_opacity');
        $hero_background_color   = carbon_get_post_meta(get_the_ID(), 'crb_hero_background_color');
        $hero_image   = wp_get_attachment_image_url(carbon_get_post_meta(get_the_ID(), 'crb_hero_imagen'), 'large');

        // Información tipo A
        $info_a_images  = [
            wp_get_attachment_image_url(carbon_get_post_meta(get_the_ID(), 'crb_info_a_imagen_1'), 'medium'),
            wp_get_attachment_image_url(carbon_get_post_meta(get_the_ID(), 'crb_info_a_imagen_2'), 'medium')
        ];

        $info_a_text    = carbon_get_post_meta(get_the_ID(), 'crb_info_a_texto_enriquecido');
        $info_a_titles  = [
            carbon_get_post_meta(get_the_ID(), 'crb_info_a_titulo_1'),
            carbon_get_post_meta(get_the_ID(), 'crb_info_a_titulo_2'),
            carbon_get_post_meta(get_the_ID(), 'crb_info_a_titulo_3'),
        ];
        $info_a_listado = carbon_get_post_meta(get_the_ID(), 'crb_info_a_listado');

        // Información tipo B
        $info_b_image    = wp_get_attachment_image_url(carbon_get_post_meta(get_the_ID(), 'crb_info_b_imagen_1'), 'medium');
        $info_b_text     = carbon_get_post_meta(get_the_ID(), 'crb_info_b_texto_enriquecido');
        $info_b_titles   = [
            carbon_get_post_meta(get_the_ID(), 'crb_info_b_titulo_1'),
            carbon_get_post_meta(get_the_ID(), 'crb_info_b_titulo_2'),
        ];
        $info_b_listado  = carbon_get_post_meta(get_the_ID(), 'crb_info_b_listado');


        // video
        $video_id  = carbon_get_post_meta(get_the_ID(), 'crb_video_file');
        $video_url = wp_get_attachment_url( $video_id );
        $video_title = $info_a_titles[0];

    endwhile;
    endif;
?>

<section class="hero inner" style="background-image: url('<?php echo esc_url(ensure_https($hero_image)); ?>')">
    <div class="hero-overlay <?= esc_attr($hero_overlay_opacity); ?>" style="background-color: <?= esc_attr($hero_background_color); ?>;"></div>
        <div class="hero-title">
            <div class="row">
                <div class="offset-lg-05 col-md-11 col-12">
                <?php if ($hero_title): ?>
                <h1 data-aos="fade-up"><?php echo esc_html($hero_title); ?></h1>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-shape">
        <img src="<?php echo get_template_directory_uri(); ?>/dist/img/hero-shape.png" alt="hero-shape">
    </div>
</section>





<main class="container-krom py-5 innovation">
<!-- main content --> 
    <div class="innovation-block-00 m-block">
        <div class="row g-5">
            <div class="col-12 col-lg-5">

            <h6 class="over-title" data-aos="fade-up" data-aos-delay="200"><?= esc_html($over_title); ?></h6>
                <h2 class="title" data-aos="fade-up" data-aos-delay="400"><?php echo esc_html($main_title); ?></h2>
                <div class="wysiwyg" data-aos="fade-up" data-aos-delay="600"><?php echo esc_html($rich_text); ?></div>
            </div>
            <div class="col-12 col-lg-7" data-aos="fade" data-aos-delay="300">
                <div class="img-krom-wrapper type-7  ps-lg-20">
                    <img src="<?php echo esc_url(ensure_https($main_image)); ?>" alt="" class="img-fluid" >
                </div>
                
            </div>
        </div>
    </div>
   
<!-- block 01 -->

    <div class="innovation-block-01 m-block">
        <div class="row">
            
            <div class="col-12 col-lg-5 position-relative">
                
                <div class="col-12" data-aos="fade-up" data-aos-delay="200">
                    <img src="<?php echo esc_url(ensure_https($info_a_images[0])); ?>" alt="" class="img-fluid rounded">
                </div>
                
                <div class="col-12 d-flex justify-content-end" data-aos="fade-up" data-aos-delay="300">
                    <img src="<?php echo esc_url(ensure_https($info_a_images[1])); ?>" alt="" class="img-fluid rounded me-5">
                </div>
            
                
                <div class="position-absolute top-50 translate-middle bg-primary text-center py-10 px-5 rounded w-50" style="right:-35%"
                    data-aos="fade-right" data-aos-delay="400">
                    <h5><?= esc_html($info_a_titles[1]); ?></h5>
                </div>
            </div>
            
            <div class="col-12 offset-lg-1 col-lg-6">
                
                <h6 class="over-title" data-aos="fade-up" data-aos-delay="500"><?= esc_html($info_a_titles[2]); ?></h6>
                
                <h2 class="title" data-aos="fade-up" data-aos-delay="600"><?php echo esc_html($info_a_titles[0]); ?></h2>
                
                <div class="wysiwyg" data-aos="fade-up" data-aos-delay="700"><?php echo esc_html($info_a_text); ?></div>

                <ul class="list-unstyled mt-4" data-aos="fade-up" data-aos-delay="800">
                    <?php foreach ($info_a_listado as $item): ?> 
                        <li><?php echo esc_html($item['item']); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

        </div>
    </div>

<!--video-->

    <div class="krom-video block">
        <div class="row">
            <div class="col-12">
                <h6 class="over-title" data-aos="fade-up" data-aos-delay="500">Video Explicativo</h6>
                <h2 class="title" data-aos="fade-up" data-aos-delay="500"><?php echo esc_html($video_title); ?></h2>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="ratio ratio-16x9" data-aos="fade" data-aos-delay="700">
                    <video width="320" height="240" controls>
                        <source src="<?php echo esc_url(ensure_https($video_url)); ?>" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
    </div>

<!-- block 02 -->

<div class="innovation-block-02 m-block">
    <div class="row g-0">
        <div class="col-12 col-lg-6 p-5">
               <h6 class="over-title" data-aos="fade-up" data-aos-delay="500"><?= esc_html($info_b_titles[1]); ?></h6>
                
                <h2 class="title" data-aos="fade-up" data-aos-delay="600"><?php echo esc_html($info_b_titles[0]); ?></h2>
                
                <div class="wysiwyg" data-aos="fade-up" data-aos-delay="700"><?php echo esc_html($info_b_text); ?></div>

                <ul class="list-unstyled mt-4" data-aos="fade-up" data-aos-delay="800">
                    <?php foreach ($info_b_listado as $item): ?> 
                        <li><?php echo esc_html($item['item']); ?></li>
                    <?php endforeach; ?>
                </ul>
        </div>
        
        <div class="col-12 col-lg-6 bg-filtered">
            <img src="<?php echo esc_url(ensure_https($info_b_image)); ?>" alt="" class="img-fluid rounded w-100" data-aos="fade" data-aos-delay="800">
        </div>
    </div>
</div>


        <?php get_template_part('template-parts/section', 'innovation-projects-carousel'); ?>






  
</main>






<?php get_footer(); ?>