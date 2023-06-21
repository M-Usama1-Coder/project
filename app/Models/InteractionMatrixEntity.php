<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InteractionMatrixEntity extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'show_top', 'show_leftsidephp '];
    public function interaction_matrix_entity_type()
    {
        return $this->hasMany(InteractionMatrixEntityType::class,'matrix_entity_id');
    }
}
