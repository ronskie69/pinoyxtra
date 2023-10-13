<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\ActivityModel;
use App\Models\Blogs;
use App\Traits\ReplyTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    use ReplyTrait;
    
    public function index()
    {
        $this->getLikes();
        $this->getDislikes();

        $blogs = Blogs::paginate(20);
        return view('blogs.blog', ['blogs' => $blogs]);
    }

    public function view_blog(Request $request){
        $this->getLikes();
        $this->getDislikes();

        $data = Blogs::where('blog_id', $request->blog_id)->get();
        $replies = $this->getReplies($request->blog_id);
        
        if(Auth::check()) {
            $state = $this->isLikedByUser($request->blog_id)->first();

            return view('blogs.viewblog', ['blog' => $data, 'state' => $state, 'replies' => $replies ]);
        }

        return view('blogs.viewblog', ['blog' => $data, 'replies' => $replies]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'blog_title' =>'required',
            'blog_content' =>'required',
            'blog_creator' =>'required',
        ]);

        Blogs::create([
            'blog_id' => $this->super_unique_id(10),
            'blog_title' => $request->blog_title,
            'blog_content' => $request->blog_content,
            'blog_creator' => $request->blog_creator,
            'blog_date' => Carbon::now()->toDateTimeString(),
            'blog_likes' => '0',
            'blog_dislikes' => '0',
        ]);

        return redirect()->route('blogs')->with('message', 'A new blog has been created.');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'blog_title' =>'required',
            'blog_content' =>'required',
            'blog_creator' =>'required',
        ]);

        Blogs::where(['blog_title', $request->blog_title])->where(['blog_id', $request->blog_id])->update(['blog_title' => $request->blog_title, 'blog_content' => $request->blog_content]);

        return redirect()->route('view-blog')->with('message',"You have successfully edited this blog's content");
    }

    public function delete(Request $request) 
    {

    }
}
