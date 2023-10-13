<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\ReplyModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogReplyController extends Controller
{
    public function addReply(Request $request)
    {
        $this->validate($request, [
            'reply_content' => "required|max:255",
        ]);

        ReplyModel::create([
            'reply_id' => $request->reply_id,
            'viewer_username' => $request->viewer_username,
            'reply_content' => $request->reply_content,
            'reply_date' => Carbon::now()->toDateTimeString()
        ]);

        return back();
    }
}
