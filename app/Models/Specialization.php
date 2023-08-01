<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    use HasFactory;
    protected $table = 'specialization';
    
    public $timestamps = true;
    const CREATED_AT = 'specialization_created_at';
    const UPDATED_AT = 'specialization_updated_at';
    protected $primaryKey = 'specialization_id';
    protected $fillable = [
        'specialization_name',
        'specialization_is_active',
        'specialization_is_deleted',
        'specialization_created_by',
        'specialization_created_at',
        'specialization_updated_by',
        'specialization_updated_at'
    ];

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'specialization_doctor_mapping', 'specialization_mapping_specialization_id', 'specialization_mapping_doctor_id');
    }

    

    protected static function booted()
    {

        static::creating(function ($model) {
            $model->specialization_created_by = 1; //Auth::id();
            $model->specialization_updated_by = 1; //Auth::id();
            $model->specialization_created_at = $model->freshTimestamp();
            
        });

        static::updating(function ($model) {
            $model->specialization_updated_by = 1; //Auth::id();
            $model->specialization_updated_at = $model->freshTimestamp();
        });
    }
}
