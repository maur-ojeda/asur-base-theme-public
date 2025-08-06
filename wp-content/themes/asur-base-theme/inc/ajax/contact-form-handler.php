<?php

add_action('wp_ajax_handle_custom_contact_form', 'handle_custom_contact_form');
add_action('wp_ajax_nopriv_handle_custom_contact_form', 'handle_custom_contact_form');

function handle_custom_contact_form() {
    if (!isset($_POST['contact_form_id'])) {
        wp_send_json_error(['message' => 'ID de formulario no enviado.']);
    }

    $form_id = absint($_POST['contact_form_id']);
    $fields = carbon_get_post_meta($form_id, 'form_fields');

    $entry_data = [];
    foreach ($fields as $field) {
        $name = sanitize_text_field($field['field_name']);
        if (isset($_POST[$name])) {
            $entry_data[$name] = sanitize_text_field($_POST[$name]);
        }
    }

    file_put_contents(__DIR__ . '/debug.log', print_r($entry_data, true));

    
    $post_id = wp_insert_post([
        'post_type' => 'contact_submission',
        'post_title' => 'Envío de formulario ' . $form_id . ' - ' . current_time('Y-m-d H:i:s'),
        'post_status' => 'publish',
        'meta_input' => [
            'form_id' => $form_id,
            'form_data' => $entry_data,
        ],
    ]);


    


    // Enviar respuesta AJAX
    wp_send_json_success(['message' => 'Gracias por contactarnos. Te responderemos pronto.']);
}
