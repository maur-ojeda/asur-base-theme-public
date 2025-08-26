<?php get_header(); ?>

<main id="main-content" class="container">
    <div class="row">
        <div class="col-12">
            <h1><?php single_term_title(); ?></h1>
            <div class="taxonomy-description">
                <?php echo term_description(); ?>
            </div>
        </div>
    </div>
    
    <?php
    // Obtiene el término de industria actual
    $current_term = get_queried_object();
    
    // Encuentra los términos del siguiente nivel (Líneas de Producto)
    $child_terms = get_terms([
        'taxonomy'   => 'linea_producto',
        'hide_empty' => false,
        'parent'     => 0, // Esto busca términos de nivel superior
        // Aquí podrías filtrar por la taxonomía de la industria si lo necesitas,
        // pero para simplificar, se muestran todas las líneas de producto.
    ]);

    if (!empty($child_terms) && !is_wp_error($child_terms)) :
    ?>
    <div class="row mt-4">
        <div class="col-12">
            <h2>Líneas de Producto</h2>
            <ul class="list-unstyled d-flex flex-wrap gap-3">
                <?php foreach ($child_terms as $child_term) : ?>
                    <li class="p-3 border rounded">
                        <a href="<?php echo esc_url(get_term_link($child_term)); ?>">
                            <?php echo esc_html($child_term->name); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <?php endif; ?>

    <hr>

    <div class="row mt-4">
        <div class="col-12">
            <h2>Productos Directamente Asociados</h2>
        </div>
        <?php
        // Bucle para mostrar los productos de la industria actual
        if (have_posts()) : while (have_posts()) : the_post();
        ?>
            <div class="col-md-4 mb-4">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail-wrapper">
                                <?php the_post_thumbnail('medium'); ?>
                            </div>
                        <?php endif; ?>
                        <h3><?php the_title(); ?></h3>
                    </a>
                </article>
            </div>
        <?php endwhile; else : ?>
            <div class="col-12">
                <p>No hay productos asignados directamente a esta industria.</p>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>