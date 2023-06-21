<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnergyEfficiencyProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'eem_name',
        'install_manual',
        'user_manual',
        'links'
    ];

    public function energy_efficiency()
    {
        return $this->hasMany(EnergyEfficiency::class);
    }
    public function front_evaluation()
    {
        return $this->belongsTo(FrontEvaluation::class);
    }
}
