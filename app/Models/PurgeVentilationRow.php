<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurgeVentilationRow extends Model
{
    use HasFactory;
    protected $fillable = [
        'purge_ventilation_id',
        'room_size',
        'windows_doors',
        'height',
        'width',
        'degree',
        'proportion',
        'action',
        'room_name'
    ];
    
    public function purge_ventilation()
    {
        return $this->belongsTo(PurgeVentilation::class);
    }
}
