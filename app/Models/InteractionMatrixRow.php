<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InteractionMatrixRow extends Model
{
    use HasFactory;
    protected $fillable = ['interaction_matrix_id', 'active','entity_type_id','entity_id'];
    public function interaction_matrix()
    {
        return $this->belongsTo(InteractionMatrix::class);
    }
    public function matrix_columns()
    {
        return $this->hasMany(InteractionMatrixColumn::class);
    }
}
