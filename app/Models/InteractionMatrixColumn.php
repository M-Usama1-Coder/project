<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InteractionMatrixColumn extends Model
{
    use HasFactory;
    protected $fillable = ['interaction_matrix_row_id', 'color','entity_type_id','entity_id'];
}
