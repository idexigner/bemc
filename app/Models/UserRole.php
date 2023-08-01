<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserRole extends Model
{
    use HasFactory;
    protected $table = 'user_role';
    protected $primaryKey = 'role_id';
    // public $timestamps = true;
    // const CREATED_AT = 'role_created_at';
    // const UPDATED_AT = 'role_updated_by';

    protected $fillable = [
        'role_name',
        'role_is_active',
        'role_is_deleted',
        'role_created_by',
        'role_updated_by',
    ];

    protected static function booted()
    {

        static::creating(function ($model) {
            $model->role_created_by = Auth::id();
            $model->role_updated_by = Auth::id();
            $model->role_created_at = $model->freshTimestamp();
            
        });

        static::updating(function ($model) {
            $model->role_updated_by = Auth::id();
            $model->role_updated_at = $model->freshTimestamp();
        });
    }

}
