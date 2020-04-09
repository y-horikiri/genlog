<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gear extends Model
{
    protected $guarded = ['id'];
    //
    public function stringHistories()
    {
        return $this->hasMany('App\Models\StringHistory')
            ->orderBy('change_date', 'DESC')
            ->orderBy('id', 'DESC')
            ;
    }

    public function gearType()
    {
        return $this->hasOne('App\Models\GearType');
    }

}
