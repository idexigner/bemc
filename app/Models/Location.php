<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $table = 'location';
    protected $primaryKey = 'location_id';
    public $timestamps = true;
    const CREATED_AT = 'location_created_at';
    const UPDATED_AT = 'location_updated_at';

    protected $fillable = [
        'location_country_id',
        'location_state_id',
        'location_city_id',
        'location_address',
        'location_longitude',
        'location_latitude',
        'location_is_active',
        'location_is_deleted',
        'location_created_by',
        'location_created_at',
        'location_updated_by',
        'location_updated_at'
    ];

    public function manufacturers()
    {
        return $this->hasMany(Manufacturer::class, 'manufacturer_location_id', 'location_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'location_country_id', 'country_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'location_state_id', 'state_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'location_city_id', 'city_id');
    }

    protected static function booted()
    {

        static::creating(function ($model) {
            $model->location_created_by = 1; //Auth::id();
            $model->location_updated_by = 1; //Auth::id();
            $model->location_created_at = $model->freshTimestamp();
            
        });

        static::updating(function ($model) {
            $model->location_updated_by = 1; //Auth::id();
            $model->location_updated_at = $model->freshTimestamp();
        });
    }
}
