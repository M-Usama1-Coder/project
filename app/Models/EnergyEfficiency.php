<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnergyEfficiency extends Model
{
    use HasFactory;
    protected $fillable = ['energy_efficiency_product_id', 'energy_efficiency_type_id', 'location'];
    public function energy_efficiency_product()
    {
        return $this->belongsTo(EnergyEfficiencyProduct::class);
    }
    public function energy_efficiency_type()
    {
        return $this->belongsTo(EnergyEfficiencyType::class);
    }
    public function front_evaluation()
    {
        return $this->belongsTo(FrontEvaluation::class);
    }
}
