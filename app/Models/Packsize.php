<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Packsize extends Model
{
    use HasFactory;
    protected $table = 'packsize';
    protected $primaryKey = 'packsize_id';
    public $timestamps = true;
    const CREATED_AT = 'packsize_created_at';
    const UPDATED_AT = 'packsize_updated_at';

    protected $fillable = [
        'packsize_name',
        'packsize_is_active',
        'packsize_is_deleted',
        'packsize_created_by',
        'packsize_created_at',
        'packsize_updated_by',
        'packsize_updated_at'
    ];

    public function brands()
    {
        return $this->hasMany(Brand::class, 'brand_pack_size_id');
    }

    protected static function booted()
    {

        static::creating(function ($model) {
            $model->packsize_created_by = 1; //Auth::id();
            $model->packsize_updated_by = 1; //Auth::id();
            $model->packsize_created_at = $model->freshTimestamp();
            
        });

        static::updating(function ($model) {
            $model->packsize_updated_by = 1; //Auth::id();
            $model->packsize_updated_at = $model->freshTimestamp();
        });
    }

}
