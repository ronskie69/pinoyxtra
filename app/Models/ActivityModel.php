<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityModel extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = 'user_activity_log';

    protected $fillable = [
        'blog_id',
        'user_id',
        'vote',
        'activity_date'
    ];
}
