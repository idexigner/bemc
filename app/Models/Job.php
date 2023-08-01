<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table = 'job';
    protected $primaryKey = 'job_id';
    public $timestamps = true;
    const CREATED_AT = 'job_created_at';
    const UPDATED_AT = 'job_updated_at';

    protected $fillable = [
        'job_category',
        'job_title',
        'job_description',
        'job_organization',
        'job_organization_logo',
        'job_position',
        'job_application_deadline',
        'job_publish_date',
        'job_image',
        'job_salary',
        'job_educational_requirement',
        'job_experience_requirement',
        'job_vacancy',
        'job_age_limit',
        'job_location',
        'job_type',
        'job_source',
        'job_employment_type',
        'job_nature',
        'job_application_procedure',
        'job_is_active',
        'job_is_deleted',
        'job_created_by',
        'job_created_at',
        'job_updated_by',
        'job_updated_at'
    ];

    protected static function booted()
    {

        static::creating(function ($model) {
            $model->job_created_by = 1; //Auth::id();
            $model->job_updated_by = 1; //Auth::id();
            $model->job_created_at = $model->freshTimestamp();
            
        });

        static::updating(function ($model) {
            $model->job_updated_by = 1; //Auth::id();
            $model->job_updated_at = $model->freshTimestamp();
        });
    }
}
