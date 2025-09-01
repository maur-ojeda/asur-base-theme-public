<?php get_header(); ?>

<?php
$current_term = get_queried_object();
$custom_title = carbon_get_term_meta($current_term->term_id, 'taxonomy_custom_title');
$custom_over_title = carbon_get_term_meta($current_term->term_id, 'taxonomy_custom_over_title');

// Obtiene el objeto del término "Ficha Técnica" una vez, fuera del bucle
$ficha_tecnica_term = get_term_by('slug', 'ficha-tecnica', 'tipo_info');
$ficha_tecnica_id = $ficha_tecnica_term ? $ficha_tecnica_term->term_id : 0;
?>

<div class="container py-5">
     <div class="row mb-4">
        <div class="col-12">
            <h6 class="text-uppercase fw-bold custom-orange"><?= $custom_over_title ?></h6>
            <h1 class="display-5 fw-bold"><?php echo $custom_title ? esc_html($custom_title) : single_term_title('', false); ?></h1>
        </div>
    </div>

    <div class="row g-4 justify-content-center">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>

                <?php
                // Obtiene los términos de la taxonomía 'tecnologia' para el post actual.
                $tecnologia_terms = get_the_terms(get_the_ID(), 'tecnologia');
                $back_link = '';
                if ($tecnologia_terms && !is_wp_error($tecnologia_terms)) {
                    $tecnologia_term = array_shift($tecnologia_terms);
                    $back_link = get_term_link($tecnologia_term);
                }

                // Obtiene todos los materiales de apoyo de Carbon Fields
                $materiales_apoyo = carbon_get_the_post_meta('crb_material_apoyo');
                $ficha_tecnica_link = '';

                // Bucle para buscar el archivo de la ficha técnica
                if (!empty($materiales_apoyo)) {
                    foreach ($materiales_apoyo as $material) {
                            $ficha_tecnica_link = $material['archivo_material'];                            
                            break;
                        
                    }
                }
                ?>

                <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                    <div class="card border-0 h-100 shadow-sm">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url('medium'); ?>" class="card-img-top" alt="<?php the_title_attribute(); ?>">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title fw-bold"><?php the_title(); ?></h5>
                            <p class="card-text"><?php the_excerpt(); ?></p>
                        </div>
                        <div class="card-footer bg-white border-0">
                            <a href="<?php the_permalink(); ?>" class="btn btn-krom">Ver Producto <i data-lucide="arrow-right"></i></a>
                            



                            <?php if ($ficha_tecnica_link) : ?>
                                <a href="<?php echo esc_url($ficha_tecnica_link); ?>" class="btn btn-krom" download>Descargar Ficha Técnica <i data-lucide="download"></i></a>
                            <?php endif; ?>

                            <?php if ($back_link) : ?>
                                <a href="<?php echo esc_url($back_link); ?>" class="btn btn-krom">Volver <i data-lucide="arrow-left"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else : ?>
            <div class="col-12">
                <p>No se encontraron productos para este fabricante.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>