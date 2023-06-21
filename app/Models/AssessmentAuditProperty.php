<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentAuditProperty extends Model
{
    use HasFactory;
    protected $fillable = ['property_type_id', 'retrofit_assessment_audit_id'];
    public function property_type()
    {
        return $this->belongsTo(PropertyType::class);
    }
    public function retrofit_assessment_audit()
    {
        return $this->belongsTo(RetrofitAssessmentAudit::class);
    }
}
