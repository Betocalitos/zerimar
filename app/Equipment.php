<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Equipment extends Model
{
    /**
     * get all images from equipment
     * @return HasMany
     */
    public function images(): HasMany
    {

        return $this->hasMany(Images::class);
    }

    /**
     * get all images from equipment
     * @return BelongsTo
     */
    public function type(): BelongsTo
    {

        return $this->belongsTo(TypeEquipment::class, 'type_equipment_id');
    }

    /**
     * get all images from equipment
     * @return HasMany
     */
    public function features(): HasMany
    {

        return $this->hasMany(ExtraFeatures::class, 'equipment_id');
    }
}
