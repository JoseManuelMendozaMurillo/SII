//Parsley.js v2.9.2
function customValidation() {
    $('[data-validation]').each(function () {
      var $input = $(this);
      var $inputType = $input.data('validation');
      $input.attr('data-parsley-trigger','keyup');
      $input.attr('data-parsley-required','');
      
      switch ($inputType) {
        case 'email':
          $input.attr('data-parsley-type','email');
          $input.attr('data-parsley-pattern','^[A-Za-z0-9]+@(itocotlan\.com)$');
          $input.attr('data-parsley-error-message','El correo electrónico debe tener un dominio itocotlan.com');
          break;
        case 'password':
          $input.attr('data-parsley-minlength','8');
          $input.attr('data-parsley-minlength-message','La contrasenia debe tener al menos 8 caracteres');
          break;
        default:
          break;
      }
    })
  }
