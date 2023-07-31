<?php

/**
 * .php-cs-fixer.php
 *
 * php-cs-fixer V 3.22.0
 *
 * Archivo de configuracion para php-cs-fixer (formateador de codigo para php)
 * Documentación oficial: https://github.com/PHP-CS-Fixer/PHP-CS-Fixer
 *
 * @author Jose Manuel Mendoza Murillo
 */

/**
 * Variable para configurar los archivos que seran ignorados
 *
 * Documentacion de esta parte: https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/config.rst
 */
$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->exclude('.devcontainer')
    ->exclude('.vscode')
    ->exclude('app/cache')
    ->exclude('app/Language')
    ->exclude('app/ThirdParty')
    ->notPath('app/Common.php')
    ->exclude('config')
    ->exclude('node_modules')
    ->exclude('public')
    ->exclude('scripts')
    ->exclude('system')
    ->exclude('tests')
    ->exclude('vendor')
    ->exclude('writable')
    ->notPath('preload.php')
    ->name('*.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

/**
 * Configuración de las reglas para el proyecto
 *
 * Documentacion de las reglas: https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/rules/index.rst
*/
$config = new PhpCsFixer\Config();

return $config
->setRules([
    '@PSR12' => true,
    'array_indentation' => true,
    'no_empty_comment' => true,
    'no_empty_phpdoc' => true,
    'no_empty_statement' => true,
    'no_whitespace_in_blank_line' => true,
    'phpdoc_align' => true,
    'phpdoc_separation' => true,
    'phpdoc_single_line_var_spacing' => true,
    'phpdoc_types' => true,
    'binary_operator_spaces' => true,
    'single_space_around_construct' => true,
    'include' => true,
    'trailing_comma_in_multiline' => ['elements' => ['arrays']],
    'array_syntax' => ['syntax' => 'short'], // array(1,2) --> [1,2]
    'combine_consecutive_unsets' => true, // unset($a); unset($b); --> unset($a, $b);
    'single_quote' => true, // $a = "sample"; --> $a = 'sample';
    'cast_spaces' => true, // $foo = ( int )$b; --> $foo = (int) $b;
    'concat_space' => ['spacing' => 'one'], // $foo = 'bar'.3.'baz'.'qux'; --> $foo = 'bar' . 3 . 'baz' . 'qux';
    'type_declaration_spaces' => true, // private bool   $b; --> private bool $b;
    'single_line_comment_style' => ['comment_types' => ['hash']], // <?php # comment --> <?php // comment
    'lowercase_cast' => true, // $a = (FLoaT) $b; --> $a = (float) $b;
    'native_function_casing' => true, // STRLEN($str); --> strlen($str);
    'no_blank_lines_after_phpdoc' => true, // Despues de un comentario para documentar no habras espacios en blanco
    'no_mixed_echo_print' => ['use' => 'echo'], // print 'example'; --> echo 'example';
    'no_short_bool_cast' => true, // $a = !!$b; --> $a = (bool) $b;
    'no_singleline_whitespace_before_semicolons' => true, // $this->foo() ; --> $this->foo();
    'no_spaces_around_offset' => true, // $sample = $b [ 'a' ] [ 'b' ]; --> $sample = $b['a']['b'];
    'no_whitespace_before_comma_in_array' => true, // $x = [1 , "2" , 3]; --> $x = [1, "2", 3];
    'normalize_index_brace' => true, // echo $sample{$index}; --> echo $sample[$index];
    'object_operator_without_whitespace' => true, // $a  ->  b; --> $a->b;
    'increment_style' => ['style' => 'post'], // ++$a; --> $a++;
    'standardize_not_equals' => true, // $a = $b <> $c; --> $a = $b != $c;
    'trim_array_spaces' => true, // $sample = array( 'a', 'b' ); --> $sample = array('a', 'b');
    'unary_operator_spaces' => true, // $sample = ! ! $a; --> $sample = !!$a;
    'whitespace_after_comma_in_array' => ['ensure_single_space' => true], // $sample = array(1,'a',$b,); --> $sample = array(1, 'a', $b);
    'space_after_semicolon' => true, // sample();$test = 2; --> sample(); $test = 1;
    /**
     * return 1 + 2
     * ;
     * --> return 1 + 2;
     */
    'multiline_whitespace_before_semicolons' => ['strategy' => 'no_multi_line'],
    /**
     * $a = array[1
     *            => 2];
     * --> $a = array[1 => 2];
     */
    'no_multiline_whitespace_around_double_arrow' => true,

    /**
     * Configuracion de espacios dentro de clases
     * Documentacion de esta regla: https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/rules/class_notation/class_attributes_separation.rst
    */
    'class_attributes_separation' => [
        'elements' => [
            'method' => 'one',
            'const' => 'only_if_meta',
            'property' => 'only_if_meta',
            'trait_import' => 'none',
            'case' => 'none',
        ],
    ],

    /**
     * Configuracion de espacios antes de cada declaración
     * Documentacion de esta regla: https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/rules/whitespace/blank_line_before_statement.rst
     */
    'blank_line_before_statement' => [
        // Un espacio en blanco antes de cada una de estas declaraciones:
        'statements' => [
            'break', 'continue', 'declare', 'return', 'throw', 'try', 'case', 'default', 'do', 'switch',
        ],
    ],

    /**
     * Configuracion de espacios antes y despues de cada declaracion
     * Documentacion de esta regla: https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/rules/whitespace/no_extra_blank_lines.rst
     */
    'no_extra_blank_lines' => [
        'tokens' => [
            'curly_brace_block', 'extra', 'throw', 'use',
        ],
    ],

    /**
     * Si una lista de valores separados por una coma está contenida en una sola línea, el último
     * elemento NO DEBE tener una coma al final.
     * Documentación de esta regla: https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/rules/basic/no_trailing_comma_in_singleline.rst
     */
    'no_trailing_comma_in_singleline' => [
        'elements' => [
            'arguments', 'array_destructuring', 'array', 'group_import',
        ],
    ],

    /**
     * Elimina los paréntesis innecesarios alrededor de las sentencias de control.
     * Documentacion de esta regla: https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/master/doc/rules/control_structure/no_unneeded_control_parentheses.rst
     */
    'no_unneeded_control_parentheses' => [
        'statements' => [
            'break', 'clone', 'continue', 'echo_print', 'return', 'switch_case', 'yield',
        ],
    ],
])
->setLineEnding("\n")
->setFinder($finder);
