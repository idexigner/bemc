<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

    class AdvertisementPosition extends Model
    {
        use HasFactory;
        protected $table = 'advertisement_position';
        protected $primaryKey = 'advertisement_position_id';
        public $timestamps = true;
        const CREATED_AT = 'advertisement_position_created_at';
        const UPDATED_AT = 'advertisement_position_updated_at';

        protected $fillable = [
            'advertisement_position_name',
            'advertisement_position_class_name',
            'advertisement_position_width',
            'advertisement_position_height',
            'advertisement_position_number',
            'advertisement_position_interval',
            'advertisement_position_price',
            'advertisement_position_is_featured',
            'advertisement_position_is_active',
            'advertisement_position_is_deleted',
            'advertisement_position_created_by',
            'advertisement_position_created_at',
            'advertisement_position_updated_by',
            'advertisement_position_updated_at'
        ];



        public function advertisements()
        {
            return $this->hasMany(Advertisement::class, 'advertisement_position');
        }

    protected static function booted()
    {

        static::creating(function ($model) {
            $model->advertisement_position_created_by = 1; //Auth::id();
            $model->advertisement_position_updated_by = 1; //Auth::id();
            $model->advertisement_position_created_at = $model->freshTimestamp();
            
        });

        static::updating(function ($model) {
            $model->advertisement_position_updated_by = 1; //Auth::id();
            $model->advertisement_position_updated_at = $model->freshTimestamp();
        });
    }
}
