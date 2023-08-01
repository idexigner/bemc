<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    
    use HasFactory;
    protected $table = 'address';
    protected $primaryKey = 'address_id';
    public $timestamps = true;
    const CREATED_AT = 'address_created_at';
    const UPDATED_AT = 'address_updated_at';

    protected $fillable = [
        'address_title',
        'address_category',
        'address_detail',
        'address_contact',
        'address_is_active',
        'address_is_deleted',
        'address_created_by',
        'address_created_at',
        'address_updated_by',
        'address_updated_at'
    ];

    public function category()
    {
        return $this->belongsTo(AddressCategory::class, 'address_category');
    }
    
    protected static function booted()
    {

        static::creating(function ($model) {
            $model->address_updated_by = 1; //Auth::id();
            $model->address_created_by = 1; //Auth::id();
            $model->address_created_at = $model->freshTimestamp();
            
        });

        static::updating(function ($model) {
            $model->address_updated_by = 1; //Auth::id();
            $model->address_updated_at = $model->freshTimestamp();
        });
    }
}
