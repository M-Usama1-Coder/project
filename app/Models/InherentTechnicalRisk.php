<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InherentTechnicalRisk extends Model
{
    use HasFactory;
    protected $fillable = [
        'front_evaluation_id',
        'dwelling_improved',
        'measures_per_dwelling',
        'measures_proposed',
        'highrisk_measure',
        'construction_build',
        'overall_grade_risk'
    ];

    public function front_evaluation()
    {
        return $this->belongsTo(FrontEvaluation::class);
    }

    public function inherent_technical_risk_measures()
    {
        return $this->hasMany(InherentTechnicalRiskMeasure::class, 'technical_risk_id');
    }
}
