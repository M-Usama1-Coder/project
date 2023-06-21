<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentilationStrategy extends Model
{
    use HasFactory;
    protected $fillable = [
        'ventilation_id',
        'air_permeability_issues',
        'air_permeability_adequate',
        'dpc_condition_issues',
        'dpc_condition_adequate',
        'condensation_damp_issues',
        'condensation_damp_adequate',
        'combustion_appliances_issues',
        'combustion_appliances_adequate',
        'property_size',
        'gf',
        'ff',
        'sf'
    ];

    public function ventilation()
    {
        return $this->belongsTo(Ventilation::class);
    }
}
