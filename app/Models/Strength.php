<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Strength extends Model
{
    use HasFactory;
    protected $table = 'strength';
    protected $primaryKey = 'strength_id';
    public $timestamps = true;
    const CREATED_AT = 'strength_created_at';
    const UPDATED_AT = 'strength_updated_at';

    protected $fillable = [
        'strength_name',
        'strength_is_active',
        'strength_is_deleted',
        'strength_created_by',
        'strength_created_at',
        'strength_updated_by',
        'strength_updated_at'
    ];

    public function brands()
    {
        return $this->hasMany(Brand::class, 'brand_strength_id');
    }

    protected static function booted()
    {

        static::creating(function ($model) {
            $model->strength_created_by = 1; //Auth::id();
            $model->strength_updated_by = 1; //Auth::id();
            $model->strength_created_at = $model->freshTimestamp();
            
        });

        static::updating(function ($model) {
            $model->strength_updated_by = 1; //Auth::id();
            $model->strength_updated_at = $model->freshTimestamp();
        });
    }
}
