<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        //Si el usuario no esta autenticado, lo redirigimos al login
        if (!auth()->loggedIn()) {
            return redirect()->route('auth/login');
        }

        // //Verificamos los permisos de acceso
        // $path = explode("/",$request->getPath())[0];
        // if($path === "informacion" || $path === "pruebas" && auth()->user()->can())
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
