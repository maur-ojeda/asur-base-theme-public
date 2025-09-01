
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



<div class="container py-5">
    <div class="row">
        <div class="col-12 mb-4">
            <h5 class="text-secondary text-uppercase">Proyectos</h5>
            <h1 class="text-dark">INNOVACIÓN</h1>
        </div>
    </div>

    <div id="projectsCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

            <div class="carousel-item active">
                <div class="row g-4">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card border-0 h-100 shadow-sm">
                            <div class="position-relative">
                                <img src="https://placehold.co/600x400" class="card-img-top" alt="Monitoreo Celdas Electrowinning">
                                <span class="position-absolute top-0 start-0 m-3 text-white fs-1 fw-bold">01</span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fw-bold">MONITOREO CELDAS ELECTROWINNING</h5>
                                <p class="card-text custom-card-text">Innovación que transforma el entorno industrial. Donde cada variable cuenta, nuestra solución lleva el control de procesos al siguiente nivel, utilizando la tecnología SmartCable® con monitoreo en tiempo real...</p>
                            </div>
                            <div class="card-footer bg-white border-0">
                                <a href="#" class="btn btn-primary bg-orange border-0">Ver Más →</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card border-0 h-100 shadow-sm">
                            <div class="position-relative">
                                <img src="https://placehold.co/600x400" class="card-img-top" alt="Monitoreo Lixiviación">
                                <span class="position-absolute top-0 start-0 m-3 text-white fs-1 fw-bold">02</span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fw-bold">MONITOREO LIXIVIACIÓN</h5>
                                <p class="card-text custom-card-text">Tecnología inteligente para una lixiviación más eficiente. Revoluciona el monitoreo en pilas mediante sensores de alta precisión...</p>
                            </div>
                            <div class="card-footer bg-white border-0">
                                <a href="#" class="btn btn-primary bg-orange border-0">Ver Más →</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card border-0 h-100 shadow-sm">
                            <div class="position-relative">
                                <img src="https://placehold.co/600x400" class="card-img-top" alt="Seguridad Perimetral">
                                <span class="position-absolute top-0 start-0 m-3 text-white fs-1 fw-bold">03</span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fw-bold">SEGURIDAD PERIMETRAL</h5>
                                <p class="card-text custom-card-text">Seguridad perimetral con inteligencia de última generación. Nuestro Sistema Inteligente de Monitoreo redefine la protección de infraestructuras críticas...</p>
                            </div>
                            <div class="card-footer bg-white border-0">
                                <a href="#" class="btn btn-primary bg-orange border-0">Ver Más →</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card border-0 h-100 shadow-sm">
                            <div class="position-relative">
                                <img src="https://placehold.co/600x400" class="card-img-top" alt="Monitoreo Acuicultura">
                                <span class="position-absolute top-0 start-0 m-3 text-white fs-1 fw-bold">04</span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fw-bold">MONITOREO EN ACUICULTURA</h5>
                                <p class="card-text custom-card-text">Tecnología avanzada para asegurar la integridad del centro de cultivo en tierra o en mar. El sistema inteligente de monitoreo acuícola...</p>
                            </div>
                            <div class="card-footer bg-white border-0">
                                <a href="#" class="btn btn-primary bg-orange border-0">Ver Más →</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


 <div class="carousel-item ">
                <div class="row g-4">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card border-0 h-100 shadow-sm">
                            <div class="position-relative">
                                <img src="https://placehold.co/600x400" class="card-img-top" alt="Monitoreo Celdas Electrowinning">
                                <span class="position-absolute top-0 start-0 m-3 text-white fs-1 fw-bold">05</span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fw-bold">MONITOREO CELDAS ELECTROWINNING</h5>
                                <p class="card-text custom-card-text">Innovación que transforma el entorno industrial. Donde cada variable cuenta, nuestra solución lleva el control de procesos al siguiente nivel, utilizando la tecnología SmartCable® con monitoreo en tiempo real...</p>
                            </div>
                            <div class="card-footer bg-white border-0">
                                <a href="#" class="btn btn-primary bg-orange border-0">Ver Más →</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card border-0 h-100 shadow-sm">
                            <div class="position-relative">
                                <img src="https://placehold.co/600x400" class="card-img-top" alt="Monitoreo Lixiviación">
                                <span class="position-absolute top-0 start-0 m-3 text-white fs-1 fw-bold">06</span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fw-bold">MONITOREO LIXIVIACIÓN</h5>
                                <p class="card-text custom-card-text">Tecnología inteligente para una lixiviación más eficiente. Revoluciona el monitoreo en pilas mediante sensores de alta precisión...</p>
                            </div>
                            <div class="card-footer bg-white border-0">
                                <a href="#" class="btn btn-primary bg-orange border-0">Ver Más →</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card border-0 h-100 shadow-sm">
                            <div class="position-relative">
                                <img src="https://placehold.co/600x400" class="card-img-top" alt="Seguridad Perimetral">
                                <span class="position-absolute top-0 start-0 m-3 text-white fs-1 fw-bold">07</span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fw-bold">SEGURIDAD PERIMETRAL</h5>
                                <p class="card-text custom-card-text">Seguridad perimetral con inteligencia de última generación. Nuestro Sistema Inteligente de Monitoreo redefine la protección de infraestructuras críticas...</p>
                            </div>
                            <div class="card-footer bg-white border-0">
                                <a href="#" class="btn btn-primary bg-orange border-0">Ver Más →</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card border-0 h-100 shadow-sm">
                            <div class="position-relative">
                                <img src="https://placehold.co/600x400" class="card-img-top" alt="Monitoreo Acuicultura">
                                <span class="position-absolute top-0 start-0 m-3 text-white fs-1 fw-bold">08</span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title fw-bold">MONITOREO EN ACUICULTURA</h5>
                                <p class="card-text custom-card-text">Tecnología avanzada para asegurar la integridad del centro de cultivo en tierra o en mar. El sistema inteligente de monitoreo acuícola...</p>
                            </div>
                            <div class="card-footer bg-white border-0">
                                <a href="#" class="btn btn-primary bg-orange border-0">Ver Más →</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#projectsCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#projectsCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
</div>










