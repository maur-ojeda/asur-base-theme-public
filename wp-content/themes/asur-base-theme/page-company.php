<?php 
get_header(); ?> 
<main id="main-content">
        <?php  get_template_part('template-parts/section', 'hero'); ?>
        <?php get_template_part('template-parts/section', 'info-block', ['index' => 0]); ?>
        <?php get_template_part('template-parts/section', 'company-info-carousel'); ?>
        <?php get_template_part('template-parts/section', 'info-block', ['index' => 1]); ?>
        <?php get_template_part('template-parts/section', 'company-team-picture'); ?>
        <?php get_template_part('template-parts/section', 'info-block', ['index' => 2]); ?>
        <?php get_template_part('template-parts/section', 'service-cycle'); ?>
        <?php get_template_part('template-parts/section', 'info-block', ['index' => 3]); ?>
        <?php get_template_part('template-parts/section', 'info-block', ['index' => 4]); ?>    
        <?php get_template_part('template-parts/section', 'innovation-projects-carousel'); ?>
        <?php get_template_part('template-parts/section', 'service-cyc
        le'); ?>
        <?php get_template_part('template-parts/section', 'partners'); ?>
        <?php get_template_part('template-parts/section', 'form-home'); ?>    
</main>


<?php get_footer(); ?>
