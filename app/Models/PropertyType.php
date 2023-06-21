<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'comment','property_id'];
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
    public function assessment_audit_properties()
    {
        return $this->hasMany(AssessmentAuditProperty::class);
    }
}
