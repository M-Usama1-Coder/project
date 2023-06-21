<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImprovementPackageRow extends Model
{
    use HasFactory;

    public function measure_type()
    {
        return $this->belongsTo(MeasureType::class);
    }

    public function improvement_package()
    {
        return $this->belongsTo(ImprovementPackage::class);
    }

    protected $fillable = ['measure_type_id', 'improvement_package_id', 'fuel_cost', 'tco2_saving','epc_rate'];
}
