<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    // protected $connection = 'tenant';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'level',
        'view_attendance_list',
        'view_attendance_summary',
        'view_holiday',
        'view_leave',
        'view_claim',
        'view_category',
        'view_asset',
        'view_asset_tracking',
        'view_profile',
        'view_role',
        'view_group',
        'add_holiday',
        'add_leave',
        'add_claim',
        'add_category',
        'add_asset',
        'add_asset_tracking',
        'add_profile',
        'add_role',
        'add_group',
        'edit_attendance',
        'edit_holiday',
        'edit_leave',
        'edit_claim',
        'edit_category',
        'edit_asset',
        'edit_asset_tracking',
        'edit_profile',
        'edit_role',
        'edit_group',
        'delete_holiday',
        'delete_leave',
        'delete_claim',
        'delete_category',
        'delete_asset',
        'delete_asset_tracking',
        'delete_profile',
        'delete_role',
        'delete_group',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'deleted_at' => 'datetime:Y-m-d H:i:s',
    ];

    /**
     * Get the date created.=
     */
    public function getCreatedAtAttribute($value)
    {
        return date('Y-m-d', strtotime($value));
    }

    public function rolePermissions()
    {
        return $this->hasMany(RolePermission::class);
    }
}
