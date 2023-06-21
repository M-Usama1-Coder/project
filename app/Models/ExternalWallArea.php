<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExternalWallArea extends Model
{
    use HasFactory;
    protected $fillable = [
        'gf_hlp',
        'ff_hlp',
        'sf_hlp',
        'front_evaluation_id'
    ];
    public function front_evaluation()
    {
        return $this->belongsTo(FrontEvaluation::class);
    }
}
