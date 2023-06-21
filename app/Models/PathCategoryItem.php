<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PathCategoryItem extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'comment', 'path_category_id'];

    public function path_category()
    {
        return $this->belongsTo(PathCategory::class);
    }
}
