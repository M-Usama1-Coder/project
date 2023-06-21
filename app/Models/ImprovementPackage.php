<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImprovementPackage extends Model
{
    use HasFactory;

    public function improvement_option_evaluation()
    {
        return $this->belongsTo(ImprovementOptionEvaluation::class);
    }
    public function improvement_package_rows()
    {
        return $this->hasMany(ImprovementPackageRow::class);
    }

    protected $fillable = ['package_name', 'epc_rate', 'improvement_option_evaluation_id'];
}
