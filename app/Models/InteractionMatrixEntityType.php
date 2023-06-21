<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InteractionMatrixEntityType extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'matrix_entity_id'];
    public function interaction_matrix_entity()
    {
        return $this->belongsTo(InteractionMatrixEntity::class, 'matrix_entity_id');
    }
}
