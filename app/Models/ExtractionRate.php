<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtractionRate extends Model
{
    use HasFactory;
    protected $fillable = [
        'ventilation_id',
        'kitchen_room',
        'bath_room',
        'utility_room',
        'wc_room',

        'kitchen_room_fan',
        'bath_room_fan',
        'utility_room_fan',
        'wc_room_fan',

        'kitchen_room_fan_boost',
        'bath_room_fan_boost',
        'utility_room_fan_boost',
        'wc_room_fan_boost',

        'kitchen_room_extractor',
        'bath_room_extractor',
        'utility_room_extractor',
        'wc_room_extractor',

        'kitchen_room_boost_extractor',
        'bath_room_boost_extractor',
        'utility_room_boost_extractor',
        'wc_room_boost_extractor','adequate'
    ];

    public function ventilation()
    {
        return $this->belongsTo(Ventilation::class);
    }
}
