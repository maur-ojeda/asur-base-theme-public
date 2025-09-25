<?php get_header(); 

if (have_posts()):
    while (have_posts()): the_post();
            // Campos generales
        $title   = get_the_title();
        $content = apply_filters('the_content', get_the_content());
        $image   = get_the_post_thumbnail_url(get_the_ID(), 'large');
        $video   = carbon_get_post_meta(get_the_ID(), 'crb_video_file');

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
            wp_get_attachment_image_url(carbon_get_post_meta(get_the_ID(), 'crb_info_a_imagen_2'), 'medium'),
            wp_get_attachment_image_url(carbon_get_post_meta(get_the_ID(), 'crb_info_a_imagen_3'), 'medium'),
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


        ?>



 <style>

/*.inner{ max-height:430px;}*/
  /* 01 block */
        .custom-orange {
            color: #ff6347;
        }
        .table-custom-header {
            background-color: #2c3e50;
            color: white;
            font-weight: bold;
        }
        .table-custom-header th:first-child {
            background-color: #ff6347;
        }
        .table-custom-body td {
            border-bottom: 1px dashed #dcdcdc;
        }
        .table-custom-body tr:last-child td {
            border-bottom: none;
        }
        .table-custom-body td:first-child {
            font-weight: bold;
        }


/* info */

    .custom-orange {
            color: #ff6347;
        }
        .bg-orange {
            background-color: #ff6347;
            height: 10px;
            width: 150px;
        }
        .btn-orange {
            background-color: #ff6347;
            border-color: #ff6347;
        }
        .card-download {
            background-color: #0d1e3d;
            color: white;
        }
        .card-download .download-links a {
            color: white;
        }

        /*info 02*/

     .custom-orange {
            color: #ff6347;
        }
        .bg-orange {
            background-color: #ff6347;
        }
        .list-unstyled li::before {
            content: "■";
            color: #ff6347;
            font-size: 1.2rem;
            margin-right: 0.5rem;
        }

    </style>
        

<section class="hero inner" 
            style="background-image: url('<?php echo esc_url(ensure_https($hero_image)); ?>')">
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



<main>
  



<div class="container py-5">
    <div class="row g-5">
        <div class="col-12 col-lg-5">
            <h6 class="text-uppercase fw-bold custom-orange">Información</h6>
            <h1 class="display-5 fw-bold mb-4">PMS-5500PRO / PMS-5500</h1>
            <p>El Sistema inteligente de monitoreo acuícola SMK-2S y SMK-25PRO, utiliza sensores en un cable inteligente (SmartCable®) para detectar intrusiones, daños y vibraciones anómalas en estructuras como mallas loberas. Opera mediante la lectura de ondas acústicas generadas por eventos físicos, permitiendo identificar con alta precisión (<5 metros) intentos de corte, ingreso de fauna (como lobos marinos) o impactos en las redes. Esta tecnología permite una vigilancia continua y contribuye a prevenir escapes de peces, robos o daños estructurales, asegurando la integridad del centro de cultivo en tiempo real.</p>
            <p>El sistema detecta intrusiones o amenazas mediante el análisis de ondas acústicas generadas por movimientos o vibraciones en la malla. Estas ondas se propagan por el cable de monitoreo y permiten identificar la ubicación exacta y la magnitud del evento mediante gráficos de frecuencia y patrones de comportamiento.</p>
            <p>Genera alertas automáticas en tiempo real, lo que reduce tiempos de reacción, evita periodos de inactividad operativa y fortalece la respuesta preventiva ante incidentes.</p>
        </div>

        <div class="col-12 col-lg-7">
            <img src="https://picsum.photos/800/600" alt="" class="img-fluid">
        </div>
    </div>
</div>
   



<div class="container py-5">
    <div class="row g-5">
        <div class="col-12 col-lg-6 position-relative">
            <img src="https://picsum.photos/800/600?random=1" class="img-fluid rounded-3 mb-4" alt="Excavadora">
            <img src="https://picsum.photos/800/600?random=2" class="img-fluid rounded-3" alt="Tubería">
            
            <div class="position-absolute top-50 start-50 translate-middle bg-orange text-white text-center p-3 rounded-3" style="width: 250px;">
                <h4 class="mb-0">Implementado en +10 industrias</h4>
            </div>
        </div>
        
        <div class="col-12 col-lg-6">
            <h6 class="text-uppercase fw-bold custom-orange">Instalación</h6>
            <h1 class="display-5 fw-bold mb-4">PMS-5500</h1>
            <p>La instalación se realiza mediante un robot submarino que va entrelazando el SmartCable por los distintos canales y estructuras de la malla lobera, pudiendo configurarse módulos integrados entre sí que facilitan la operación tanto para el mapeo reactivo o preventivo, el mantenimiento y el aseguramiento de la integridad del sistema.</p>
            
            <ul class="list-unstyled mt-4">
                <li>Instalación por robot submarino</li>
                <li>Instalación por buzos</li>
                <li>Instalación preventiva SMK-2S PRO (en zonas puntuales)</li>
                <li>Instalación reactiva SMK-2S (entrelazado con la malla)</li>
            </ul>
        </div>
    </div>
</div>









<div class=" py-5">
    <div class="row g-0">
        <div class="col-12 col-lg-6 p-5">
            <h6 class="text-uppercase fw-bold custom-orange">Monitoreo de Ductos</h6>
            <h1 class="display-5 fw-bold mb-4">PMS-5500</h1>
            <p>Este monitoreo consta de tres sistemas. Software o plataforma de visualización donde se habilita por medio de una página web donde puedes descargar todos los datos obtenidos por el sensor. El cable de monitoreo el cual es conectado a un decodificador donde</p>
            <ul class="list-unstyled mt-4">
                <li>Interfaz de visualización múltiple</li>
                <li>Datos transmitidos a bases en tierra y mas</li>
                <li>Almacenamiento de datos en nube común</li>
                <li>Integración IoT sistémica</li>
            </ul>
        </div>
        
        <div class="col-12 col-lg-6 bg-filtered">
        </div>
    </div>
</div>





<?php 





if ($innovaciones->have_posts()): ?>
    <div class="carousel-innovaciones swiper"> <!-- 👈 contenedor de tu carrusel -->
        <div class="swiper-wrapper">

            <?php while ($innovaciones->have_posts()): $innovaciones->the_post(); ?>
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




    <?php endwhile;
endif;
?>





</main>










