<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternalVentilationStrategy extends Model
{
    use HasFactory;
    protected $fillable = [
        'ventilation_id',
        'dpc_recommendation',
        'extraction_recommendation',
        'door_undercut_recommendation',
        'trickle_vents_recommendation',
        'purge_recommendation',
        'condensation_recommendation',
        'combustion_recommendation',
        'ventilation_recommendation'
    ];

    public function ventilation()
    {
        return $this->belongsTo(Ventilation::class);
    }
}
