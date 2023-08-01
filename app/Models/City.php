<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = 'city';
    protected $primaryKey = 'city_id';
    public $timestamps = true;
    const CREATED_AT = 'city_created_at';
    const UPDATED_AT = 'city_updated_at';

    protected $fillable = [
        'city_name',
        'city_state_id',
        'city_is_active',
        'city_is_deleted',
        'city_created_by',
        'city_created_at',
        'city_updated_by',
        'city_updated_at'
    ];

    public function state()
    {
        return $this->belongsTo(State::class, 'city_state_id', 'state_id');
    }

    public function doctors()
    {
        return $this->hasMany(Doctor::class, 'doctor_city_id', 'city_id');
    }


    protected static function booted()
    {

        static::creating(function ($model) {
            $model->city_created_by = 1; //Auth::id();
            $model->city_updated_by = 1; //Auth::id();
            $model->city_created_at = $model->freshTimestamp();
            
        });

        static::updating(function ($model) {
            $model->city_updated_by = 1; //Auth::id();
            $model->city_updated_at = $model->freshTimestamp();
        });
    }
}
