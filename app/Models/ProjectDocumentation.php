<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectDocumentation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'project_id',
        'document_name',
        'document_path',
        'details_received',
        'document_type',
        'submission_date',
        'wcr_date',
        'wcr_status',
        'status',
        'remarks'
    ];

}
