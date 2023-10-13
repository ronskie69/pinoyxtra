<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\ActivityModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        return view('user.activity');
    }

    public function newActivity(Request $request)
    {

        if (ActivityModel::where(['user_id' => $request->viewer])->where(['blog_id' => $request->blog_id])->exists()) {
            ActivityModel::where(['user_id' => $request->viewer])->where(['blog_id' => $request->blog_id])->delete();
        } else {
            ActivityModel::create([
                'blog_id'       => $request->blog_id,
                'user_id'       => $request->viewer,
                'vote'          => $request->vote,
                'activity_date' => Carbon::now()->toDateTimeString(),
            ]);
        }

        return back();
    }
}
