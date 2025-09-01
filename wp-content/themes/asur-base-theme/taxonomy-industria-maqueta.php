<style>
        .nav-link.active .lucide {
            color: #e6522c; /* Color naranja para el icono activo */
        }
        .nav-link.active h5 {
            color: #e6522c; /* Color naranja para el texto activo */
        }
        .nav-link {
            color: #2c3e50; /* Color gris oscuro para el texto y el icono inactivos */
        }
        .nav-tabs {
            border-bottom: 2px solid #e9ecef; /* Color de la línea inferior de las pestañas */
        }
        .nav-tabs .nav-link.active {
            border-bottom: 2px solid #e6522c; /* Línea naranja debajo del tab activo */
            border-top: none;
            border-left: none;
            border-right: none;
        }
    </style>


<?php get_header(); ?>



<?php 
    $current_term = get_queried_object();
    $custom_title = carbon_get_term_meta($current_term->term_id, 'taxonomy_custom_title');
    $custom_over_title = carbon_get_term_meta($current_term->term_id, 'taxonomy_custom_over_title');
?>

<?php get_template_part('template-parts/section', 'hero'); ?>

<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active d-flex flex-column align-items-center" id="procesos-tab" data-bs-toggle="tab" data-bs-target="#procesos" type="button" role="tab" aria-controls="procesos" aria-selected="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-search"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><circle cx="5" cy="15" r="3"/><path d="M10 17.5 8 19 6 17.5"/><path d="m20 20-3-3"/></svg>
                        <h5 class="mt-2 mb-0 fw-bold">Procesos</h5>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link d-flex flex-column align-items-center" id="categorias-tab" data-bs-toggle="tab" data-bs-target="#categorias" type="button" role="tab" aria-controls="categorias" aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-bar-chart"><path d="M15.5 2H8.6c-.4 0-.8.2-1.1.5-.3.3-.5.7-.5 1.1v12.8c0 .4.2.8.5 1.1.3.3.7.5 1.1.5h9.8c.4 0 .8-.2 1.1-.5.3-.3.5-.7.5-1.1V8.5L15.5 2z"/><path d="M18 12v3"/><path d="M12 10v7"/><path d="M6 15v4"/></svg>
                        <h5 class="mt-2 mb-0 fw-bold">Categorías</h5>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link d-flex flex-column align-items-center" id="productos-tab" data-bs-toggle="tab" data-bs-target="#productos" type="button" role="tab" aria-controls="productos" aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-package-search"><path d="M21 10.5V8a2 2 0 0 0-1-1.73l-7.42-4.27a2 2 0 0 0-2 0L3 6.27a2 2 0 0 0-1 1.73v5a2 2 0 0 0 1 1.73l7.42 4.27a2 2 0 0 0 2 0l2.67-1.54"/><path d="m14 2.5 6 3.5"/><path d="M12 22v-8"/><path d="M10 18.5l-3.5-2V9"/><path d="m22 22-3-3"/><circle cx="17.5" cy="17.5" r="2.5"/><path d="m2 10 9.5 5.5"/></svg>
                        <h5 class="mt-2 mb-0 fw-bold">Productos</h5>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-md-10">
            <div class="tab-content mt-5" id="myTabContent">
                <div class="tab-pane fade show active" id="procesos" role="tabpanel" aria-labelledby="procesos-tab">
                    <!-- Aquí va el contenido de la sección de Procesos.-->
                    
                    <!--Procesos--> 


<div class="container py-5">
    <div class="row mb-4">
        <div class="col-12">
            <h6 class="text-uppercase fw-bold custom-orange"><?= $custom_over_title ?></h6>
            <h1 class="display-5 fw-bold"><?php echo $custom_title ? esc_html($custom_title) : single_term_title('', false); ?></h1>
        </div>
    </div>
    <div class="row g-4 justify-content-center">
   
    <?php    
$current_term = get_queried_object();
$child_terms = get_terms([
'taxonomy'   => 'linea_producto',
'hide_empty' => false,
'parent'     => 0, 
]);

if (!empty($child_terms) && !is_wp_error($child_terms)) :
foreach ($child_terms as $child_term) :                     
$term_description = carbon_get_term_meta($child_term->term_id, 'linea_producto_descripcion');
$term_image_url = carbon_get_term_meta($child_term->term_id, 'linea_producto_imagen');
?>
<div class="col-12 col-sm-12 col-md-6 col-lg-4">
<div class="card border-0 h-100 shadow-sm">
<img src="<?php echo esc_url($term_image_url); ?>" class="card-img-top" alt="Planta Concentradora">
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
<?php endif; ?>

   
    </div>
</div>





                    <!-- Proyectos -->




<div class="container py-5">
    <div class="row mb-4">
        <div class="col-12">
            <h6 class="text-uppercase fw-bold custom-orange">Proyectos</h6>
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
                    <p class="mb-0 fw-bold">EMS-4500PRO / EMS-4500</p>
                    <small>Dossier de Monitoreo para Electroobtención</small>
                    <p class="fw-bold">KROM Industry</p>
                </div>
                <div class="card-body">
                    <h5 class="card-title fw-bold">Brochure Sistema de Monitoreo para Electroobtención</h5>
                    <ul class="list-unstyled download-links">
                        <li class="d-flex justify-content-between align-items-center mb-2">
                            <a href="#" class="text-dark">PDF 12.03 MB / ESP</a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
                        </li>
                        <li class="d-flex justify-content-between align-items-center">
                            <a href="#" class="text-dark">PDF 12.03 MB / EN</a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-download"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


                    <!-- Aquí va el contenido de la sección de Procesos.-->
                </div>
                <div class="tab-pane fade" id="categorias" role="tabpanel" aria-labelledby="categorias-tab">
                    <!-- Aquí va el contenido de la sección de Categorías -->
                </div>
                <div class="tab-pane fade" id="productos" role="tabpanel" aria-labelledby="productos-tab">
                    <!-- Aquí va el contenido de la sección de Productos. -->
                </div>
            </div>
        </div>
    </div>
   
</div>









<div class="d-none">
<?php get_footer(); ?>
</div>
