<?php

namespace App\Http\Controllers;

use App\Models\Post;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //

    public function index()
    {
        $posts = Post::latest()->with('user', 'likes')->paginate(10);
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

    public function destroy(Post $post, Request $request)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('posts');
    }

    public function list(User $user)
    {
        $posts = $user->posts()->with('user', 'likes')->paginate(10);
        dd($posts);
    }
}
