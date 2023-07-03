<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    use HasFactory;
    protected $table = 'group_users';

    protected $fillable = ['group_id', 'user_id', 'client_id'];

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }
}
