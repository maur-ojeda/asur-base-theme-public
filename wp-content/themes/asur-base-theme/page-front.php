<?php
/* Template Name: Front Page OnePage */
get_header();
?>

<main id="main-content d-none">
        <?php get_template_part('template-parts/section', 'hero'); ?>
        




<? // php get_template_part('template-parts/section', 'us');  ?>
<section id="">
    <div class="alert alert-secondary" role="alert">
    Nosotros
    </div>
</section>


<? // php get_template_part('template-parts/section', 'call-to-action-00');  ?>
<section id="">
    <div class="alert alert-secondary" role="alert">
    call-to-action-00
    </div>
</section>


<? // php get_template_part('template-parts/section', '');  ?>
<section id="">
    <div class="alert alert-secondary" role="alert">
    tipo de inversionistas
    </div>
</section>


<? // php get_template_part('template-parts/section', '');  ?>
<section id="">
    <div class="alert alert-secondary" role="alert">
    producto destacado
    </div>
</section>


<? // php get_template_part('template-parts/section', '');  ?>
<section id="">
    <div class="alert alert-secondary" role="alert">
    Proyectos destacados
    </div>
</section>


<?php // get_template_part('template-parts/section', 'contact'); ?>

<section >
    <div class="alert alert-secondary" role="alert">
    Contacto
    </div>
</section>



        <?php // get_template_part('template-parts/section', 'services'); ?>
        <?php // get_template_part('template-parts/section', 'whatwedo'); ?>
        <?php // get_template_part('template-parts/section', 'products'); ?>
        <?php // get_template_part('template-parts/section', 'gallerie'); ?>
        <?php // get_template_part('template-parts/section', 'clients'); ?>
        <?php // get_template_part('template-parts/section', 'testimonial'); ?>
        <?php // get_template_part('template-parts/section', 'contact'); ?>
    </main>

<?php get_footer(); ?>
