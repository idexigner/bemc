<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DosageForm extends Model
{
    use HasFactory;
    protected $table = 'dosageform';
    protected $primaryKey = 'dosageform_id';
    public $timestamps = true;
    const CREATED_AT = 'dosageform_created_at';
    const UPDATED_AT = 'dosageform_updated_at';

    protected $fillable = [
        'dosageform_name',
        'dosageform_is_active',
        'dosageform_is_deleted',
        'dosageform_created_by',
        'dosageform_created_at',
        'dosageform_updated_by',
        'dosageform_updated_at'
    ];

    public function brands()
    {
        return $this->hasMany(Brand::class, 'brand_dosage_form_id');
    }

    protected static function booted()
    {

        static::creating(function ($model) {
            $model->dosageform_created_by = 1; //Auth::id();
            $model->dosageform_updated_by = 1; //Auth::id();
            $model->dosageform_created_at = $model->freshTimestamp();
            
        });

        static::updating(function ($model) {
            $model->dosageform_updated_by = 1; //Auth::id();
            $model->dosageform_updated_at = $model->freshTimestamp();
        });
    }


}
