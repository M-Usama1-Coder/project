<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnergyIssueArea extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'non_energy_e_i_id'];

    public function non_energy_ei()
    {
        return $this->belongsTo(NonEnergyEI::class);
    }

    public function energy_issue_area_items()
    {
        return $this->hasMany(EnergyIssueAreaItem::class);
    }
}
