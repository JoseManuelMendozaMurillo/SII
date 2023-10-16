<?php

namespace App\Libraries;

class InstitutionalEmail
{
    public function __construct()
    {
    }

    public function getEmail($controlNumber)
    {
        return $controlNumber . '@itocotlan.com';
    }
}
