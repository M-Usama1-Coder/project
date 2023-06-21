<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NonEnergyEI extends Model
{
    use HasFactory;
    protected $fillable = ['adequate', 'comment', 'front_evaluation_id'];

    public function front_evaluation()
    {
        return $this->belongsTo(FrontEvaluation::class);
    }
    public function enery_issue_areas()
    {
        return $this->hasMany(EnergyIssueArea::class);
    }
}
