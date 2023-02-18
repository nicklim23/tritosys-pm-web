<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Laravel\Passport\Token;

class AuthToken extends Token
{
    protected $connection = 'tenant';
}
