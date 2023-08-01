<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;
    protected $table = 'manufacturer';
    protected $primaryKey = 'manufacturer_id';
    public $timestamps = true;
    const CREATED_AT = 'manufacturer_created_at';
    const UPDATED_AT = 'manufacturer_updated_at';

    protected $fillable = [
        'manufacturer_name',
        'manufacturer_email',
        'manufacturer_phone',
        'manufacturer_mobile',
        'manufacturer_fax',
        'manufacturer_location_id',
        'manufacturer_is_active',
        'manufacturer_is_deleted',
        'manufacturer_created_by',
        'manufacturer_created_at',
        'manufacturer_updated_by',
        'manufacturer_updated_at'
    ];

    public function brands()
    {
        return $this->hasMany(Brand::class, 'brand_manufacturer_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'manufacturer_location_id', 'location_id');
    }
    
    protected static function booted()
    {

        static::creating(function ($model) {
            $model->manufacturer_created_by = 1; //Auth::id();
            $model->manufacturer_updated_by = 1; //Auth::id();
            $model->manufacturer_created_at = $model->freshTimestamp();
            
        });

        static::updating(function ($model) {
            $model->manufacturer_updated_by = 1; //Auth::id();
            $model->manufacturer_updated_at = $model->freshTimestamp();
        });
    }



   
}
