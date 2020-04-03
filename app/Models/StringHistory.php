<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StringHistory extends Model
{
    protected $dates = ['change_date'];

    /**
     * ゲージを文字列変換して返す
     */
    public function getGaugesAttribute()
    {
        $gauges = [
            $this->gauge_1,
            $this->gauge_2,
            $this->gauge_3,
            $this->gauge_4,
            $this->gauge_5,
            $this->gauge_6,
            $this->gauge_7,
            $this->gauge_8,
            $this->gauge_9,
            $this->gauge_10,
            $this->gauge_11,
            $this->gauge_12,
        ];
        // nullの要素を削除
        $gauges = array_filter($gauges, function($val){
            return !is_null($val);
        });

        $ret = implode('-', $gauges);

        return $ret;
    }

}
