<?php 
get_header(); ?> 
<main id="main-content">
        <?php  get_template_part('template-parts/section', 'hero'); ?>
        <?php get_template_part('template-parts/section', 'team-know-us-carousel'); ?>
        <?php get_template_part('template-parts/section', 'company-team-picture'); ?>
        <?php get_template_part('template-parts/section', 'call-to-action'); ?>
        <?php get_template_part('template-parts/section', 'info-block', ['index' => 0]); ?>
        <?php get_template_part('template-parts/section', 'info-block', ['index' => 1]); ?>
        <?php get_template_part('template-parts/section', 'partners'); ?>
        <?php get_template_part('template-parts/section', 'form-home'); ?>    
</main>


<?php get_footer(); ?>
