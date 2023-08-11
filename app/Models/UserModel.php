<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $allowedFields = ['email', 'password', 'application', 'nip'];
}
