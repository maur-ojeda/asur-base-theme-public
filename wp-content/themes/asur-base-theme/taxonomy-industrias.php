<?php
    $current_term = get_queried_object();
    $custom_title = carbon_get_term_meta($current_term->term_id, 'taxonomy_custom_title');
    $custom_over_title = carbon_get_term_meta($current_term->term_id, 'taxonomy_custom_over_title');

    $child_terms = get_terms([
        'taxonomy'   => 'procesos',
        'hide_empty' => false,
        'meta_query' => [
            [
                'key'     => '_crb_industria_parent',
                'value'   => $current_term->term_id,
                'compare' => 'LIKE',
            ],
        ],
    ]);
?>

<h1 class="display-1">taxonomy-industria</h1>
<?=var_dump($child_terms)?>

<?php get_header(); ?>





<section class="hero inner" 
            style="background-image: url('https://picsum.photos/800/600')">
        
            <div class="hero-overlay" style="background-color: rgba(0,0,0,.3);"></div>
            
            <div class="hero-title">
                    <div class="row">
                    <div class="offset-lg-05 col-md-11 col-12">
                        
                            <h1 data-aos="fade-up"><?php echo $custom_title ? esc_html($custom_title) : single_term_title('', false); ?></h1>
                        
                        </div>

                    </div>
                </div>
            </div>

            <div class="hero-shape">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/img/hero-shape.png" alt="hero-shape">
            </div>

        </section>


<div class="container py-5 mt-20">
    <div class="row mb-4">
        <div class="col-12">
            <h6 class="text-uppercase fw-bold text-primary"><?php echo esc_html($custom_over_title); ?></h6>
            <h1 class="display-5 fw-bold text-uppercase"><?php echo $custom_title ? esc_html($custom_title) : single_term_title('', false); ?></h1>
        </div>
    </div>
    <div class="row g-4 justify-content-center py-5 mt-10 mb-20">
        <?php if (!empty($child_terms) && !is_wp_error($child_terms)) : ?>
            <?php foreach ($child_terms as $child_term) :
                $term_description = carbon_get_term_meta($child_term->term_id, 'linea_producto_descripcion');
                $term_image_url = carbon_get_term_meta($child_term->term_id, 'linea_producto_imagen');
            ?>
            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                <div class="card border-0 h-100 shadow-sm">
                    <?php if ($term_image_url) : ?>
                        <img src="<?php echo esc_url($term_image_url); ?>" class="card-img-top" alt="<?php echo esc_attr($child_term->name); ?>">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title fw-bold"><?php echo esc_html($child_term->name); ?></h5>
                        <p class="card-text"><?php echo esc_html($term_description); ?></p>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <a href="<?php echo esc_url(get_term_link($child_term)); ?>" class="btn btn-krom">Ver Más <i data-lucide="arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="col-12">
                <p>No se encontraron líneas de producto para esta industria.</p>
            </div>
        <?php endif; ?>
    </div>
</div>






<div class="container  py-5 mt-20 mb-20">
    <div class="row mb-4">
        <div class="col-12">
            <h6 class="text-uppercase fw-bold text-primary">Proyectos</h6>
            <h1 class="display-5 fw-bold">MONITOREO</h1>
        </div>
    </div>
    
    <div class="row gx-lg-5">
        <div class="col-12 col-lg-8">
            <div class="mb-4 position-relative">
                <div class="bg-orange position-absolute top-0 start-0 m-4"></div>
                <img src="https://picsum.photos/1200/600?random=1" class="img-fluid" alt="Monitoreo Celdas Electrowinning">
            </div>
            
            <div class="row mt-4">
                <div class="col-12">
                    <h4 class="fw-bold">MONITOREO CELDAS ELECTROWINNING</h4>
                    <p>El EMS-4500 es un sistema de monitoreo diseñado para la electroobtención. Su innovación principal radica en el uso de un SmartCable® que permite un control continuo y preciso de dos parámetros fundamentales en las celdas: la temperatura y la eficiencia del proceso.</p>
                    <p>El monitoreo constante del EMS-4500 optimiza el consumo energético, previene el sobrecalentamiento y protege los equipos. Además, al medir la eficiencia, permite una reacción rápida.</p>
                    <a href="#" class="btn btn-orange text-white">Ver más &rarr;</a>
                </div>
            </div>
        </div>
        
        <div class="col-12 col-lg-4 d-flex flex-column align-items-center mt-5 mt-lg-0">
            <div class="card border-0 shadow-sm w-100 h-100 rounded-3 overflow-hidden">
                <img src="https://picsum.photos/600/800?random=2" class="card-img-top" alt="Brochure">
                <div class="card-img-overlay d-flex flex-column justify-content-end bg-dark-gray text-white p-3">
                
                    
                    <p class="fw-bold">KROM Industry</p>
                </div>
                <div class="card-body">
                    <h5 class="card-title fw-bold">Brochure Sistema de Monitoreo para Electroobtención</h5>
                    <ul class="list-unstyled download-links">
                        <li class="d-flex justify-content-between align-items-center mb-2">
                            <a href="#" class="text-primary">PDF 12.03 MB / ESP</a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
                        </li>
                        <li class="d-flex justify-content-between align-items-center">
                            <a href="#" class="text-primary">PDF 12.03 MB / EN</a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>