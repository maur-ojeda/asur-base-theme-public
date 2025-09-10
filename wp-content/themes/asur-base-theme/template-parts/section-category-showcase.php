<?php
// Obtener los datos del post de destacados pasados por set_query_var
$post = get_query_var('showcase_data');

if ($post) :
    // Obtener los datos del campo 'complex' del post específico
    $destacados = carbon_get_post_meta($post->ID, 'crb_destacados_agrupados');
    
    if (!empty($destacados)) :
?>
<section class="category-showcase">


    <div class="container-fluid">
        <div class="row">
            <?php foreach ($destacados as $bloque) :
                $term_data = $bloque['taxonomia_destacada'];
                
                if (empty($term_data)) {
                    continue; 
                }
                
                $term = get_term($term_data[0]['id']);
                
                if (is_wp_error($term)) {
                    continue; 
                }
                $image_id = $bloque['image'];
                $image_url = wp_get_attachment_image_url($image_id, 'large');
                $title = $term->name;
                $titleColor = !empty($bloque['title_color']) ? $bloque['title_color'] : '#FFF';                                                                        
                $btn_txt = 'Ver más';
                $btn_url = get_term_link($term);
            ?>


                <div class="category-showcase-item" style="background-image: url('<?php echo esc_url(ensure_https($image_url)); ?>')">
                    <div>    
                        <h3 class="category-showcase-title" style="color:<?= $titleColor ?>"  data-aos="fade" data-aos-delay="200"><?= esc_html($title); ?></h3>
                        <a class="btn-krom" href="<?= esc_url($btn_url); ?>"><?= esc_html($btn_txt); ?><i data-lucide="arrow-right"></i></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; endif; ?>