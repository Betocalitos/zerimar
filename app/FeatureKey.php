<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeatureKey extends Model
{
    protected $fillable = ['name'];

    public function extraFeatures()
    {
        return $this->hasMany(ExtraFeature::class);
    }
}