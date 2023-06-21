<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurgeVentilation extends Model
{
    use HasFactory;
    protected $fillable = [
        'adequate',
        'ventilation_id'
    ];
    public function ventilation()
    {
        return $this->belongsTo(Ventilation::class);
    }

    public function purge_ventilation_rows()
    {
        return $this->hasMany(PurgeVentilationRow::class);
    }
}
