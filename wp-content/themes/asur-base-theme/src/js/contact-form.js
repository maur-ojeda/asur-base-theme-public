//doc sdhjshdjsjdj
jQuery(document).ready(function($) {
  $('.contact-form').on('submit', function(e) {
    e.preventDefault();

    const $form = $(this);
    const formData = $form.serialize();

    $.ajax({
      url: my_ajax_object.ajax_url,
      method: 'POST',
      data: formData + '&action=handle_custom_contact_form',
      success: function(response) {
        if (response.success) {
          $form.find('.form-response').text(response.data.message).show();
          $form[0].reset();
        } else {
          $form.find('.form-response').text(response.data.message).show();
        }
      },
      error: function(xhr) {
        $form.find('.form-response').text('Error al enviar el formulario.').show();
        console.error('AJAX error:', xhr.responseText);
      }
    });
  });
});
