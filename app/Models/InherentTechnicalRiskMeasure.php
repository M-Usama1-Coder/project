<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InherentTechnicalRiskMeasure extends Model
{
    use HasFactory;
    protected $fillable = [
        'technical_risk_id',
        'matrix_entity_type_id',
        'itr'
    ];
    public function interaction_matrix_entity_type()
    {
        return $this->belongsTo(InteractionMatrixEntityType::class, 'matrix_entity_type_id');
    }

    public function inherent_technical_risk()
    {
        return $this->belongsTo(InherentTechnicalRisk::class, 'technical_risk_id');
    }
}
