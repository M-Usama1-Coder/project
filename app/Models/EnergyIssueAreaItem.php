<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnergyIssueAreaItem extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'comment', 'rag', 'energy_issue_area_id'];

    public function enery_issue_area()
    {
        return $this->belongsTo(EnergyIssueArea::class);
    }
}
