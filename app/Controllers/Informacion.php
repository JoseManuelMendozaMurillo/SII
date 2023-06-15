<?php

namespace App\Controllers;

class Informacion extends BaseController
{
    public function index()
    {
        phpinfo(); 
    }
}
