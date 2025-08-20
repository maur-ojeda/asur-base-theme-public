
<?php
use Carbon_Fields\Helper\Helper;

$item = new WP_Query([
    'post_type' => 'call-to-action',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'menu_order',
    'order' => 'ASC',
]);

if ($item->have_posts()) : ?>

  <pre class="theme-indicator">WIP: calltoaction</pre>

  <section class="call-to-action">

    <?php
    // Buscar el primer servicio visible para usar como encabezado
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

          $text = carbon_get_the_post_meta('cta_link_text');
          $link = carbon_get_the_post_meta('cta_link');

    ?>


    <div class="container">
        <div class="row">
            <div class="col">
                <h3 class="display-6" data-aos="fade" data-aos-delay="200"><?= esc_html($title); ?></h3>
            </div>
            <div class="col" data-aos="fade-right" data-aos-delay="600">
                <p class="text-muted"  ><?= esc_html(strip_tags($content)); ?>  </p>
                <a  class="fw-bold text-decoration-none hvr-underline-from-left" href="<?= $link; ?>"><?= $text; ?></a>
            </div>
        </div>
    </div>
</section>

<?php endwhile; wp_reset_postdata(); ?>
<?php endif; ?>



<?php


// vars for mock data
/*

*/


$title = 'KROM INDUSTRY';
$content = 'Estamos preparados para ser el socio estratégico que su industria necesita, entregamos soluciones integrales en ingeniería, asesoría técnica y suministro de equipos, con un servicio especializado de excelencia apoyado en una sólida red de clase mundial.';
$overTitle = 'UN SOCIO ESTRATÉGICO';
$btnUrl = 'javascript:void(0);';
$btnText = 'Ver más';


?>

<section class="call-to-action">
    <div class="container">
        <div class="row">
            <div class="col">
                <h3 class="display-6" data-aos="fade" data-aos-delay="200"><?= esc_html($title); ?></h3>
            </div>
            <div class="col" data-aos="fade-right" data-aos-delay="600">
                <p class="text-muted"  ><?= esc_html(strip_tags($content)); ?>  </p>
                <a  class="fw-bold text-decoration-none hvr-underline-from-left" href="<?= $btnUrl; ?>"><?= $btnText; ?></a>
            </div>
        </div>
    </div>
</section>










