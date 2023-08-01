<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;
    protected $table = 'advertisement';
    protected $primaryKey = 'advertisement_id';
    public $timestamps = true;
    const CREATED_AT = 'advertisement_created_at';
    const UPDATED_AT = 'advertisement_updated_at';

    protected $fillable = [
        'advertisement_title',
        'advertisement_organization',
        'advertisement_category',
        'advertisement_link',
        'advertisement_publish',
        'advertisement_unpublish',
        'advertisement_image',
        'advertisement_generic_id',
        'advertisement_brand_id',
        'advertisement_indication_id',
        'advertisement_position',
        'advertisement_is_featured',
        'advertisement_is_active',
        'advertisement_is_deleted',
        'advertisement_created_by',
        'advertisement_created_at',
        'advertisement_updated_by',
        'advertisement_updated_at'
    ];

 
    public function generic()
    {
        return $this->belongsTo(Generic::class, 'advertisement_generic_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'advertisement_brand_id');
    }

    public function indication()
    {
        return $this->belongsTo(Indication::class, 'advertisement_indication_id');
    }
    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class, 'advertisement_manufacturer_id');
    }

    public function advertisement_position()
    {
        return $this->belongsTo(AdvertisementPosition::class, 'advertisement_position', 'advertisement_position_id');
    }

    protected static function booted()
    {

        static::creating(function ($model) {
            $model->advertisement_created_by = 1; //Auth::id();
            $model->advertisement_updated_by = 1; //Auth::id();
            $model->advertisement_created_at = $model->freshTimestamp();
            
        });

        static::updating(function ($model) {
            $model->advertisement_updated_by = 1; //Auth::id();
            $model->advertisement_updated_at = $model->freshTimestamp();
        });
    }
}
