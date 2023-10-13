<?php
namespace App\Traits;

use App\Models\ActivityModel;
use App\Models\Blogs;
use App\Models\ReplyModel;

trait ReplyTrait
{
    public function getReplies($blog_id)
    {
        return ReplyModel::where(['reply_id' => $blog_id])->get();
    }
    public function isLikedByUser($blog_id)
    {
        $result = ActivityModel::where(['user_id' => auth()->user()->username])->where(['blog_id' => $blog_id])->get();

        return $result;
    }

    public function getLikes()
    {
        $likes =  ActivityModel::groupBy('blog_id')->selectRaw('blog_id, COUNT(*) AS total')->where('vote', 'like')->get();
        
        if($likes->isEmpty()) {
            Blogs::query()->update(['blog_likes' => 0]);
        }
        else 
        {
            foreach($likes as $data){
                $blog_id = $data->blog_id;
                $total = $data->total;
    
                Blogs::where(['blog_id' => $blog_id])->update(['blog_likes' => $total]);
            }
        }
    }

    public function getDislikes()
    {
        $dislikes =  ActivityModel::groupBy('blog_id')->selectRaw('blog_id, COUNT(*) AS total')->where('vote', 'dislike')->get();

        if($dislikes->isEmpty()) 
        {
            Blogs::query()->update(['blog_dislikes' => 0]);
        } 
        else
        {
            foreach($dislikes as $data){
                $blog_id = $data->blog_id;
                $total = $data->total;
    
                Blogs::where(['blog_id' => $blog_id])->update(['blog_dislikes' => $total]);
            }
        }
    }

    public function super_unique_id($limit)
    {
        return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
    }
}
