<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BackgroundTrickle extends Model
{
    use HasFactory;
    protected $fillable = [
        'ventilation_id',
        'windows',
        'vents',
        'action',
        'adequate',
        'windows_hrw', 'vents_hrw'
    ];
    public function ventilation()
    {
        return $this->belongsTo(Ventilation::class);
    }
}
