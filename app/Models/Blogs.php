<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'blog_id',
        'blog_title',
        'blog_content',
        'blog_creator',
        'blog_date',
        'blog_likes',
        'blog_dislikes',
    ];
}
