<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FrontEvaluation extends Model
{
    use HasFactory;

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function evaluation_roles()
    {
        return $this->hasMany(EvaluationRoles::class);
    }

    public function retrofit_assessment_audit()
    {
        return $this->hasOne(RetrofitAssessmentAudit::class);
    }

    public function improvement_option_evaluation()
    {
        return $this->hasOne(ImprovementOptionEvaluation::class);
    }

    public function path_requirement()
    {
        return $this->hasOne(PathRequirement::class);
    }

    public function non_energy_ei()
    {
        return $this->hasOne(NonEnergyEI::class);
    }

    public function interaction_matrix()
    {
        return $this->hasOne(InteractionMatrix::class);
    }

    public function energy_efficiency()
    {
        return $this->hasMany(EnergyEfficiency::class);
    }

    public function inherent_technical_risk()
    {
        return $this->hasOne(InherentTechnicalRisk::class);
    }

    public function ventilation()
    {
        return $this->hasOne(Ventilation::class);
    }

    //Heat Demand
    public function heat_demand()
    {
        return $this->hasOne(HeatDemand::class);
    }

    public function external_wall_area()
    {
        return $this->hasOne(ExternalWallArea::class);
    }

    public function floor_roofHeat_loss()
    {
        return $this->hasOne(FloorRoofHeatLoss::class);
    }

    public function intended_outcomes()
    {
        return $this->hasMany(IntendedOutcome::class);
    }

    protected $fillable = ['photo', 'client_id', 'occupier_name', 'occupier_number', 'landlord_name', 'landlord_number', 'address', 'dated'];
}
