<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipment extends Model
{
    use SoftDeletes;

    protected $table = 'equipment';

    protected $fillable = [
        'name', 'name_slug', 'brand', 'model', 'series', 'year',
        'price_rent', 'price_sale', 'capacity', 'motor', 'description',
        'exchange', 'equipment_type_id',
        'charger', 'battery', 'max_height', 'nationality',
        'is_bundle_member',
    ];

    protected $casts = [
        'year' => 'integer',
        'price_rent' => 'decimal:2',
        'price_sale' => 'decimal:2',
        'exchange' => 'string',
        'charger' => 'boolean',
        'battery' => 'boolean',
        'is_bundle_member' => 'boolean',
    ];

    public function images()
    {
        return $this->hasMany(Image::class)->ordered();
    }

    public function type()
    {
        return $this->belongsTo(EquipmentType::class, 'equipment_type_id');
    }

    public function features()
    {
        return $this->hasMany(ExtraFeature::class);
    }

    public function bundles()
    {
        return $this->belongsToMany(EquipmentBundle::class, 'bundle_equipment')
            ->withTimestamps();
    }

    public function scopeStandalone($query)
    {
        return $query->where('is_bundle_member', false);
    }
}