<?php

function render_contact_form_shortcode($atts) {
    $atts = shortcode_atts([
        'id' => 0,
    ], $atts);

    $form_id = (int) $atts['id'];
    if (!$form_id) return '';

    $fields = carbon_get_post_meta($form_id, 'form_fields');
    $recipient = carbon_get_post_meta($form_id, 'recipient_email');
    $success_message = carbon_get_post_meta($form_id, 'success_message');
    $submit_text = carbon_get_post_meta($form_id, 'submit_button_text') ?: 'Enviar';

    ob_start(); ?>

    <form method="post" class="contact-form" data-form-id="<?= esc_attr($form_id); ?>">
        <input type="hidden" name="contact_form_id" value="<?= esc_attr($form_id); ?>">

        <?php foreach ($fields as $field): ?>
            <?php
            $name = esc_attr($field['field_name']);
            $label = esc_html($field['field_label']);
            $type = esc_attr($field['field_type']);
            $required = !empty($field['field_required']) ? 'required' : '';
            ?>

            <div class="mb-3">
                <label for="<?= $name ?>"><?= $label ?> <?= $required ? '*' : '' ?></label>
                <?php if ($type === 'textarea'): ?>
                    <textarea name="<?= $name ?>" id="<?= $name ?>" class="form-control" <?= $required ?>></textarea>
                <?php else: ?>
                    <input type="<?= $type ?>" name="<?= $name ?>" id="<?= $name ?>" class="form-control" <?= $required ?>>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>

        <button type="submit" class="btn btn-primary rounded-pill hvr-icon-wobble-horizontal">        
        
        <?= esc_html($submit_text); ?> <i class="hvr-icon" data-lucide="chevron-right"></i></button>
        <div class="form-response mt-2" style="display: none;"></div>
    </form>

    <?php return ob_get_clean();
}
add_shortcode('contact_form', 'render_contact_form_shortcode');
