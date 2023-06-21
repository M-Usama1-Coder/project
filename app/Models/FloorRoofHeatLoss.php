<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FloorRoofHeatLoss extends Model
{
    use HasFactory;
    protected $fillable = ['highest_floor_roof_area', 'ground_floor_area', 'front_evaluation_id'];
    public function front_evaluation()
    {
        return $this->belongsTo(FrontEvaluation::class);
    }
}
