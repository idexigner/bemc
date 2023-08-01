<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialReport extends Model
{
    use HasFactory;
    protected $table = 'special_report';
    protected $primaryKey = 'special_report_id';
    public $timestamps = true;
    const CREATED_AT = 'special_report_created_at';
    const UPDATED_AT = 'special_report_updated_at';

    protected $fillable = [
        'special_report_title',
        'special_report_description',
        'special_report_link_address',
        'special_report_image',
        'special_report_is_active',
        'special_report_is_deleted',
        'special_report_created_by',
        'special_report_created_at',
        'special_report_updated_by',
        'special_report_updated_at'
    ];

    protected static function booted()
    {

        static::creating(function ($model) {
            $model->special_report_created_by = 1; //Auth::id();
            $model->special_report_updated_by = 1; //Auth::id();
            $model->special_report_created_at = $model->freshTimestamp();
            
        });

        static::updating(function ($model) {
            $model->special_report_updated_by = 1; //Auth::id();
            $model->special_report_updated_at = $model->freshTimestamp();
        });
    }
}
