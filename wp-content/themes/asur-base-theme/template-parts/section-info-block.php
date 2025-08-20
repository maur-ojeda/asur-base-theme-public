<?php
// vars for mock data
/*
typo-1: texto izquierda, imagen derecha
typo-2: texto derecha, imagen izquierda
*/


$title = 'KROM INDUSTRY';
$content = 'Estamos preparados para ser el socio estratégico que su industria necesita, entregamos soluciones integrales en ingeniería, asesoría técnica y suministro de equipos, con un servicio especializado de excelencia apoyado en una sólida red de clase mundial.';
$overTitle = '';
$usImage = 'https://placehold.co/620x570@2x.png';
$btnUrl = '';
$btnText = 'Ver más';
$icon = 'arrow-right';

$type = "type-3";

if( $type == "type-1"){
  $order = 'order-last'; 
}
if( $type == "type-2"){
  $order = 'order-first'; 
}

if( $type == "type-3"){
  $order = 'order-last';  
}


?>



<?php
use Carbon_Fields\Helper\Helper;

$us = new WP_Query([
    'post_type' => 'info-block',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'menu_order',
    'order' => 'ASC',
]);

if ($us->have_posts()) : ?>

  <pre class="theme-indicator">WIP: us</pre>

  <section class="info-block">

    <?php
    $first_visible_post = null;
    $temp_query = clone $us;
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
    ?>
    <div class="container-fluid mt-5">

        <?php
        while ($us->have_posts()) : $us->the_post();

  $is_visible = carbon_get_the_post_meta('is_visible');
  if (!$is_visible) continue;

  $overUsTitle = carbon_get_the_post_meta('us_over_title');
  $usImage = carbon_get_the_post_meta('us_image');

  ?>

  <div class="row">

        
    <div class="col-md-4 p-0" data-aos="fade-right"><img class="img-krom" src="<?php echo esc_url(ensure_https($usImage)); ?>" alt=""></div>
    <!-- Detalles -->
    <div class="col ms-md-5">
      <div data-aos="fade" data-aos-delay="200">
        <h6 class="over-title" data-aos="fade" data-aos-delay="800"><?= esc_html($overUsTitle); ?></h6>
        <h2 class="title" data-aos="fade-up" data-aos-delay="400"><?= esc_html($title); ?></h2>
        <p class="text-muted" data-aos="fade-up" data-aos-delay="600"><?= esc_html(strip_tags($content)); ?></p>
      </div>
    </div>
    </div> 
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
    </div>

  </section>

<?php endif; ?>



<section class="info-block">
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12 offset-md-1 col-md-4 <?= esc_attr($order);?>" data-aos="fade-right">
                <div class="img-krom-wrapper <?= esc_attr($type);?>">
                  <img class="img-krom <?= esc_attr($order);?>" src="<?php echo esc_url(ensure_https($usImage)); ?>" alt="">
                </div>
            </div>
            
            <div class="col-12 offset-md-1 col-md-5">
                
                    <?php if ($overTitle): ?>  
                      <h6 class="over-title" data-aos="fade-up" data-aos-delay="200"><?= esc_html($overTitle); ?></h6>
                    <?php endif; ?>
                    <h2 class="title" data-aos="fade-up" data-aos-delay="400"><?= esc_html($title); ?></h2>
                    <p  data-aos="fade-up" data-aos-delay="600"><?= esc_html(strip_tags($content)); ?></p>
                    
                    <?php if ($btnUrl && $btnText): ?>  
                      <a href="<?= $btnUrl; ?>" class="btn-krom" data-aos="fade-up" data-aos-delay="800">
                        <?= esc_html($btnText); ?>
                        <i data-lucide="<?php echo esc_attr( $icon ); ?>"></i>
                      </a>
                    <?php endif; ?>

                
            </div>
        </div>
    </div>
</section>