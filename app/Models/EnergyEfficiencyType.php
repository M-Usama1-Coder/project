<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnergyEfficiencyType extends Model
{
    use HasFactory;
    protected $fillable = [
        'work_type_id',
        'measure_type',
        'pas_annex'
    ];

    public function energy_efficiency()
    {
        return $this->hasMany(EnergyEfficiency::class);
    }
}
