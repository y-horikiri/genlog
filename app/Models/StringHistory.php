<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class StringHistory extends Model
{
    protected $guarded = ['id'];
    protected $dates = ['change_date'];

    /**
     * 楽器テーブルとのリレーション
     */
    public function gear()
    {
        return $this->belongsTo('App\Models\Gear');
    }

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
        $gauges = array_filter($gauges, function ($val) {
            return !is_null($val);
        });

        $ret = implode('-', $gauges);

        return $ret;
    }

    public function getIndicationMessageAttribute(): string
    {
        $period = $this->getPeriod()->days;

        // エリクサーの場合は寿命を4倍とする
        if (in_array($this->brand, ['エリクサー', 'Elixir'])) {
            $life = 4;
        } else {
            $life = 1;
        }

        switch (true) {
            case ($period <= 15 * $life):
                $message = 'まだ新品！';
                break;
            case ($period <= 30 * $life):
                $message = 'そろそろ交換する？';
                break;
            case ($period <= 60 * $life):
                $message = '物持ちがいいね！';
                break;
            default:
                $message = 'ちゃんと弾いてる？';
                break;
        }

        return $message;
    }

    public function getPeriod(): \DateInterval
    {
        $now = new Datetime('now');
        $diff = $now->diff($this->change_date);
        return $diff;
    }


}
