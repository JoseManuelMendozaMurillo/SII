//Parsley.js v2.9.2
export function customValidation() {
    $('[data-validation]').each(function () {
      var $input = $(this);
      var $inputType = $input.data('validation');
      $input.attr('data-parsley-trigger','keyup');
     
      switch ($inputType) {
        case 'curp':
          $.validator.addValidator('fechaNacimiento', function (value, element) {
            var dia = parseInt(value.substr(10, 2), 10);
            var mes = parseInt(value.substr(12, 2), 10);
            
            if (mes < 1 || mes > 12) {
            return false;
            }
            
            if (dia < 1 || dia > 31) {
            return false;
            }
            
            return true;
            }, 'La fecha de nacimiento no es válida.');
            
            // Agrega el validador a la CURP
            
            $.validator.addConstraints('curp', {
            fechaNacimiento: true
            });

          $input.attr('data-parsley-length', '[18, 18]');
          $input.attr('data−parsley−pattern','[A−Z]4[0−9]6[A−Z]6[0−9A−Z]2');
          $input.attr('data-parsley-length-message', 'Este campo debe tener exactamente 18 caracteres.');
          $input.attr('data-parsley-error-message', 'Ingresa una CURP válida.');
          $input.attr('data-parsley-required','');
          break;
        case 'fullName':
          $input.attr('data-parsley-pattern', '^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]+(\\s[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]+)*$');
          $input.attr('data-parsley-error-message', 'No puede ingresar números o caracteres especiales');
          $input.attr('data-parsley-required','');
          break;
        case 'birthdate':
          $input.attr('data-parsley-customdate', 'today');
          $input.attr('data-parsley-error-message', 'Ingresa una fecha de nacimiento válida.');
          $input.attr('data-parsley-trigger', 'change');
          $input.attr('data-parsley-required','');
          break;
        case 'phone':
          $input.attr('data-parsley-pattern', '^[0-9]{10}$');
          $input.attr('data-parsley-error-message', 'Ingresa un número de teléfono válido de 10 dígitos.');
          $input.attr('data-parsley-required','');
          break;
        case 'emailB':
          $input.attr('data-parsley-type','email');
          $input.attr('data-parsley-error-message','Ingresa una dirección de correo electrónico válida.');
          $input.attr('data-parsley-required','');
          break;
        case 'cp':
          $input.attr('data-parsley-pattern', '^[0-9]{5}$');
          $input.attr('data-parsley-error-message','Ingresa un código postal válido de 5 dígitos.');
          $input.attr('data-parsley-required','');
          break;
        case 'col':
          $input.attr('data-parsley-pattern', '^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ0-9\\.]+(\\s+[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ0-9]+\\.?)*$');
          $input.attr('data-parsley-error-message','Ingresa una colonia válida.');
          $input.attr('data-parsley-required','');
          break;
        case 'calle':
          $input.attr('data-parsley-pattern', '^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ0-9\\.]+(\\s[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ0-9]+)*$');
          $input.attr('data-parsley-error-message', 'Ingresa una calle válida.');
          $input.attr('data-parsley-required','');
          break;
        case 'num': // No se usa
          $input.attr('data-parsley-pattern', '^\\d+(?:[a-zA-Z]{1,2})?$');
          $input.attr('data-parsley-error-message', 'Ingresa un valor válido (números con opcionalmente una o dos letras al final).');
          $input.attr('data-parsley-required','');
          break;
        case 'entreCalles':
          $input.attr('data-parsley-pattern', '^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ0-9\\.]+(\\s[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ0-9]+\\.*)*$');
          $input.attr('data-parsley-error-message', 'Ingresa un valor válido (opcionalmente números y puntos al final de cada palabra).');
          $input.attr('data-parsley-required','');
          break;
        case 'egreso':
          $input.attr('data-parsley-pattern', '^[0-9]{4}$');
          $input.attr('data-parsley-error-message', 'Ingresa un año válido (formato: YYYY).');
          $input.attr('data-parsley-required','');
          break;
        case 'promedio':
          $input.attr('data-parsley-pattern', '^(?:100|[0-9]?[0-9](?:\\.[0-9]{1,2})?)$');
          $input.attr('data-parsley-error-message', 'Ingresa un promedio válido (por ejemplo, 95.5).');
          $input.attr('data-parsley-required','');
          break;
        case 'discapacidad':
          $input.attr('data-parsley-pattern', '^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]+(\\s[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]+)*$');
          $input.attr('data-parsley-error-message', 'Ingresa un valor valido (Sin numeros y/o caracteres especiales)');
          break;
        default:
      }
    })

    // Agregamos a grupos a los inputs de las diferentes secciones del formulario para validarlos por
    // separado
    $('#sectionPersonalInfo').find(':input').attr('data-parsley-group', 'sectionPersonalInfo');
    $('#sectionSolicitudeInfo').find(':input').attr('data-parsley-group', 'sectionSolicitudeInfo');
    $('#sectionSocioeconomicInfo').find(':input').attr('data-parsley-group', 'sectionSocioeconomicInfo');

  }
  
