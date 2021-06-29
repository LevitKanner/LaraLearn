<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Post $post, Request $request)
    {
        $liked = $post->likedby($request->user());
        if (!$liked) $post->likes()->create([
            'user_id' => $request->user()->id
        ]);
        return back();
    }

}
