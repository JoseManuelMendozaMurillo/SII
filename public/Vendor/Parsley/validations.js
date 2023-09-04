//Parsley.js v2.9.2
export function customValidation() {
    $('.form-control.validation-email').each(function () {
      var $input = $(this);
      $input.attr('data-parsley-trigger','keyup');
      $input.attr('data-parsley-pattern','^[A-Za-z0-9]+@(itocotlan\.com)$');
      $input.attr('data-parsley-error-message','El correo electrónico debe tener un dominio itocotlan.com');
    });

    $('.form-control.validation-password').each(function () {
      var $input = $(this);
      $input.attr('data-parsley-trigger','keyup');
      $input.attr('data-parsley-minlength','8');
      $input.attr('data-parsley-minlength-message','La contraseña debe tener al menos 8 caracteres');
    });

    $('.form-control.validation-numerosolicitud').each(function () {
      var $input = $(this);
      $input.attr('data-parsley-trigger','keyup');
      $input.attr('data-parsley-pattern','^[0-9]{4}$');
      $input.attr('data-parsley-error-message','El numero de solicitud debe tener 4 digitos');
    });

    $('.form-control.validation-nip').each(function () {
      var $input = $(this);
      $input.attr('data-parsley-trigger','keyup');
      $input.attr('data-parsley-minlength','8');
      $input.attr('data-parsley-minlength-message','La contraseña debe tener al menos 8 caracteres');
    });
  
  }