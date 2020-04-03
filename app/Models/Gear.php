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

    public function getPeriod()
    {
        $now = new Datetime('now');
        $diff = $now->diff($this->change_date);
        $months = $diff->m;
        $days = $diff->d;
        return ['months' => $months, 'days' => $days];
    }

}
