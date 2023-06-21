<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImprovementOptionEvaluation extends Model
{
    use HasFactory;

    public function improvement_packages()
    {
        return $this->hasMany(ImprovementPackage::class);
    }

    public function front_evaluation()
    {
        return $this->belongsTo(FrontEvaluation::class);
    }


    protected $fillable = ['current_energy_rating', 'current_fuel_cost', 'current_carbon', 'new_fuel_cost', 'new_carbon','front_evaluation_id'];
}
