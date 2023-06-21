<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    use HasFactory;
    protected $table = 'my_flights';

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }
}
