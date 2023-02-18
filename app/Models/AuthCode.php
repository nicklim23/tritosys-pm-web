<?php

namespace App\Models;
use Laravel\Passport\AuthCode as Auth;

class AuthCode extends Auth
{
    protected $connection = 'tenant';
}
