<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeatDemand extends Model
{
    use HasFactory;
    protected $fillable = [
        'window_factor_id',
        'wall_u_value_id',
        'window_u_value_id',
        'roof_u_value_id',
        'location_factor_id',
        'number_of_floor',
        'room_height',
        'front_evaluation_id'
    ];

    public function front_evaluation()
    {
        return $this->belongsTo(FrontEvaluation::class);
    }

    public function window_factor()
    {
        return $this->belongsTo(WindowFactor::class);
    }
    public function wall_u_value()
    {
        return $this->belongsTo(WallUValue::class);
    }
    public function roof_u_value()
    {
        return $this->belongsTo(RoofUValue::class);
    }
    public function window_u_value()
    {
        return $this->belongsTo(WindowUValue::class);
    }
    public function location_factor()
    {
        return $this->belongsTo(LocationFactor::class);
    }
}
