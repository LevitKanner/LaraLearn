<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //

    public function index()
    {
        $posts = Post::with('user','likes')->paginate(10);
        return view('posts', ["posts" => $posts]);
    }

    public function create()
    {
        return view('postForm');
    }

    public function store(Request $req)
    {

        $validated = $req->validate([
            "title" => "required",
            "content" => "required|min:20"
        ]);

        $req->user()->posts()->create([
            'title' => $req->input('title'),
            'content' => $req->input('content')
        ]);

        return redirect()->route('posts')->with('success', "'{$validated['title']}' created successfully");
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('details', ["post" => $post]);
    }
}
