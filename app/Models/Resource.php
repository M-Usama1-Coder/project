<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'tid', 'address', 'retrofit_role_id'];

    public function retrofit_role()
    {
        return $this->belongsTo(RetrofitRole::class);
    }

    public function evaluation_roles()
    {
        return $this->hasMany(EvaluationRoles::class);
    }
}
