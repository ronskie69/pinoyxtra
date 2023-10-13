<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplyModel extends Model
{
    use HasFactory;

    public $table = "blog_replies";
    public $timestamps = false;

    protected $fillable = [
        'reply_id',
        'viewer_username',
        'reply_content',
        'reply_date'
    ];
}
