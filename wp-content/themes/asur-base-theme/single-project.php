
<main class="container py-5">
    <h1><?php the_title(); ?></h1>
    <?php if (has_post_thumbnail()) : ?>
        <div class="mb-4">
            <?php the_post_thumbnail('large', ['class' => 'img-fluid']); ?>
        </div>
    <?php endif; ?>

    <h3><?= esc_html(carbon_get_the_post_meta('subtitulo_proyecto')); ?></h3>

    <div class="contenido">
        <?php the_content(); ?>
    </div>

    <?php if ($link = carbon_get_the_post_meta('link_proyecto')) : ?>
        <a href="<?= esc_url($link); ?>" class="btn btn-secondary mt-3" target="_blank">Ver sitio</a>
    <?php endif; ?>
</main>

