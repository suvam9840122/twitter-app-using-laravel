<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Comment;
class Idea extends Model
{
 use HasFactory;
    
    public function comments()
{
    return $this->hasMany(Comment::class);
}

    protected $fillable = [
        'content',
        'like'
    ];

}
