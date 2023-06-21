<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntendedOutcome extends Model
{
    use HasFactory;
    protected $fillable = [
        'front_evaluation_id',
        'outcome',
        'truth'
    ];
    
    public function front_evaluation()
    {
        return $this->belongsTo(FrontEvaluation::class);
    }
}
