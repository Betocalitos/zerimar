<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeEquipment extends Model
{

    public function equipments()
    {

        return $this->hasMany(Equipment::class, 'type_equipment_id');
    }
}
