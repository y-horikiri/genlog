<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gear extends Model
{
    //
    public function stringHistories()
    {
        return $this->hasMany('App\Models\StringHistory')
            ->orderBy('change_date', 'DESC')
            ;
    }

    public function gearType()
    {
        return $this->hasOne('App\Models\GearType');
    }

}
