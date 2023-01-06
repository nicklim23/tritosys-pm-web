<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $connection = 'tenant';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];
    protected $fillable = [
        'email',
        'password',
        'reset_password_token',
        'name',
        'company_id',
        'role_id',
        'group_id',
        'type_id',
        'status',
        'permanent_address',
        'identification_number',
        'date_of_birth',
        'join_date',
        'place_of_birth',
        'gender',
        'nationality',
        'race',
        'religion',
        'marital_status',
        'height',
        'weight',
        'house_office_telephone',
        'handphone',
        'expected_salary',
        'written_language',
        'spoken_language',
        'computer_skills',
        'others_qualification',
        'hobbies',
        'spouse_name',
        'spouse_contact',
        'spouse_occupation',
        'spouse_ic',
        'spouse_address_employer',
        'annual_leave',
        'medical_leave',
        'maternity_leave',
        'paternity_leave',
        'compassionate_leave',
        'marriage_leave',
        'profile_pic',
        'service_year',
        'service_month',
        'confirmation_date',
        'resign_date',
        'service_day',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
