<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;
    protected $table = 'journal';
    protected $primaryKey = 'journal_id';
    public $timestamps = true;
    const CREATED_AT = 'journal_created_at';
    const UPDATED_AT = 'journal_updated_at';

    protected $fillable = [
        'journal_title',
        'journal_category',
        'journal_type',
        'journal_image',
        'journal_is_active',
        'journal_is_deleted',
        'journal_created_by',
        'journal_created_at',
        'journal_updated_by',
        'journal_updated_at'
    ];

    protected static function booted()
    {

        static::creating(function ($model) {
            $model->journal_created_by = 1; //Auth::id();
            $model->journal_updated_by = 1; //Auth::id();
            $model->journal_created_at = $model->freshTimestamp();
            
        });

        static::updating(function ($model) {
            $model->journal_updated_by = 1; //Auth::id();
            $model->journal_updated_at = $model->freshTimestamp();
        });
    }
}
