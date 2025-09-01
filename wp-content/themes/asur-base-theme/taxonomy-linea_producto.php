<?php
$current_term = get_queried_object();
$custom_title = carbon_get_term_meta($current_term->term_id, 'taxonomy_custom_title');
$custom_over_title = carbon_get_term_meta($current_term->term_id, 'taxonomy_custom_over_title');

$child_terms = get_terms([
'taxonomy'   => 'familia_producto',
'hide_empty' => false,
    'meta_query' => [
            [
                'key'     => '_crb_linea_producto_parent',
                'value'   => $current_term->term_id,
                'compare' => 'LIKE',
            ],
        ],

]);
?>

<?php get_header(); ?>


<div class="container py-5">
    <div class="row mb-4">
         <div class="col-12">
            <h6 class="text-uppercase fw-bold custom-orange"><?php echo esc_html($custom_over_title); ?></h6>
            <h1 class="display-5 fw-bold"><?php echo $custom_title ? esc_html($custom_title) : single_term_title('', false); ?></h1>
</div>
    </div>





    
    <div class="row g-4 justify-content-center">
   
    <?php    

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
          
<div class="d-none">
<?php get_footer(); ?>
</div>
