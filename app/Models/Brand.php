<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'brand_id';
    public $timestamps = true;
    const CREATED_AT = 'brand_created_at';
    const UPDATED_AT = 'brand_updated_at';
    
    protected $table = 'brand';
    protected $fillable = [
        'brand_type',
        'brand_name',
        'brand_generic_id',
        'brand_manufacturer_id',
        'brand_dosage_form_id',
        'brand_strength_id',
        'brand_pack_size_id',
        'brand_image',
        'brand_price',
        'brand_is_hightlight',
        'brand_is_new_product',
        'brand_is_new_brand',
        'brand_is_new_presentation',
        'brand_is_active',
        'brand_is_deleted',
        'brand_created_by',
        'brand_created_at',
        'brand_updated_by',
        'brand_updated_at'
    ];

    public function state()
    {
        return $this->belongsTo(State::class, 'brand_state_id', 'state_id');
    }

    public function generic()
    {
        return $this->belongsTo(Generic::class, 'brand_generic_id');
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class, 'brand_manufacturer_id');
    }

    public function dosage_form()
    {
        return $this->belongsTo(DosageForm::class, 'brand_dosage_form_id');
    }

    public function strength()
    {
        return $this->belongsTo(Strength::class, 'brand_strength_id');
    }

    public function pack_size()
    {
        return $this->belongsTo(Packsize::class, 'brand_pack_size_id');
    }

    public function advertisements()
    {
        return $this->hasMany(Advertisement::class, 'advertisement_brand_id');
    }
    
    protected static function booted()
    {

        static::creating(function ($model) {
            $model->brand_created_by = 1; //Auth::id();
            $model->brand_updated_by = 1; //Auth::id();
            $model->brand_created_at = $model->freshTimestamp();
            
        });

        static::updating(function ($model) {
            $model->brand_updated_by = 1; //Auth::id();
            $model->brand_updated_at = $model->freshTimestamp();
        });
    }
}
