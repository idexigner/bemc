<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserModuleMapping extends Model
{

    use HasFactory;
    protected $table = 'user_module_mapping';
    protected $primaryKey = 'module_id';
    public $timestamps = true;
    const CREATED_AT = 'module_created_at';
    const UPDATED_AT = 'module_updated_at';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'module_user_id',
        'module_generic',
        'module_brand',
        'module_manufacturer',
        'module_dosage_form',
        'module_strength',
        'module_pack_size',
        'module_indication',
        'module_scroller',
        'module_doctor',
        'module_job',
        'module_news',
        'module_journal',
        'module_address',
        'module_advertisement',
        'module_special_report',
        'module_video',
        'module_user',
        'module_setting',
        'module_created_by',
        'module_created_at',
        'module_updated_by',
        'module_updated_at'
    ];


    protected static function booted()
    {

        static::creating(function ($model) {
            $model->module_created_by = 1; //Auth::id();
            $model->module_updated_by = 1; //Auth::id();
            $model->module_created_at = $model->freshTimestamp();
            
        });

        static::updating(function ($model) {
            $model->module_updated_by = 1; //Auth::id();
            $model->module_updated_at = $model->freshTimestamp();
        });
    }

    
}
