<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InteractionMatrix extends Model
{
    use HasFactory;
    protected $fillable = ['front_evaluation_id', 'total', 'risk_path'];
    public function front_evaluation()
    {
        return $this->belongsTo(FrontEvaluation::class);
    }
    public function matrix_rows()
    {
        return $this->hasMany(InteractionMatrixRow::class);
    }
}
