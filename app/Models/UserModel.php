<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $allowedFields = ['email', 'password']; // 'email' y 'password' son los campos que deberian existir
}
