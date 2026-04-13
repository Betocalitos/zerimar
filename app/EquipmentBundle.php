<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EquipmentBundle extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'slug', 'description', 'price_sale', 'exchange'];

    protected $casts = [
        'price_sale' => 'decimal:2',
        'exchange' => 'string',
    ];

    public function equipments()
    {
        return $this->belongsToMany(Equipment::class, 'bundle_equipment')
            ->withTimestamps();
    }
}