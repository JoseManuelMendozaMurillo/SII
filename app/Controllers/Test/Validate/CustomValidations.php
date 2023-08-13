<?php

namespace App\Controllers\Test\Validate;

class CustomValidations
{
    public function validateEmail(string $str, string $fields, array $data): bool
    {
        return (bool) preg_match('/^[A-Za-z0-9]+@(itocotlan\.com)$/', $str);
    }
}
