<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationRoles extends Model
{
    use HasFactory;

    protected $fillable = ['front_evaluation_id', 'resource_id'];

    public function resource()
    {
        return $this->belongsTo(Resource::class);
    }

    public function front_evaluation()
    {
        return $this->belongsTo(FrontEvaluation::class);
    }
}
