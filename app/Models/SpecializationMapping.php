<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecializationMapping extends Model
{
    use HasFactory;
  
    public $timestamps = true;
    const CREATED_AT = 'specialization_mapping_created_at';
    const UPDATED_AT = 'specialization_mapping_updated_at';
    
    protected $table = 'specialization_doctor_mapping';
    protected $primaryKey = 'specialization_mapping_id';
    protected $fillable = [
        'specialization_mapping_specialization_id',
        'specialization_mapping_doctor_id',
        'specialization_mapping_is_active',
        'specialization_mapping_is_deleted',
        'specialization_mapping_created_by',
        'specialization_mapping_created_at',
        'specialization_mapping_updated_by',
        'specialization_mapping_updated_at'
    ];

 


    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'specialization_mapping_doctor_id');
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class, 'specialization_mapping_specialization_id');
    }

    protected static function booted()
    {

        static::creating(function ($model) {
            $model->specialization_mapping_created_by = 1; //Auth::id();
            $model->specialization_mapping_updated_by = 1; //Auth::id();
            $model->specialization_mapping_created_at = $model->freshTimestamp();
            
        });

        static::updating(function ($model) {
            $model->specialization_mapping_updated_by = 1; //Auth::id();
            $model->specialization_mapping_updated_at = $model->freshTimestamp();
        });
    }
}
