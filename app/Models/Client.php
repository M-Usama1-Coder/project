<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public function front_evaluation()
    {
        return $this->hasOne(FrontEvaluation::class);
    }

    protected $fillable = ['name', 'address'];
}
