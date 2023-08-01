<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $table = 'video';
    protected $primaryKey = 'video_id';
    public $timestamps = true;
    const CREATED_AT = 'video_created_at';
    const UPDATED_AT = 'video_updated_at';

    protected $fillable = [
        'video_title',
        'video_link',
        'video_image',
        'video_is_featured',
        'video_is_active',
        'video_is_deleted',
        'video_created_by',
        'video_created_at',
        'video_updated_by',
        'video_updated_at'
    ];

    protected static function booted()
    {

        static::creating(function ($model) {
            $model->video_created_by = 1; //Auth::id();
            $model->video_updated_by = 1; //Auth::id();
            $model->video_created_at = $model->freshTimestamp();
            
        });

        static::updating(function ($model) {
            $model->video_updated_by = 1; //Auth::id();
            $model->video_updated_at = $model->freshTimestamp();
        });
    }
}
