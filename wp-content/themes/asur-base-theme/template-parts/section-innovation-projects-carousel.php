
<?php
use Carbon_Fields\Helper\Helper;
//ingresar nombre de post


$post_name="innovacion";

$item = new WP_Query([
    'post_type' => $post_name,
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'menu_order',
    'order' => 'ASC',
]);


if ($item->have_posts()):?>

   <div class="carousel-innovaciones swiper"> <!-- 👈 contenedor de tu carrusel -->
        <div class="swiper-wrapper">

            <?php while ($item->have_posts()): $item->the_post(); ?>
                <div class="swiper-slide">
                    <article class="innovacion-card">
                        <h3><?= esc_html(get_the_title()); ?></h3>

                        <?php if (has_post_thumbnail()): ?>
                            <img src="<?= esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium')); ?>" alt="<?= esc_attr(get_the_title()); ?>">
                        <?php endif; ?>

                        <div class="excerpt">
                            <?= wp_trim_words(get_the_content(), 20, '...'); ?>
                        </div>

                        <a href="<?= esc_url(get_permalink()); ?>" class="btn">Ver más</a>
                    </article>
                </div>
            <?php 
        endwhile; ?>

        </div>
        <!-- Botones Swiper -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-pagination"></div>
    </div>








<?php endif; ?>














<div class="m-block">
    <div class="row">
        <div class="col-12 mb-12">
            <h6 class="over-title" data-aos="fade-up" data-aos-delay="200">INNOVACIÓN</h6>
            <h2 class="title" data-aos="fade-up" data-aos-delay="400">OTROS PROYECTOS</h2>
        </div>
    </div>

    <div id="projectsCarousel" class="carousel slide img-krom-wrapper type-8 " data-bs-ride="carousel">
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










