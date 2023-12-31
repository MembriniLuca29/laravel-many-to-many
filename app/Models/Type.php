<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug'
    ];


    protected $table = 'types'; 
    /*
        Relationships
    */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
