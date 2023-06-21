<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RetrofitAssessmentAudit extends Model
{
    use HasFactory;
    protected $fillable = ['access_issue', 'statutory_issue', 'health_safety_issues', 'adequate', 'comment', 'front_evaluation_id'];
    public function front_evaluation()
    {
        return $this->belongsTo(FrontEvaluation::class);
    }
    public function assessment_audit_properties()
    {
        return $this->hasMany(AssessmentAuditProperty::class);
    }
}
