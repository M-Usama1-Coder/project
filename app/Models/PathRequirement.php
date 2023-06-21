<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PathRequirement extends Model
{
    use HasFactory;

    protected $fillable = ['adequate', 'comment', 'front_evaluation_id'];

    public function front_evaluation()
    {
        return $this->belongsTo(FrontEvaluation::class);
    }
    public function path_categories()
    {
        return $this->hasMany(PathCategory::class);
    }
}
