<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\PersonalAccessClient;

class AuthPersonalAccessClient extends PersonalAccessClient
{
    protected $connection = 'tenant';
}
