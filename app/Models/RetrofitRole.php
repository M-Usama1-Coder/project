<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RetrofitRole extends Model
{
    use HasFactory;

    protected $fillable = ['role'];

    public function resources()
    {
        return $this->hasMany(Resource::class);
    }

}
