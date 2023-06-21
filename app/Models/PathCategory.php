<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PathCategory extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'path_requirement_id'];
    public function path_category_items()
    {
        return $this->hasMany(PathCategoryItem::class);
    }
    public function path_requirement()
    {
        return $this->belongsTo(PathRequirement::class);
    }
}
