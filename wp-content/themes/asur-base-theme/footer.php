<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the main content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials *
 * @package asur-base-theme
 */
?>

<?php
// Consulta para obtener los ajustes del footer desde el CPT
$footer_settings_query = new WP_Query([
    'post_type'      => 'footer_settings',
    'posts_per_page' => 1,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
]);

// Valores por defecto como fallback
$footer_bg_image = 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80';
$social_links    = [];
$contact_phone   = '+56 0 0000 0000';
$contact_email   = 'contacto@contacto.cl';
$contact_address = 'Lugar, Pais';
$link_sections   = [];

if ($footer_settings_query->have_posts()) {
    while ($footer_settings_query->have_posts()) {
        $footer_settings_query->the_post();
        
        // Sobrescribir valores por defecto si existen en el CPT
        $footer_bg_image = carbon_get_the_post_meta('footer_background_image') ?: $footer_bg_image;
        $social_links    = carbon_get_the_post_meta('footer_social_links') ?: $social_links;
        $contact_phone   = carbon_get_the_post_meta('footer_phone') ?: $contact_phone;
        $contact_email   = carbon_get_the_post_meta('footer_email') ?: $contact_email;
        $contact_address = carbon_get_the_post_meta('footer_address') ?: $contact_address;
        $link_sections   = carbon_get_the_post_meta('footer_link_sections') ?: $link_sections;
    }
    wp_reset_postdata();
}
?>
 
</main>
<footer class="footer d-none">
    <div class="container-fluid p-0">
        <div class="footer-content container">
            <div class="footer-section main">
                <div class="footer-logo">
                    <?php
                    // Priorizar el logo blanco para el footer oscuro
                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $footer_logo_url = $custom_logo_id ? wp_get_attachment_image_url( $custom_logo_id, 'full' ) : '';


                    // Si no hay logo blanco, usar el logo de color (estándar) como fallback
                    if ( ! $footer_logo_url ) {
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        if ( $custom_logo_id ) {
                            $footer_logo_url = wp_get_attachment_image_url( $custom_logo_id, 'full' );
                        }
                    }
                    ?>
                    <?php if ( $footer_logo_url ) : ?>
                        <img src="<?php echo ensure_https($footer_logo_url); ?>" alt="<?php bloginfo('name'); ?>" class="footer-logo-img">
                    <?php else : // Fallback si no hay logos, muestra el nombre del sitio ?>
                        <span class="footer-logo-text"><?php bloginfo( 'name' ); ?></span>
                    <?php endif; ?>
                </div>
                <p class="footer-description pe-4">
                    <?php bloginfo('description'); // Usando la descripción del sitio como texto del footer ?>
                </p>
                <div class="footer-social">

                
                    <?php if ( ! empty( $social_links ) ) : ?>
                        <?php foreach ( $social_links as $link ) : ?>
                            <a href="<?php echo esc_url( $link['social_url'] ); ?>" class="social-link" target="_blank" rel="noopener noreferrer">
                                <i data-lucide="<?php echo esc_attr( $link['social_icon_name'] ); ?>"></i>
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>



            <?php if ( ! empty( $link_sections ) ) : ?>


                <?php foreach ( $link_sections as $section ) : ?>
                    <div class="footer-section">
                        <?php if ( ! empty( $section['section_title'] ) ) : ?>
                            <h3 class="footer-title">
                                <?php if ( ! empty( $section['section_title_link'] ) ) : ?>
                                    <a href="<?php echo esc_url( $section['section_title_link'] ); ?>"><?php echo esc_html( $section['section_title'] ); ?></a>
                                <?php else : ?>
                                    <?php echo esc_html( $section['section_title'] ); ?>
                                <?php endif; ?>
                            </h3>
                        <?php endif; ?>

                        <?php if ( ! empty( $section['section_links'] ) ) : ?>
                            <ul class="footer-list">
                                <?php foreach ( $section['section_links'] as $link ) : ?>
                                    <li><a href="<?php echo esc_url( $link['link_url'] ); ?>"><?php echo esc_html( $link['link_text'] ); ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <div class="footer-section">
                <h3 class="footer-title">Contacto</h3>
                <ul class="footer-list">
                    <li><i data-lucide="phone"></i> <?php echo esc_html( $contact_phone ); ?></li>
                    <li><i data-lucide="mail"></i> <a href="mailto:<?php echo esc_attr( $contact_email ); ?>"><?php echo esc_html( $contact_email ); ?></a></li>
                    <li><i data-lucide="map-pin"></i> <?php echo esc_html( $contact_address ); ?></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom bg-success p-3 text-white">
            <p class="m-0">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>


<div class="footer-bg">

    <div class="footer-image-clipped"></div>


    <div class="shape-top-orange"></div>
    
    <footer class="bg-dark-blue py-5" style="z-index: 4;">
        <div class="container footer-content">
            <div class="row">
                <div class="col-12 col-lg-5 mb-4 mb-lg-0">
                    <h2 class="h3 fw-bold">KROM<br>Industry</h2>
                    <p class="small text-white-50">Equipo enfocado en ofrecer un servicio integral al sector minero-metalúrgico, actuando como socio estratégico para sus representaciones.</p>
                    <div class="d-flex gap-2">
                        <span class="rounded-circle bg-white" style="width:10px; height:10px;"></span>
                        <span class="rounded-circle bg-white" style="width:10px; height:10px;"></span>
                        <span class="rounded-circle bg-white" style="width:10px; height:10px;"></span>
                        <span class="rounded-circle bg-white" style="width:10px; height:10px;"></span>
                    </div>
                </div>

                <div class="col-12 col-lg-7">
                    <div class="row">
                        <div class="col-6 col-md-4 col-lg-3 mb-4 mb-lg-0">
                            <h5 class="fw-bold">Quick Links</h5>
                            <ul class="list-unstyled">
                                <li><a href="#" class="text-white-50 text-decoration-none">Home</a></li>
                                <li><a href="#" class="text-white-50 text-decoration-none">About Us</a></li>
                                <li><a href="#" class="text-white-50 text-decoration-none">Servicios</a></li>
                                <li><a href="#" class="text-white-50 text-decoration-none">Empresas</a></li>
                                <li><a href="#" class="text-white-50 text-decoration-none">Contacto</a></li>
                            </ul>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3 mb-4 mb-lg-0">
                            <h5 class="fw-bold">Servicios</h5>
                            <ul class="list-unstyled">
                                <li><a href="#" class="text-white-50 text-decoration-none">Home</a></li>
                                <li><a href="#" class="text-white-50 text-decoration-none">About Us</a></li>
                                <li><a href="#" class="text-white-50 text-decoration-none">Servicios</a></li>
                                <li><a href="#" class="text-white-50 text-decoration-none">Empresas</a></li>
                                <li><a href="#" class="text-white-50 text-decoration-none">Contacto</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-md-4 col-lg-6">
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <h5 class="fw-bold">Información</h5>
                                    <ul class="list-unstyled">
                                        <li><span class="text-white-50">Número</span></li>
                                        <li><span class="text-white-50">Correo Electrónico</span></li>
                                        <li><span class="text-white-50">Dirección</span></li>
                                    </ul>
                                </div>
                                <div class="col-12">
                                    <h5 class="fw-bold">Horarios</h5>
                                    <p class="small text-white-50 mb-0">Lunes - Jueves (9:00 - 17:00)</p>
                                    <p class="small text-white-50 mb-0">Viernes (9:00 - 17:30)</p>
                                    <p class="small text-white-50 mb-0">Sábado y Domingo (Cerrado)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <p class="small text-white-50 mb-0">Copyright © 2024 All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    <div class="shape-bottom-orange"></div>
</div>






<?php wp_footer(); // Este es el único wp_footer() necesario al final del archivo ?>
</body>
</html>