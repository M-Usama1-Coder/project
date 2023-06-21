<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoorUndercut extends Model
{
    use HasFactory;
    protected $fillable = [
        'ventilation_id',
        'doors',
        'undercuts',
        'action',
        'adequate','doors_hrw','undercuts_hrw'
    ];
    public function ventilation()
    {
        return $this->belongsTo(Ventilation::class);
    }
}
