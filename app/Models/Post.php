<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'category_id'
    ];

    /*
        Relationships
    */
    public function type()
    {
        return $this->belongsTo(type::class);
    }

    public function types()
    {
        return $this->belongsToMany(Type::class);
    }
}
