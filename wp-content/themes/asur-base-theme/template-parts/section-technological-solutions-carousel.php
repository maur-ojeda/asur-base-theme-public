
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




<div class="container py-20 my-20">
    <div class="row align-items-center">
        <div class="col-lg-5 mb-4 mb-lg-0">
            <h6 class="text-uppercase fw-bold custom-orange">Soluciones Tecnológicas</h6>
            <h1 class="display-4 fw-bold mb-4">SISTEMAS INTELIGENTES</h1>
            <p class="text-secondary">Nos especializamos en acompañar a nuestros clientes en sus procesos de transformación digital, facilitando la convergencia IT/OT y aplicando metodologías ágiles para acelerar la innovación, reducir costos, mejorar la eficiencia y garantizar la adaptabilidad frente a los desafíos de la industria 4.0.</p>
        </div>
        <div class="col-lg-7">
            <div id="techCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row g-4 justify-content-center">
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card border-0 rounded-4 overflow-hidden h-100">
                                    <div class="position-relative">
                                        <img src="https://placehold.co/600x800" class="card-img-top" alt="Sistema 1">
                                        <div class="position-absolute bottom-0 w-100 text-center text-white py-2 bg-dark-gray opacity-75">
                                            <p class="mb-0 fw-bold">FMS-4500/PRI / FMS-4500</p>
                                            <small>Dossier de Monitoreo de Electrodos</small>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text fw-bold">Lorem ipsum dolor sit amet adipiscing</p>
                                        <div class="d-flex justify-content-between align-items-center card-download-links">
                                            <a href="#">PDF 15.44 MB / ESP</a>
                                            <i class="fas fa-download"></i>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center card-download-links">
                                            <a href="#">PDF 15.44 MB / EN</a>
                                            <i class="fas fa-download"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card border-0 rounded-4 overflow-hidden h-100">
                                    <div class="position-relative">
                                        <img src="https://placehold.co/600x800" class="card-img-top" alt="Sistema 2">
                                        <div class="position-absolute bottom-0 w-100 text-center text-white py-2 bg-dark-gray opacity-75">
                                            <p class="mb-0 fw-bold">MS-3500/PRO / LNS-3500</p>
                                            <small>Dossier de Monitoreo en Lixiviación</small>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text fw-bold">Lorem ipsum dolor sit amet adipiscing</p>
                                        <div class="d-flex justify-content-between align-items-center card-download-links">
                                            <a href="#">PDF 15.24 MB / ESP</a>
                                            <i class="fas fa-download"></i>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center card-download-links">
                                            <a href="#">PDF 15.24 MB / EN</a>
                                            <i class="fas fa-download"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card border-0 rounded-4 overflow-hidden h-100">
                                    <div class="position-relative">
                                        <img src="https://placehold.co/600x800" class="card-img-top" alt="Sistema 3">
                                        <div class="position-absolute bottom-0 w-100 text-center text-white py-2 bg-dark-gray opacity-75">
                                            <p class="mb-0 fw-bold">FMS-5500/PRI / FMS-5500</p>
                                            <small>Dossier de Monitoreo de Faena</small>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text fw-bold">Lorem ipsum dolor sit amet adipiscing</p>
                                        <div class="d-flex justify-content-between align-items-center card-download-links">
                                            <a href="#">PDF 12.03 MB / ESP</a>
                                            <i class="fas fa-download"></i>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center card-download-links">
                                            <a href="#">PDF 12.03 MB / EN</a>
                                            <i class="fas fa-download"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#techCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#techCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>
