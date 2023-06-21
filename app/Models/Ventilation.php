<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventilation extends Model
{
    use HasFactory;
    protected $fillable = ['front_evaluation_id'];
    public function front_evaluation()
    {
        return $this->belongsTo(FrontEvaluation::class);
    }
    public function ventilation_strategy()
    {
        return $this->hasOne(VentilationStrategy::class);
    }
    public function extraction_rate()
    {
        return $this->hasOne(ExtractionRate::class);
    }
    public function door_undercut()
    {
        return $this->hasOne(DoorUndercut::class);
    }
    public function background_trickle()
    {
        return $this->hasOne(BackgroundTrickle::class);
    }
    public function purge_ventilation()
    {
        return $this->hasOne(PurgeVentilation::class);
    }
    public function internal_ventilation_strategy()
    {
        return $this->hasOne(InternalVentilationStrategy::class);
    }
}
