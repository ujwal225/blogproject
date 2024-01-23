<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $table  = 'comments';

    protected $fillable = ['post_id','name', 'email', 'phone', 'comment', 'status'];

    public function postID(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
