//Parsley.js v2.9.2
export function customValidation() {
    $('.form-control.validation-email').each(function () {
      var $input = $(this);
      $input.attr('data-parsley-trigger','keyup');
      $input.attr('data-parsley-required','');
<<<<<<< HEAD
      
      switch ($inputType) {
        case 'email':
          $input.attr('data-parsley-type','email');
          $input.attr('data-parsley-pattern','^[A-Za-z0-9]+@(itocotlan\.com)$');
          $input.attr('data-parsley-error-message','El correo electrónico debe tener un dominio itocotlan.com');
          break;
        case 'password':
          $input.attr('data-parsley-minlength','8');
          $input.attr('data-parsley-minlength-message','La contraseña debe tener al menos 8 caracteres');
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
        case 'col':
          $input.attr('data-parsley-pattern', '^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\\.]+(\\s+[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]+\\.?)*$');
          $input.attr('data-parsley-error-message','Ingresa una colonia válida.');
          break;
        case 'calle':
          $input.attr('data-parsley-pattern', '^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ0-9\\.]+(\\s[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ0-9]+)*$');
          $input.attr('data-parsley-error-message', 'Ingresa una calle válida.');
          break;
        case 'num':
          $input.attr('data-parsley-pattern', '^[0-9]{2}?$');
          $input.attr('data-parsley-error-message', 'Ingresa un valor válido (números con opcionalmente una o dos letras al final).');
          break;
        case 'entreCalles':
          $input.attr('data-parsley-pattern', '^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ0-9\\.]+(\\s[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ0-9]+\\.*)*$');
          $input.attr('data-parsley-error-message', 'Ingresa un valor válido (opcionalmente números y puntos al final de cada palabra).');
          break;
        case 'egreso':
          $input.attr('data-parsley-pattern', '^[0-9]{4}$');
          $input.attr('data-parsley-error-message', 'Ingresa un año válido (formato: YYYY).');
          break;
        case 'promedio':
          $input.attr('data-parsley-pattern', '^(?:100|[0-9]?[0-9](?:\\.[0-9]{1,2})?)$');
          $input.attr('data-parsley-error-message', 'Ingresa un promedio válido (por ejemplo, 95.5).');
          break;
        case 'oneLetter':
          $input.attr('data-parsley-pattern', '^[a-zA-Z]{1,4}$');
          $input.attr('data-parsley-error-message', 'Solo pueden ingresar hasta cuatro letras');
          $input.attr('data-parsley-required', false);
        default:
      }
    })
=======
      $input.attr('data-parsley-type','email');
      $input.attr('data-parsley-pattern','^[A-Za-z0-9]+@(itocotlan\.com)$');
      $input.attr('data-parsley-error-message','El correo electrónico debe tener un dominio itocotlan.com');
    });

    $('.form-control.validation-password').each(function () {
      var $input = $(this);
      $input.attr('data-parsley-trigger','keyup');
      $input.attr('data-parsley-required','');
      $input.attr('data-parsley-minlength','8');
      $input.attr('data-parsley-minlength-message','La contraseña debe tener al menos 8 caracteres');
    });

    $('.form-control.validation-numerosolicitud').each(function () {
      var $input = $(this);
      $input.attr('data-parsley-trigger','keyup');
      $input.attr('data-parsley-required','');
      $input.attr('data-parsley-pattern','^[0-9]{4}$');
      $input.attr('data-parsley-error-message','El numero de solicitud debe tener 4 digitos');
    });

    $('.form-control.validation-nip').each(function () {
      var $input = $(this);
      $input.attr('data-parsley-trigger','keyup');
      $input.attr('data-parsley-required','');
      $input.attr('data-parsley-minlength','8');
      $input.attr('data-parsley-minlength-message','La contraseña debe tener al menos 8 caracteres');
    });
>>>>>>> 4c3b5155cdad439b1ef653b4d658d468597b116b
  }
