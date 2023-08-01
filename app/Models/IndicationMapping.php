<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndicationMapping extends Model
{
    use HasFactory;
  
    public $timestamps = true;
    const CREATED_AT = 'indication_mapping_created_at';
    const UPDATED_AT = 'indication_mapping_updated_at';
    
    protected $table = 'indication_generic_mapping';
    protected $primaryKey = 'indication_mapping_id';
    protected $fillable = [
        'indication_mapping_indication_id',
        'indication_mapping_generic_id',
        'indication_mapping_is_active',
        'indication_mapping_is_deleted',
        'indication_mapping_created_by',
        'indication_mapping_created_at',
        'indication_mapping_updated_by',
        'indication_mapping_updated_at'
    ];



    public function generic()
    {
        return $this->belongsTo(Generic::class, 'indication_mapping_generic_id');
    }

    public function indication()
    {
        return $this->belongsTo(Indication::class, 'indication_mapping_indication_id');
    }

    protected static function booted()
    {

        static::creating(function ($model) {
            $model->indication_mapping_created_by = 1; //Auth::id();
            $model->indication_mapping_updated_by = 1; //Auth::id();
            $model->indication_mapping_created_at = $model->freshTimestamp();
            
        });

        static::updating(function ($model) {
            $model->indication_mapping_updated_by = 1; //Auth::id();
            $model->indication_mapping_updated_at = $model->freshTimestamp();
        });
    }
}
