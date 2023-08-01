<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $table = 'state';
    protected $primaryKey = 'state_id';
    public $timestamps = true;
    const CREATED_AT = 'state_created_at';
    const UPDATED_AT = 'state_updated_at';

    protected $fillable = [
        'state_name',
        'state_country_id',
        'state_is_active',
        'state_is_deleted',
        'state_created_by',
        'state_created_at',
        'state_updated_by',
        'state_updated_at'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'state_country_id', 'country_id');
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'city_state_id', 'state_id');
    }

    public function doctors()
    {
        return $this->hasMany(Doctor::class, 'doctor_state_id', 'state_id');
    }

    protected static function booted()
    {

        static::creating(function ($model) {
            $model->state_created_by = 1; //Auth::id();
            $model->state_updated_by = 1; //Auth::id();
            $model->state_created_at = $model->freshTimestamp();
            
        });

        static::updating(function ($model) {
            $model->state_updated_by = 1; //Auth::id();
            $model->state_updated_at = $model->freshTimestamp();
        });
    }
}
