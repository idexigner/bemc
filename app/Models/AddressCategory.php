<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressCategory extends Model
{
    use HasFactory;
    protected $table = 'address_category';
    protected $primaryKey = 'address_category_id';
    public $timestamps = true;
    const CREATED_AT = 'address_category_created_at';
    const UPDATED_AT = 'address_category_updated_at';

    protected $fillable = [
        'address_category_title',
        'address_category_is_active',
        'address_category_is_deleted',
        'address_category_created_by',
        'address_category_created_at',
        'address_category_updated_by',
        'address_category_updated_at'
    ];

    public function addresses()
    {
        return $this->hasMany(Address::class, 'address_category');
    }
    
    protected static function booted()
    {

        static::creating(function ($model) {
            $model->address_category_created_by = 1; //Auth::id();
            $model->address_category_updated_by = 1; //Auth::id();
            $model->address_category_created_at = $model->freshTimestamp();
            
        });

        static::updating(function ($model) {
            $model->address_category_updated_by = 1; //Auth::id();
            $model->address_category_updated_at = $model->freshTimestamp();
        });
    }
}
