<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectInstallation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'project_id',
        'scope',
        'team',
        'start_date',
        'complete_date',
        'week',
        'remarks'
    ];

}
