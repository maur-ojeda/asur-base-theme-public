
<?php
use Carbon_Fields\Helper\Helper;
//ingresar nombre de post
$post_name="";


$item = new WP_Query([
    'post_type' => $post_name,
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'menu_order',
    'order' => 'ASC',
]);


if ($item->have_posts()) : ?>

<?php
    $first_visible_post = null;
    $temp_query = clone $item;
    
    while ($temp_query->have_posts()) :
      $temp_query->the_post();
      $is_visible = carbon_get_the_post_meta('is_visible');
      
      if ($is_visible && is_null($first_visible_post)) {
        $first_visible_post = get_post();
        setup_postdata($first_visible_post);
        $title = get_the_title();
        $content = get_the_content();
      }
    endwhile;
    
    wp_reset_postdata();
    
    while ($item->have_posts()) : $item->the_post();
    
    $is_visible = carbon_get_the_post_meta('is_visible');
    if (!$is_visible) continue;
    
    $text = carbon_get_the_post_meta('fp_link_text');
    $link = carbon_get_the_post_meta('fp_link');
    $image = carbon_get_the_post_meta('fp_image');
    $info = carbon_get_the_post_meta('fp_info');
    $overtitle = carbon_get_the_post_meta('fp_over_title');
    
    ?>





<section id="featured-proyect">
  <div class="container">
            <div class="row align-items-center proyecto-section">
                <div class="col-lg-5 col-md-5 mb-4 mb-md-0">
                    <h6 class="text-primary fw-semibold" data-aos="fade" data-aos-delay="800"><?= esc_html($overtitle); ?></h6>
                    <h3 class="display-6" data-aos="fade-up" data-aos-delay="400"><?= esc_html($title); ?></h3>
                    <p class="text-muted" data-aos="fade-up" data-aos-delay="600">
                        <?= esc_html(strip_tags($content)); ?> 
                    </p>
                    <a href="<?= $link; ?>" class="btn rounded-pill btn-primary" data-aos="fade-up" data-aos-delay="600"> <?= $text; ?></a>
                </div>
                <div class="offset-md-2 col-lg-5 col-md-5">
                    <div class="imagen-container" >
                        <img src="<?php echo esc_url(ensure_https($image)); ?>" 
                             alt="imagen" 
                             class="imagen-principal"
                             data-aos="fade-left" data-aos-delay="500"
                             >
                        
                             <div class="info-overlay" data-aos="fade" data-aos-delay="1000">
                            <p><?= esc_html($info); ?></p>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
</section>

<?php endwhile; wp_reset_postdata(); ?>
<?php endif; ?>


<?php // seccion nueva en duro ?>

<div class="container py-5">
    <div class="row mb-5">
        <div class="col-12">
            <h6 class="text-uppercase fw-bold custom-orange">Krom Industry</h6>
            <h2 class="display-5 fw-bold">PARTNERS EN EL MUNDO</h2>
        </div>
    </div>
    <div class="row row-cols-2 row-cols-md-4 g-5 align-items-center justify-content-center">
        <div class="col text-center">
            <img src="https://placehold.co/200x100" class="img-fluid" alt="Codelco">
        </div>
        <div class="col text-center">
            <img src="https://placehold.co/200x100" class="img-fluid" alt="ENAMI">
        </div>
        <div class="col text-center">
            <img src="https://placehold.co/200x100" class="img-fluid" alt="Enel">
        </div>
        <div class="col text-center">
            <img src="https://placehold.co/200x100" class="img-fluid" alt="Enaex">
        </div>
        <div class="col text-center">
            <img src="https://placehold.co/200x100" class="img-fluid" alt="Anglo American">
        </div>
        <div class="col text-center">
            <img src="https://placehold.co/200x100" class="img-fluid" alt="BHP">
        </div>
        <div class="col text-center">
            <img src="https://placehold.co/200x100" class="img-fluid" alt="Christian Pfeiffer">
        </div>
        <div class="col text-center">
            <img src="https://placehold.co/200x100" class="img-fluid" alt="Teck">
        </div>
        <div class="col text-center">
            <img src="https://placehold.co/200x100" class="img-fluid" alt="ENAP">
        </div>
        <div class="col text-center">
            <img src="https://placehold.co/200x100" class="img-fluid" alt="Los Pelambres">
        </div>
    </div>
</div>
