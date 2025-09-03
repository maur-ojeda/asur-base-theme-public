
<?php

$wsp = carbon_get_theme_option('projects_section_is_visible');


?>



<div class="header">

<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-transparent transition-navbar py-3">

  <div class="container" data-aos="fade-up" data-aos-delay="400">


  

    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <?php
        // Obtener logos del personalizador
        $white_logo_url = get_theme_mod( 'white_logo' );
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $color_logo_url = $custom_logo_id ? wp_get_attachment_image_url( $custom_logo_id, 'full' ) : '';
        ?>

        <?php if ( $white_logo_url ) : ?>
            <img src="<?php echo ensure_https( $white_logo_url ); ?>" alt="<?php bloginfo( 'name' ); ?> Logo" class="logo-white" style="height: 65px; width: auto;">
        <?php endif; ?>
        
        <?php if ( $color_logo_url ) : ?>
            <img src="<?php echo ensure_https( $color_logo_url ); ?>" alt="<?php bloginfo( 'name' ); ?> Logo" class="logo-color" style="height: 65px; width: auto;">
        <?php else : // Fallback si no hay logos, muestra el nombre del sitio ?>
            <span class="logo-text"><?php bloginfo( 'name' ); ?></span>
        <?php endif; ?>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
            <?php
            wp_nav_menu([
                'theme_location' => 'main_menu',
                'menu_class'     => 'navbar-nav',
                'container'      => false,
                'walker'         => new Bootstrap_5_Walker_Nav_Menu(), 
                'depth'          => 4, // 👈 Ajusta la profundidad del menú aquí

            ]);
            
            ?>
            <div class="ms-auto d-lg-inline-flex ">


            <a href="#" class="btn text-white ms-lg-3 d-none d-lg-inline-flex align-items-center">
               <i data-lucide="menu"></i>
            </a>

 <a href="#" class="btn text-white ms-lg-3 d-none d-lg-inline-flex align-items-center">
<i data-lucide="search"></i>
            </a>

            </div>
           
        </div>
  </div>
</nav>

</div>