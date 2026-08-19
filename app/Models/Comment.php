<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Idea;

class Comment extends Model
{

    public function idea()
    {
        return $this->belongsTo(Idea::class);
    }

    protected $fillable = [
        'idea_id',
        'content',
    ];
}
