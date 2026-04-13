<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExtraFeature extends Model
{
    protected $fillable = ['name', 'value', 'equipment_id', 'feature_key_id'];

    protected $casts = [
        'feature_key_id' => 'integer',
    ];

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }

    public function featureKey()
    {
        return $this->belongsTo(FeatureKey::class);
    }
}