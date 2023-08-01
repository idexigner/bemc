<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table = 'country';
    protected $primaryKey = 'country_id';
    public $timestamps = true;
    const CREATED_AT = 'country_created_at';
    const UPDATED_AT = 'country_updated_at';

    protected $fillable = [
        'country_name',
        'country_is_active',
        'country_is_deleted',
        'country_created_by',
        'country_created_at',
        'country_updated_by',
        'country_updated_at'
    ];

    public function states()
    {   
        return $this->hasMany(State::class, 'state_country_id', 'country_id');
    }

    public function doctors()
    {
        return $this->hasMany(Doctor::class, 'doctor_country_id', 'country_id');
    }

    protected static function booted()
    {

        static::creating(function ($model) {
            $model->country_created_by = 1; //Auth::id();
            $model->country_updated_by = 1; //Auth::id();
            $model->country_created_at = $model->freshTimestamp();
            
        });

        static::updating(function ($model) {
            $model->country_updated_by = 1; //Auth::id();
            $model->country_updated_at = $model->freshTimestamp();
        });
    }
}
