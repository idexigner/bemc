<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    protected $primaryKey = 'news_id';
    public $timestamps = true;
    const CREATED_AT = 'news_created_at';
    const UPDATED_AT = 'news_updated_at';

    protected $fillable = [
        'news_title',
        'news_description',       
        'news_image',
        'news_publish_date',
        'news_unpublish_date',
        'news_is_active',
        'news_is_deleted',
        'news_created_by',
        'news_created_at',
        'news_updated_by',
        'news_updated_at'
    ];

    protected static function booted()
    {

        static::creating(function ($model) {
            $model->news_created_by = 1; //Auth::id();
            $model->news_updated_by = 1; //Auth::id();
            $model->news_created_at = $model->freshTimestamp();
            
        });

        static::updating(function ($model) {
            $model->news_updated_by = 1; //Auth::id();
            $model->news_updated_at = $model->freshTimestamp();
        });
    }
}
