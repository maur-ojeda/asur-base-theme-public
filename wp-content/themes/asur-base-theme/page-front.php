<?php
/* Template Name: Front Page OnePage */
get_header();

$default_image = 'https://placehold.co/600x400@2x.png';
$default_image_features = 'https://placehold.co/350x400.png';

?>




<main id="main-content d-none">
    <?php get_template_part('template-parts/section', 'hero');  ?>
    <?php get_template_part('template-parts/section', 'us');  ?>
    <?php get_template_part('template-parts/section', 'call-to-action');  ?>
    <?php get_template_part('template-parts/section', 'investors');  ?>
    <?php //revisar ancho  ?>
    <?php get_template_part('template-parts/section', 'featured-project');  ?>
    <?php get_template_part('template-parts/section', 'projects');  ?>
    <?php  get_template_part('template-parts/section', 'contact'); ?>
 <?php //revisar ancho  ?>
</main>

<?php get_footer(); ?>
