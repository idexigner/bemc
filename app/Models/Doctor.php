<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $table = 'doctor';
    protected $primaryKey = 'doctor_id';
    public $timestamps = true;
    const CREATED_AT = 'doctor_created_at';
    const UPDATED_AT = 'doctor_updated_at';

    protected $fillable = [
        'doctor_name',
        'doctor_email',
        'doctor_phone_personal',
        'doctor_phone_clinic',
        'doctor_specialization',
        'doctor_achievement',
        'doctor_experience',
        'doctor_profession_degree',
        'doctor_gender',
        'doctor_certificate',
        'doctor_image',
        'doctor_bio_notes',
        'doctor_address',
        'doctor_country_id',
        'doctor_state_id',
        'doctor_city_id',
        'doctor_zip_code',
        'doctor_is_active',
        'doctor_is_deleted',
        'doctor_created_by',
        'doctor_created_at',
        'doctor_updated_by',
        'doctor_updated_at'
    ];

    public function specializations()
    {
        return $this->belongsToMany(Specialization::class, 'specialization_doctor_mapping', 'specialization_mapping_doctor_id', 'specialization_mapping_specialization_id');
    }
   
    public function country()
    {
        return $this->belongsTo(Country::class, 'doctor_country_id', 'country_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'doctor_state_id', 'state_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'doctor_city_id', 'city_id');
    }

    protected static function booted()
    {

        static::creating(function ($model) {
            $model->doctor_created_by = 1; //Auth::id();
            $model->doctor_updated_by = 1; //Auth::id();
            $model->doctor_created_at = $model->freshTimestamp();
            
        });

        static::updating(function ($model) {
            $model->doctor_updated_by = 1; //Auth::id();
            $model->doctor_updated_at = $model->freshTimestamp();
        });
    }
}
