//Parsley.js v2.9.2
export function customValidation() {
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
        case 'curp':
          $input.attr('data-parsley-length', '[18, 18]');
          $input.attr('data-parsley-pattern', '^[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9A-Z]{2}$')
          $input.attr('data-parsley-length-message', 'Este campo debe tener exactamente 18 caracteres.');
          $input.attr('data-parsley-error-message', 'Ingresa una CURP válida.');
          break;
        case 'fullName':
          $input.attr('data-parsley-pattern', '^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]+(\\s[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]+)*$');
          $input.attr('data-parsley-error-message', 'No puede ingresar números o caracteres especiales');
          break;
        case 'birthdate':
          $input.attr('data-parsley-customdate', 'today');
          $input.attr('data-parsley-error-message', 'Ingresa una fecha de nacimiento válida.');
          $input.attr('data-parsley-trigger', 'change');
          break;
        case 'phone':
          $input.attr('data-parsley-pattern', '^[0-9]{10}$');
          $input.attr('data-parsley-error-message', 'Ingresa un número de teléfono válido de 10 dígitos.');
          break;
        case 'emailB':
          $input.attr('data-parsley-type','email');
          $input.attr('data-parsley-error-message','Ingresa una dirección de correo electrónico válida.');
          break;
        case 'cp':
          $input.attr('data-parsley-pattern', '^[0-9]{5}$');
          $input.attr('data-parsley-error-message','Ingresa un código postal válido de 5 dígitos.');
          break;
        default:
        case 'col':
          $input.attr('data-parsley-pattern', '^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\\.]+(\\s+[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]+\\.?)*$');
          $input.attr('data-parsley-error-message','Ingresa una colonia válida.');
          break;
        case 'calle':
          $input.attr('data-parsley-pattern', '^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ0-9\\.]+(\\s[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ0-9]+)*$');
          $input.attr('data-parsley-error-message', 'Ingresa una calle válida.');
          break;
          case 'num':
            $input.attr('data-parsley-pattern', '^\\d+(?:[a-zA-Z]{1,2})?$');
            $input.attr('data-parsley-error-message', 'Ingresa un valor válido (números con opcionalmente una o dos letras al final).');
            break;
          
      }
    })
  }
